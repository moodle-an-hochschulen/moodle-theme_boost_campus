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
 * Theme Boost Campus - JS code for catching pressed keys.
 *
 * @package    theme_boost_campus
 * @copyright  2017 Kathrin Osswald, Ulm University <kathrin.osswald@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(['jquery'], function($) {
    "use strict";

    /**
     * Initialising.
     *
     * @param {string} value
     */
    function initcatchshortcuts(value) {
        if (value == 'end') {
            // Catch the end key to be able to change the behavior.
            $(document).keydown(function(e) {
                if (e.keyCode == 35) {
                    // Additionally check no active focus in form elements.
                    if (checkForActiveFormElement() != true) {
                        // Scroll only to the bottom of the course content.
                        scrollToBottomOfCourse(e);
                    }
                }
            });
        }
        // This shortcut is only relevant for users operating on MacOS.
        if (navigator.appVersion.indexOf("Mac") != -1 && value == 'cmdarrowdown') {
            // Bind the cmd + arrow down shortcut to be able to change the behavior.
            $(document).keydown(function(e) {
                if (e.keyCode == 40 && e.metaKey) {
                    // Additionally check no active focus in form elements.
                    if (checkForActiveFormElement() != true) {
                        // Scroll only to the bottom of the course content.
                        scrollToBottomOfCourse(e);
                    }
                }
            });
        }
        // This shortcut is only relevant for users operating on Windows.
        if (navigator.appVersion.indexOf("Win") != -1 && value == 'ctrlarrowdown') {
            // Bind the ctrl + arrow down shortcut to be able to change the behavior.
            $(document).keydown(function(e) {
                if (e.keyCode == 40 && e.ctrlKey) {
                    // Additionally check no active focus in form elements.
                    if (checkForActiveFormElement() != true) {
                        // Scroll only to the bottom of the course content.
                        scrollToBottomOfCourse(e);
                    }
                }
            });
        }
    }

    /**
     * Function to scroll only to the bottom of the course and not the bottom of the whole page.
     *
     * @param {object} event
     */
    function scrollToBottomOfCourse(event) {
        // Prevent default behavior.
        event.preventDefault();
        // Scroll only to the bottom of the course content.
        $('html, body').animate({
            scrollTop: $('#page-footer').offset().top - $(window).height() + 50
        }, 500);
    }

    /**
     * Function to check for an active form element.
     *
     * @return {boolean}
     */
    function checkForActiveFormElement() {
        // Get the active Element for the current page.
        var activeElement = document.activeElement;
        var returnvalue = false;
        // Check if the given active element is type of input field, textarea or editable content.
        if (activeElement.tagName == 'INPUT' || activeElement.tagName == 'TEXTAREA' || activeElement.isContentEditable == true) {
            returnvalue = true;
        }
        return returnvalue;
    }

    return {
        init: function(params) {
            for (var i = 0, len = params.length; i < len; i++) {
                initcatchshortcuts(params[i]);
            }
        }
    };
});
