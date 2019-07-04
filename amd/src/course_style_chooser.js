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
 * Theme Boost Campus - Code for course header image uploader.
 *
 * @package    theme_urcourses_default
 * @author     John Lane
 * 
 */

define(['jquery', 'core/ajax', 'core/notification', 'core/str'], function($, ajax, notification, str) {

    /** Container jquery object. */
    var _root;
    /** Course ID */
    var _courseid;
    /** Selected Header style. */
    var _headerstyle;

    /** Jquery selector strings. */
    var SELECTORS = {
        HEADER: '#page-header .header-body',
        HEADER_TOP: "#page-header .page-head",
        HDRSTYLEA_BTN: '#hdr_chooser_a',
        HDRSTYLEB_BTN: '#hdr_chooser_b',
    };

    /**
     * Initializes global variables.
     * @param {string} root - Jquery selector for container.
     * @param {int} headerstyle - selected header style.
     * @param {int} courseid - ID of current course.
     * @return void
     */
    var _setGlobals = function(root, headerstyle, courseid) {
       _root = $(root);
       _headerstyle = headerstyle;
       _courseid = courseid;
    };

    /**
     * Initializes _headerstyle.
     * @param {string} headerstyle 
     */
    var _setHeaderStyle = function(imagedata) {
        _headerstyle = headerstyle;
    };

    /**
     * Sets up event listeners.
     * @return void
     */
    var _registerEventListeners = function() {
        _root.on('click', SELECTORS.HDRSTYLEA_BTN, _chooseStyle);
        _root.on('click', SELECTORS.HDRSTYLEB_BTN, _chooseStyle);
    };


    /**
     * Initiate ajax call to upload and set new image.
     */
    var _chooseStyle = function() {
		
		console.log('header clicked');
		
        // return if required values aren't set
        if (!_headerstyle || !_courseid) {
            return;
        }

        // set args
        var args = {
            courseid: _courseid,
            headerstyle: _headerstyle,
        };

        // set ajax call
        var ajaxCall = {
            methodname: 'theme_urcourses_default_header_choose_style',
            args: args,
            done: _choiceDone,
            fail: notification.exception
        };

        // initiate ajax call
        ajax.call([ajaxCall]);
    };

    /**
     * Handles theme_urcourses_default_upload_course_image response data.
     * @param {Object} response 
     */
    var _choiceDone = function() {
        str.get_string('success:coursestylechosen', 'theme_urcourses_default')
            .done(_createSuccessPopup);
    };

    /**
     * Creates a bootstrap dismissable containing error text. 
     * Dismissable should appear in header and should cover upload button.
     * @param {string} text Error text
     */
    var _createErrorPopup = function(text) {
        // create bootstrap 4 dismissable
        var popup = $('<div></div>');
        popup.text(text);
        popup.css({'position' : 'absolute'});
        popup.css({'right' : '5px'});
        popup.addClass('alert alert-danger alert-dismissable fade show');

        // create dismiss button
        var dismissBtn = $('<button></button>');
        dismissBtn.html('&times;');
        dismissBtn.addClass('close');
        dismissBtn.attr('type', 'button');
        dismissBtn.attr('data-dismiss', 'alert');

        // append dismiss button to popup
        popup.append(dismissBtn);

        // add to header's course image area
        $(SELECTORS.HEADER_TOP).append(popup);
    };

    /**
     * Creates a bootstrap dismissable containing success text.
     * Dismissable should appear in header and should cover upload button.
     * @param {string} text Success text.
     */
    var _createSuccessPopup = function(text) {
        // create bootstrap 4 dismissable
        var popup = $('<div></div>');
        popup.text(text);
        popup.css({'position' : 'absolute'});
        popup.css({'right' : '5px'});
        popup.addClass('alert alert-success alert-dismissable fade show');

        // create dismiss button
        var dismissBtn = $('<button></button>');
        dismissBtn.html('&times;');
        dismissBtn.addClass('close');
        dismissBtn.attr('type', 'button');
        dismissBtn.attr('data-dismiss', 'alert');

        // append dismiss button to popup
        popup.append(dismissBtn);

        // add to header's course image area
        $(SELECTORS.HEADER_TOP).append(popup);
    };

    /**
     * Entry point to module. Sets globals and registers event listeners.
     * @param {String} root Jquery selector for container.
     * @return void
     */
    var init = function(root, courseid, headerstyle) {
        _setGlobals(root, courseid, headerstyle);
        _registerEventListeners();
    };

    return {
        init: init
    };

});