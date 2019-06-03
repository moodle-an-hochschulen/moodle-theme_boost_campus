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
 * @package    theme_boost_campus
 * @author     John Lane
 * 
 */

define(['jquery', 'core/ajax', 'core/notification'], function($, ajax, notification) {

    /** Container jquery object. */
    var _root;
    /** Maximum file size. */
    var _maxbytes;
    /** Course ID */
    var _courseid;
    /** Image data for course image to be uploaded. */
    var _imagedata;
    /** Name of image. */
    var _imagename;

    /** Jquery selector strings. */
    var SELECTORS = {
        UPLOADER: '#course_image_uploader',
        HEADER: '#page-header .header-body',
        HEADER_TOP: "#page-header .page-head",
        UPLOAD_BTN: '#upload_img_confirm',
        CANCEL_BTN: '#upload_img_cancel',
    };

    /**
     * Initializes global variables.
     * @param {string} root - Jquery selector for container.
     * @param {int} maxbytes - Maximum allowed file size.
     * @param {int} courseid - ID of current course.
     * @return void
     */
    var _setGlobals = function(root, maxbytes, courseid) {
       _root = $(root);
       _maxbytes = maxbytes;
       _courseid = courseid;
    };

    /**
     * Initializes _imagedata.
     * @param {string} imagedata 
     */
    var _setImageData = function(imagedata) {
        _imagedata = imagedata;
    };

    /**
     * Initializes _imagename.
     * @param {string} imagename 
     */
    var _setImageName = function(imagename) {
        _imagename = imagename;
    };

    /**
     * Sets up event listeners.
     * @return void
     */
    var _registerEventListeners = function() {
        _root.on('change', SELECTORS.UPLOADER, _handleImageChange);
        _root.on('click', SELECTORS.UPLOAD_BTN, _uploadImage);
        _root.on('click', SELECTORS.CANCEL_BTN, _cancelUpload);
    };

    /**
     * Sets course image to uploaded file.
     * Mostly lifted from theme_snap.
     * @param {Object} event 
     * @return void
     */
    var _handleImageChange = function(event) {
        // if no file was uploaded, return
        if (!event.target.files.length) {
            return;
        }

        // get the file
        var file = event.target.files[0];

        // if file was not an image, return
        if (!file.type.match('image.*')) {
            return;
        }

        // if the file is too big, return
        if (file.size > _maxbytes) {
            return;
        }

        // set _imagename
        _setImageName(file.name);

        var reader = new FileReader();
        reader.onload = _confirmImageUpload;
        reader.readAsDataURL(file);
    };

    /**
     * Prompts user to confirm image upload.
     * @param {Object} event 
     */
    var _confirmImageUpload = function(file) {
        var imagedata = file.target.result;

        // store original image in DOM node
        $(SELECTORS.HEADER).data('original_img', $(SELECTORS.HEADER).css('background-image'));

        // set background image to temp file
        $(SELECTORS.HEADER).css({'background-image': 'url(' + imagedata + ')'});

        // show confirm/cancel buttons
        _root.addClass('confirm');
        
        // init _imagedata
        imagedata = imagedata.split('base64,')[1];
        _setImageData(imagedata);
    };

    /**
     * Initiate ajax call to upload and set new image.
     */
    var _uploadImage = function() {
        // return if required values aren't set
        if (!_imagedata || !_imagename || !_courseid) {
            return;
        }

        // set args
        args = {
            courseid: _courseid,
            imagedata: _imagedata,
            imagename: _imagename,
        };

        // set ajax call
        ajaxCall = {
            methodname: 'theme_boost_campus_upload_course_image',
            args: args,
            done: _uploadDone,
            fail: notification.exception
        };

        // initiate ajax call
        ajax.call([ajaxCall]);
    };

    /**
     * Handles theme_boost_campus_upload_course_image response data.
     * @param {Object} response 
     */
    var _uploadDone = function(response) {
        _root.removeClass('confirm');
    };

    /**
     * Unsets _imagedata, resets course header image, removes confirm/cancel buttons.
     */
    var _cancelUpload = function() {
        // unset image data
        _setImageData('');
        _setImageName('');

        // reset header image
        var original_img = $(SELECTORS.HEADER).data('original_img');
        $(SELECTORS.HEADER).css({'background-image': original_img});

        // hide save/cancel buttons
        _root.removeClass('confirm');
    };

    /**
     * Entry point to module. Sets globals and registers event listeners.
     * @param {String} root Jquery selector for container.
     * @return void
     */
    var init = function(root, maxbytes, courseid) {
        _setGlobals(root, maxbytes, courseid);
        _registerEventListeners();
    };

    return {
        init: init
    };

});