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

define(['jquery', 'core/ajax', 'core/notification', 'core/str',
    'core/modal_factory', 'core/modal_events'], function($, ajax, notification, str, ModalFactory, ModalEvents) {

    /** Container jquery object. */
    var _root;
    /** Course ID */
    var _courseid;
	
    var _availability;
    var _element;

    /** Jquery selector strings. */
    var SELECTORS = {
        HEADER: '#page-header .header-body',
        HEADER_TOP: "#page-header .page-head",
        HDRMAKEAVAIL_BTN: '#avail_btn',
    };

    /**
     * Initializes global variables.
     * @param {string} root - Jquery selector for container.
     * @param {int} availability - course visible
     * @param {int} courseid - ID of current course.
     * @return void
     */
    var _setGlobals = function(root, courseid, availability) {
       _root = $(root);
       _courseid = courseid;
       _availability = availability;
    };

    /**
     * Sets up event listeners.
     * @return void
     */
    var _registerEventListeners = function() {
        _root.on('click', SELECTORS.HDRMAKEAVAIL_BTN, _toggleAvailability);
    };


    /**
     * Initiate ajax call to upload and set new image.
     */
    var _toggleAvailability = function() {
        _element = $(this);

        //if current style is clicked, do nothing...
        console.log('_availability:'+_availability);
        /*
        if ('#'+_element.attr('id') == SELECTORS.HDRSTYLEA_BTN && _headerstyle == 0) {
            return;
        } else if ('#'+_element.attr('id') == SELECTORS.HDRSTYLEB_BTN && _headerstyle == 1) {
            return;
        }
        */

        //adding in confirmation modal in case buttons accidentally clicked
        ModalFactory.create({
            type: ModalFactory.types.SAVE_CANCEL,
            title: '<b>Make this course '+(_availability==1?'un':'')+'available?</b>',
            body: "<p>Are you sure you want to make this course <b>"+(_availability==1?'un':'')+"available</b> to students?</b><br /><span class=\"small\">You can change the availability of this course as needed, when you're ready.</span></p>"
        })
        .then(function(modal) {
            modal.setSaveButtonText('Yes, make it '+(_availability==1?'un':'')+'available');
            var root = modal.getRoot();
            root.on(ModalEvents.cancel, function(){
                return;
            });
            root.on(ModalEvents.save, _availabilityChange);
            modal.show();
        });
    };


    var _availabilityChange = function() {
        

        // return if required values aren't set
        if (!_courseid) {
            return;
        }

        // set args
        var args = {
            courseid: _courseid,
            availability: _availability,
        };

        // set ajax call
        var ajaxCall = {
            methodname: 'theme_urcourses_default_toggle_course_availability',
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
        str.get_string('success:courseavailabilitychanged', 'theme_urcourses_default')
            .done(_createSuccessPopup);
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
        popup.prop('id','cstyle_success_popup');
        popup.css({'position' : 'absolute'});
        popup.css({'right' : '5px'});
        popup.css({'bottom' : '30px'});
        popup.css({'z-index' : '1200'});
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

        // makes the alert disapear after a set amout of time.
        setTimeout(function() {
            $('#cstyle_success_popup').fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
				location.reload(true);
            });
        },1800);
    };

    /**
     * Entry point to module. Sets globals and registers event listeners.
     * @param {String} root Jquery selector for container.
     * @return void
     */
    var init = function(root, courseid, availability) {
        _setGlobals(root, courseid, availability);
        _registerEventListeners();
    };

    return {
        init: init
    };

});