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

    /**
     * Initialising.
     */
    function initInCourseSettings() {
        var courseSettings = $('#boost-campus-course-settings');
        var activitySettings = $('#boost-campus-activity-settings');
        var frontpage = $('body').hasClass('pagelayout-frontpage');

        // Only change the behaviour if the setting is enabled and we are not on the frontpage,
        // because we did not change the settings menu there. So we need the default propagation here.
        if (!frontpage) {
            $('#page-header .context-header-settings-menu').on('click', function (event) {
                event.stopPropagation();
                if (courseSettings.is(":visible")) {
                    courseSettings.hide(400);
                } else {
                    courseSettings.show(400);
                    // Additionally close activity settings if they are currently open.
                    if (activitySettings.is(":visible")) {
                        activitySettings.hide(400);
                    }
                }
            });
            $('#region-main-settings-menu .action-menu .dropdown-toggle').on('click', function (event) {
                event.stopPropagation();
                if (activitySettings.is(":visible")) {
                    activitySettings.hide(400);
                } else {
                    activitySettings.show(400);
                    // Additionally close course settings if they are currently open.
                    if (courseSettings.is(":visible")) {
                        courseSettings.hide(400);
                    }
                }
            });
        }
    }

    return {
        init: function() {
            initInCourseSettings();
        }
    };
});
