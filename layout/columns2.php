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

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot . '/theme/boost_campus/locallib.php');

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
$catchshortcuts = array();
$catchendkey = get_config('theme_boost_campus', 'catchendkey');
if (isset($catchendkey) && $catchendkey == true) {
    $catchshortcuts[] = 'end';
}
$catchcmdarrowdown = get_config('theme_boost_campus', 'catchcmdarrowdown');
if (isset($catchcmdarrowdown) && $catchcmdarrowdown == true) {
    $catchshortcuts[] = 'cmdarrowdown';
}
$catchctrlarrowdown = get_config('theme_boost_campus', 'catchctrlarrowdown');
if (isset($catchctrlarrowdown) && $catchctrlarrowdown == true) {
    $catchshortcuts[] = 'ctrlarrowdown';
}
$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'catchshortcuts' => json_encode($catchshortcuts)
];

// MODIDFICATION START.
// Use the returned value from theme_boost_campus_get_modified_flatnav_defaulthomepageontop as the template context.
$templatecontext['flatnavigation'] = theme_boost_campus_process_flatnav($PAGE->flatnav);
// Render colums2.mustache from boost_campus.
echo $OUTPUT->render_from_template('theme_boost_campus/columns2', $templatecontext);
// MODIFICATION END.
/* ORIGINAL START.
echo $OUTPUT->render_from_template('theme_boost/columns2', $templatecontext);
ORIGINAL END. */

// MODIFICATION START.
// Add footer blocks and standard footer.
require_once(dirname(__FILE__).'/includes/footer.php');
// Add badgearea.
require_once(dirname(__FILE__).'/includes/badgearea.php');
// Add footnote.
require_once(dirname(__FILE__).'/includes/footnote.php');
// MODIFICATION END.
