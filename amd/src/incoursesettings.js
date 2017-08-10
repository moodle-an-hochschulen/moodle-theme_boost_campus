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
 * Theme Boost Campus - JS code for displaying course setting within the course.
 *
 * @package    theme_boost_campus
 * @copyright  2017 Kathrin Osswald, Ulm University <kathrin.osswald@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(['jquery'], function($) {
    "use strict";

    function initInCourseSettings() {
        $('#page-header .context-header-settings-menu').on('click', function (e) {
            e.stopPropagation();
            if ($('#boost-campus-course-settings').is(":visible")) {
                $('#boost-campus-course-settings').hide(400);
            } else {
                $('#boost-campus-course-settings').show(400);
            }
        });
    }

    return {
        init: function() {
            initInCourseSettings();
        }
    };
});
