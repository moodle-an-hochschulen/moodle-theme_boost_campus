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
global $PAGE;
// MODIFICATION END.

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
// MODIFICATION START: Allow own user preference to be set via Javascript.
user_preference_allow_ajax_update('theme_boost_campus_infobanner_dismissed', PARAM_BOOL);
// MODIFICATION END.
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

// MODIFICATION START: Setting 'navdrawerfullwidth'.
$navdrawerfullwidth = get_config('theme_boost_campus', 'navdrawerfullwidth');
// MODIFICATION END.

// MODIFICATION START: Set these variables in any case as it's needed in the columns2.mustache file.
$perpinfobannershowonselectedpage = false;
$timedinfobannershowonselectedpage = false;
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
    // MODIFICATION START: Add Boost Campus related values to the template context.
    'catchshortcuts' => json_encode($catchshortcuts),
    'navdrawerfullwidth' => $navdrawerfullwidth,
    'darknavbar' => $darknavbar,
    'perpinfobannershowonselectedpage' => $perpinfobannershowonselectedpage,
    'timedinfobannershowonselectedpage' => $timedinfobannershowonselectedpage
    // MODIFICATION END.
];

// MODIFICATION START: Settings for perpetual information banner.
$perpibenable = get_config('theme_boost_campus', 'perpibenable');

if ($perpibenable) {
    $perpibcontent = format_text(get_config('theme_boost_campus', 'perpibcontent'), FORMAT_HTML);
    // Result of multiselect is a string divided by a comma, so exploding into an array.
    $perpibshowonpages = explode(",", get_config('theme_boost_campus', 'perpibshowonpages'));
    $perpibcss = get_config('theme_boost_campus', 'perpibcss');
    $perpibdismiss = get_config('theme_boost_campus', 'perpibdismiss');
    $perbibconfirmdialogue = get_config('theme_boost_campus', 'perpibconfirm');
    $perbibuserprefdialdismissed = get_user_preferences('theme_boost_campus_infobanner_dismissed');

    $perpinfobannershowonselectedpage = theme_boost_campus_show_banner_on_selected_page($perpibshowonpages,
            $perpibcontent, $PAGE->pagelayout, $perbibuserprefdialdismissed);

    // Add the variables to the templatecontext array.
    $templatecontext['perpibcontent'] = $perpibcontent;
    $templatecontext['perpibcss'] = $perpibcss;
    $templatecontext['perpibdismiss'] = $perpibdismiss;
    $templatecontext['perpinfobannershowonselectedpage'] = $perpinfobannershowonselectedpage;
    $templatecontext['perbibconfirmdialogue'] = $perbibconfirmdialogue;
}
// MODIFICATION END.

// MODIFICATION START: Settings for time controlled information banner.
$timedibenable = get_config('theme_boost_campus', 'timedibenable');

if ($timedibenable) {
    $timedibcontent = format_text(get_config('theme_boost_campus', 'timedibcontent'), FORMAT_HTML);
    // Result of multiselect is a string divided by a comma, so exploding into an array.
    $timedibshowonpages = explode(",", get_config('theme_boost_campus', 'timedibshowonpages'));
    $timedibcss = get_config('theme_boost_campus', 'timedibcss');
    $timedibstartsetting = get_config('theme_boost_campus', 'timedibstart');
    $timedibendsetting = get_config('theme_boost_campus', 'timedibend');
    // Get the current server time.
    $now = (new DateTime("now", core_date::get_server_timezone_object()))->getTimestamp();

    $timedinfobannershowonselectedpage = theme_boost_campus_show_timed_banner_on_selected_page($now, $timedibshowonpages,
            $timedibcontent, $timedibstartsetting, $timedibendsetting, $PAGE->pagelayout);

    // Add the variables to the templatecontext array.
    $templatecontext['timedibcontent'] = $timedibcontent;
    $templatecontext['timedibcss'] = $timedibcss;
    $templatecontext['timedinfobannershowonselectedpage'] = $timedinfobannershowonselectedpage;
}
// MODIFICATION END.

$nav = $PAGE->flatnav;
// MODIDFICATION START.
// Use the returned value from theme_boost_campus_get_modified_flatnav_defaulthomepageontop as the template context.
$templatecontext['flatnavigation'] = theme_boost_campus_process_flatnav($nav);
// If setting showsettingsincourse is enabled.
if (get_config('theme_boost_campus', 'showsettingsincourse') == 'yes') {
    // Context value for requiring incoursesettings.js.
    $templatecontext['incoursesettings'] = true;
    // Add the returned value from theme_boost_campus_get_incourse_settings to the template context.
    $templatecontext['node'] = theme_boost_campus_get_incourse_settings();
    // Add the returned value from theme_boost_campus_get_incourse_activity_settings to the template context.
    $templatecontext['activitynode'] = theme_boost_campus_get_incourse_activity_settings();
}
// MODIFICATION END.
/* ORIGINAL START.
$templatecontext['flatnavigation'] = $nav;
ORIGINAL END. */

$templatecontext['firstcollectionlabel'] = $nav->get_collectionlabel();

// MODIFICATION START.
// Set the template context for the footer and additional layouts.
require_once(__DIR__ . '/includes/footer.php');
require_once(__DIR__ . '/includes/imagearea.php');
require_once(__DIR__ . '/includes/footnote.php');
// MODIFICATION END.

// MODIFICATION START.
// Render columns2.mustache from boost_campus.
echo $OUTPUT->render_from_template('theme_boost_campus/columns2', $templatecontext);
// MODIFICATION END.
/* ORIGINAL START.
echo $OUTPUT->render_from_template('theme_boost/columns2', $templatecontext);
ORIGINAL END. */
