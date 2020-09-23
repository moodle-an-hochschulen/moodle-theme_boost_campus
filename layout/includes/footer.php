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
 * Theme Boost Campus - Layout file for footer.
 *
 * @package   theme_boost_campus
 * @copyright 2017 Kathrin Osswald, Ulm University kathrin.osswald@uni-ulm.de
 * @copyright based on code from theme_boost by Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$footerblocksetting = get_config('theme_boost_campus', 'footerblocks');

// Setting is set to one columns layout.
if ($footerblocksetting === '1columns') {
    $templatecontext['footerleftblocks'] = $OUTPUT->blocks('footer-left');
    $templatecontext['footerblock1columns'] = true;
}

// Setting is set to two columns layout.
if ($footerblocksetting === '2columns') {
    $templatecontext['footerleftblocks'] = $OUTPUT->blocks('footer-left');
    $templatecontext['footerrightblocks'] = $OUTPUT->blocks('footer-right');
    $templatecontext['footerblock2columns'] = true;
}

// Setting is set to three columns layout.
if ($footerblocksetting === '3columns') {
    $templatecontext['footerleftblocks'] = $OUTPUT->blocks('footer-left');
    $templatecontext['footermiddleblocks'] = $OUTPUT->blocks('footer-middle');
    $templatecontext['footerrightblocks'] = $OUTPUT->blocks('footer-right');
    $templatecontext['footerblock3columns'] = true;
}
