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
 * Theme Boost Campus Login - Layout file.
 *
 * @package   theme_boost_campus
 * @copyright 2017 Kathrin Osswald, Ulm University kathrin.osswald@uni-ulm.de
 * @copyright based on code from theme_boost by Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/theme/boost_campus/locallib.php');

$bodyattributes = $OUTPUT->body_attributes();
$loginbackgroundimagetext = theme_boost_campus_get_loginbackgroundimage_text();

// MODIFICATION START: Set these variables in any case as it's needed in the columns2.mustache file.
$perpinfobannershowonselectedpage = false;
$timedinfobannershowonselectedpage = false;
// MODIFICATION END.

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'bodyattributes' => $bodyattributes,
    'loginbackgroundimagetext' => $loginbackgroundimagetext,
    'perpinfobannershowonselectedpage' => $perpinfobannershowonselectedpage,
    'timedinfobannershowonselectedpage' => $timedinfobannershowonselectedpage
];

// MODIFICATION START: Settings for information banner.
$perpibenable = get_config('theme_boost_campus', 'perpibenable');

if ($perpibenable) {
    $perpibcontent = format_text(get_config('theme_boost_campus', 'perpibcontent'), FORMAT_HTML);
    // Result of multiselect is a string divided by a comma, so exploding into an array.
    $perpibshowonpages = explode(",", get_config('theme_boost_campus', 'perpibshowonpages'));
    $perpibcss = get_config('theme_boost_campus', 'perpibcss');

    $perpinfobannershowonselectedpage = theme_boost_campus_show_banner_on_selected_page($perpibshowonpages,
            $perpibcontent, $PAGE->pagelayout, false);

    // Add the variables to the templatecontext array.
    $templatecontext['perpibcontent'] = $perpibcontent;
    $templatecontext['perpibcss'] = $perpibcss;
    $templatecontext['perpinfobannershowonselectedpage'] = $perpinfobannershowonselectedpage;
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

// MODIFICATION START: Handle additional layout elements.
// The theme_boost/login template already renders the standard footer.
// The footer blocks and the image area are currently not shown on the login page.
// Here, we will add the footnote only.
require_once(__DIR__ . '/includes/footnote.php');
// MODIFICATION END.

// MODIFICATION START.
// Render own template.
echo $OUTPUT->render_from_template('theme_boost_campus/login', $templatecontext);
// MODIFICATION END.
/* ORIGINAL START.
echo $OUTPUT->render_from_template('theme_boost/login', $templatecontext);
ORIGINAL END. */
