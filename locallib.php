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
* Theme Boost Campus - Locallib file
 *
 * @package   theme_boost_campus
 * @copyright 2017 Kathrin Osswald, Ulm University kathrin.osswald@uni-ulm.de
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 defined('MOODLE_INTERNAL') || die();


/**
  * Get a random class for body tag for the background image of the login page.
  * This function always loads the files from the filearea that is not really performant.
  * However, we accept this at the moment as it is only invoked on the login page.
  *
  * @return string
  */
function theme_boost_campus_get_random_loginbackgroundimage_class() {

    // Fetch context.
    $systemcontext = \context_system::instance();

    // Get filearea.
    $fs = get_file_storage();

    // Get all files from filearea.
    $files = $fs->get_area_files($systemcontext->id, 'theme_boost_campus', 'loginbackgroundimage', false, 'itemid', false);

    // Get count of array elements.
    $filecount = count($files);

    /* We only add this class to the body background of the login page if images are uploaded at all (filearea contains images). */
    if ($filecount > 0) {
        // Generate random number.
        $random_index = rand(1, $filecount);
        return "loginbackgroundimage" . $random_index;
    } else {
        return "";
    }
}


/**
  * Add background images from setting 'loginbackgroundimage' to SCSS.
  *
  * @return string
  */
function theme_boost_campus_get_loginbackgroundimage_scss() {
    $count = 0;
    $scss = "";

    // Fetch context.
    $systemcontext = \context_system::instance();

    // Get filearea.
    $fs = get_file_storage();

    // Get all files from filearea.
    $files = $fs->get_area_files($systemcontext->id, 'theme_boost_campus', 'loginbackgroundimage', false, 'itemid', false);

    // Add URL of uploaded images to eviqualent class
    foreach ($files as $file) {
        $count++;
        // Get url from file.
        $url = moodle_url::make_pluginfile_url($file->get_contextid(), $file->get_component(), $file->get_filearea(),
                $file->get_itemid(), $file->get_filepath(), $file->get_filename());
        // Add this url to the body class loginbackgroundimage[n] as a background image.
        $scss .= '$loginbackgroundimage' . $count.': "' . $url . '";';
    }

    return $scss;
}
