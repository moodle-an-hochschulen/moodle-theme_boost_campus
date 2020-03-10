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
        var frontpage = $('body').hasClass('pagelayout-frontpage');

        // Only change the behaviour if the setting is enabled and we are not on the frontpage,
        // because we did not change the settings menu there. So we need the default propagation here.
        if (!frontpage) {

            var courseSettings = $('#boost-campus-course-settings');
            var activitySettings = $('#boost-campus-activity-settings');
            var headerCardBorderBottom = $('#page-header .card').css("border-bottom");
            var courseSettingsDropdownToggle = $('#page-header .context-header-settings-menu .dropdown-toggle');
            var activitySettingsDropdownToggle = $('#region-main-settings-menu .action-menu .dropdown-toggle');

            // Remove attribute aria-haspopup because we are replacing this with the in-course course settings and
            // set the new in-course course settings for the aria-controls attribute
            courseSettingsDropdownToggle.removeAttr('aria-haspopup').attr('aria-controls', 'boost-campus-course-settings');

            // Remove attribute aria-haspopup because we are replacing this with the in-course activity settings
            // set the new in-course activity settings for the aria-controls attribute
            activitySettingsDropdownToggle.removeAttr('aria-haspopup').attr('aria-controls', 'boost-campus-activity-settings');

            courseSettingsDropdownToggle.on('click', function(event) {
                event.stopPropagation();
                if (courseSettings.is(":visible")) {
                    courseSettings.hide(400);
                    courseSettingsDropdownToggle.attr('aria-expanded', 'false');
                    setTimeout(function() {
                        $('#page-header .card').css('border-bottom', headerCardBorderBottom);
                        $('#page-header > div').addClass('pb-3');
                    }, 300);
                } else {
                    courseSettings.show(400);
                    $('#page-header div').removeClass('pb-3');
                    $('#page-header .card').css('border-bottom', 'none');
                    courseSettings.css('border-top', 'none');
                    courseSettingsDropdownToggle.attr('aria-expanded', 'true');
                    // Additionally close activity settings if they are currently open.
                    if (activitySettings.is(":visible")) {
                        activitySettings.hide(400);
                        activitySettingsDropdownToggle.attr('aria-expanded', 'false');
                    }
                }
            });
            activitySettingsDropdownToggle.on('click', function(event) {
                event.stopPropagation();
                if (activitySettings.is(":visible")) {
                    activitySettings.hide(400);
                    activitySettingsDropdownToggle.attr('aria-expanded', 'false');
                } else {
                    activitySettings.show(400);
                    activitySettingsDropdownToggle.attr('aria-expanded', 'true');
                    setTimeout(function() {
                        $('#page-header .card').css('border-bottom', headerCardBorderBottom);
                        $('#page-header > div').addClass('pb-3');
                    }, 300);
                    // Additionally close course settings if they are currently open.
                    if (courseSettings.is(":visible")) {
                        courseSettings.hide(400);
                        courseSettingsDropdownToggle.attr('aria-expanded', 'false');
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
