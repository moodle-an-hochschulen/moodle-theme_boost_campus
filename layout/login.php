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

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'bodyattributes' => $bodyattributes,
    'loginbackgroundimagetext' => $loginbackgroundimagetext
];

// MODIFICATION START: Handle additional layout elements.
// The output buffer is needed to render the additional layout elements now without outputting them to the page directly.
ob_start();

// Include own layout file for the footnote region.
// The theme_boost/login template already renders the standard footer.
// The footer blocks and the image area are currently not shown on the login page.
// Here, we will add the footnote only.
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

// Render own template.
echo $OUTPUT->render_from_template('theme_boost_campus/login', $templatecontext);
// MODIFICATION END.
/* ORIGINAL START.
echo $OUTPUT->render_from_template('theme_boost/login', $templatecontext);
ORIGINAL END. */
