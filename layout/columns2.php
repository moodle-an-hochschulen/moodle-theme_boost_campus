<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme Boost Campus - Layout file.
 *
 * @package   theme_boost_campus
 * @copyright 2017 Kathrin Osswald, Ulm University kathrin.osswald@uni-ulm.de
 * @copyright based on code from theme_boost by Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
// MODIFICATION START.
global $CFG,$PAGE,$DB,$COURSE;
// MODIFICATION END.

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');
// MODIFICATION Start: Require own locallib.php.
require_once($CFG->dirroot . '/theme/boost_campus/locallib.php');
// MODIFICATION END.

if (isloggedin()) {
    $navdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
} else {
    $navdraweropen = false;
}
$extraclasses = [];
if ($navdraweropen) {
    $extraclasses[] = 'drawer-open-left';
}


$ur_categories = array('','misc'=>'','khs'=>'Faculty of Kinesiology and Health Studies','edu'=>'Faculty of Education','sci'=>'Faculty of Science','grad'=>'Grad Studies','fa'=>'Faculty of Fine Arts','map'=>'Faculty of Media, Art, and Performance','engg'=>'Faculty of Engineering','bus'=>'Business Administration','arts'=>'Faculty of Arts','sw'=>'Faculty of Social Work','nur'=>'Faculty of Nursing','misc'=>'Custom Themes');


$sql = "SELECT a.name FROM {$CFG->prefix}course_categories a, {$CFG->prefix}course b WHERE a.id = b.category AND b.id = {$COURSE->id}";
$check_course_category = $DB->get_record_sql($sql);
if ($check_course_category) {
	$key = array_search($check_course_category->name,$ur_categories);
	if (!empty($key)) $extraclasses[] = $key;
}



$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;
$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
// MODIFICATION START: Setting 'catchshortcuts'.
// Initialize array.
$catchshortcuts = array();
// If setting is enabled then add the parameter to the array.
if (get_config('theme_boost_campus', 'catchendkey') == true) {
    $catchshortcuts[] = 'end';
}
// If setting is enabled then add the parameter to the array.
if (get_config('theme_boost_campus', 'catchcmdarrowdown') == true) {
    $catchshortcuts[] = 'cmdarrowdown';
}
// If setting is enabled then add the parameter to the array.
if (get_config('theme_boost_campus', 'catchctrlarrowdown') == true) {
    $catchshortcuts[] = 'ctrlarrowdown';
}
// MODIFICATION END.

// MODIFICATION START: Setting 'darknavbar'.
if (get_config('theme_boost_campus', 'darknavbar') == 'yes') {
    $darknavbar = true;
} else {
    $darknavbar = false;
}
// MODIFICATION END.

//legacy code support include css file
$PAGE->requires->css('/theme/boost_campus/css/legacy.css');


//including Dark Mode css if darkmode==1 if query string is set
//darkmode toggle code
$setdarkmode = optional_param('darkmode', -1, PARAM_INT);


if ($setdarkmode > -1) {
    $userid = $USER->id;
    $table = 'theme_boost_campus_darkmode';

    $newrecord = new stdClass();
    $newrecord->userid = $userid;

    //database check if user has a record, insert if not
    if ($record = $DB->get_record($table, array('userid'=>$userid))) {
     //if has a record, update record to $setdarkmode
     
     $newrecord->darkmode = $setdarkmode;
     $newrecord->id = $record->id;
     $DB->update_record($table, $newrecord);
    }
    else {
        //create a record
        $newrecord->darkmode = $setdarkmode;
        $DB->insert_record($table, $newrecord);
    }  
    
 }


//check if user has darkmode on in database and include if so
if($DB->get_record('theme_boost_campus_darkmode', array('userid'=>$USER->id, 'darkmode'=>1))){
   $PAGE->requires->css('/theme/boost_campus/css/darkmode.css');
}
   

// MODIFICATION START: Setting 'navdrawerfullwidth'.
$navdrawerfullwidth = get_config('theme_boost_campus', 'navdrawerfullwidth');
// MODIFICATION END.

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    // MODIFICATION START: Add Boost Campus realated values to the template context.
    'catchshortcuts' => json_encode($catchshortcuts),
    'navdrawerfullwidth' => $navdrawerfullwidth,
    'darknavbar' => $darknavbar
    // MODIFICATION END.
];

// MODIDFICATION START.
// Use the returned value from theme_boost_campus_get_modified_flatnav_defaulthomepageontop as the template context.
$templatecontext['flatnavigation'] = theme_boost_campus_process_flatnav($PAGE->flatnav);
// If setting showsettingsincourse is enabled.
if (get_config('theme_boost_campus', 'showsettingsincourse') == 'yes') {
    // Context value for requiring incoursesettings.js.
    $templatecontext['incoursesettings'] = true;
    // Add the returned value from theme_boost_campus_get_incourse_settings to the template context.
    $templatecontext['node'] = theme_boost_campus_get_incourse_settings();
    // Add the returned value from theme_boost_campus_get_incourse_activity_settings to the template context.
    $templatecontext['activitynode'] = theme_boost_campus_get_incourse_activity_settings();
}

// MODIFICATION START: Handle additional layout elements.
// The output buffer is needed to render the additional layout elements now without outputting them to the page directly.
ob_start();

// Require additional layout files.
// Add footer blocks and standard footer.
require_once(__DIR__ . '/includes/footer.php');
// Get imageareaitems config.
$imageareaitems = get_config('theme_boost_campus', 'imageareaitems');
if (!empty($imageareaitems)) {
    // Add imagearea layout file.
    require_once(__DIR__ . '/includes/imagearea.php');
}
// Get footnote config.
$footnote = get_config('theme_boost_campus', 'footnote');
if (!empty($footnote)) {
    // Add footnote layout file.
    require_once(__DIR__ . '/includes/footnote.php');
}

// Get output buffer.
$pagebottomelements = ob_get_clean();

// If there isn't anything in the buffer, set the additional layouts string to an empty string to avoid problems later on.
if ($pagebottomelements == false) {
    $pagebottomelements = '';
}
// Add the additional layouts to the template context.
$templatecontext['pagebottomelements'] = $pagebottomelements;

// Render columns2.mustache from boost_campus.
echo $OUTPUT->render_from_template('theme_boost_campus/columns2', $templatecontext);
// MODIFICATION END.
/* ORIGINAL START.
echo $OUTPUT->render_from_template('theme_boost/columns2', $templatecontext);
ORIGINAL END. */

