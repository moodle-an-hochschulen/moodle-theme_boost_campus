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
        $randomindex = rand(1, $filecount);
        return "loginbackgroundimage" . $randomindex;
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

    // Add URL of uploaded images to eviqualent class.
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


/**
 * Create information needed for the badgearea.mustache file.
 *
 * @return array
 */
function theme_boost_campus_get_badgeareacontent() {
    // Get cache.
    $themeboostcampuscache = cache::make('theme_boost_campus', 'badgearea');
    // If cache is filled, return the cache.
    $cachecontent = $themeboostcampuscache->get('badgeareadata');
    if (!empty($cachecontent)) {
        return $cachecontent;
    } else { // Create cache.
        // Fetch context.
        $systemcontext = \context_system::instance();
        // Get filearea.
        $fs = get_file_storage();
        // Get all files from filearea.
        $files = $fs->get_area_files($systemcontext->id, 'theme_boost_campus', 'badgeareaitems', false, 'itemid', false);

        // Only continue processing if there are files in the filearea.
        if (!empty($files)) {
            // Get the content from the setting badgeareaitemslink and explode it to an array by the delimiter "new line".
            // The string contains: the image identifier (uploaded file name) and the corresponding link URL.
            $lines = explode("\n", get_config('theme_boost_campus', 'badgeareaitemslink'));
            // Parse item settings.
            foreach ($lines as $line) {
                $line = trim($line);
                // If the setting is empty.
                if (strlen($line) == 0) {
                    // Create an array with a dummy entry because the function array_key_exists need a
                    // not empty array for parameter 2.
                    $links = array('foo');
                    continue;
                } else {
                    $settings = explode("|", $line);
                    // Check if both parameters are set.
                    if (!empty($settings[1])) {
                         // The name of the image is the key for the URL that will be set.
                        $links[$settings[0]] = $settings[1];
                    }
                }
            }
            // Traverse the files.
            foreach ($files as $file) {
                // Get the Moodle url for each file.
                $url = moodle_url::make_pluginfile_url($file->get_contextid(), $file->get_component(), $file->get_filearea(),
                    $file->get_itemid(), $file->get_filepath(), $file->get_filename());
                // Get the path to the file.
                $filepath = $url->get_path();
                // Get the filename.
                $filename = $file->get_filename();
                // If filename and key value from the badgeareaitemslink setting entry match.
                if (array_key_exists($filename, $links)) {
                    // Set the file and the corresponding link.
                    $badgeareacache[] = array('filepath' => $filepath, 'linkpath' => $links[$filename]);
                    // Fill the cache.
                    $themeboostcampuscache->set('badgeareadata', $badgeareacache);
                } else { // Just add the file without a link.
                    $badgeareacache[] = array('filepath' => $filepath);
                    // Fill the cache.
                    $themeboostcampuscache->set('badgeareadata', $badgeareacache);
                }
            }
            // Sort array alphabetically ascending to the key "filepath".
            usort($badgeareacache, function($a, $b) {
                return strcmp($a["filepath"], $b["filepath"]);
            });
            return $badgeareacache;
        } else { // If no images are uploaded, then cache an empty array.
            return $themeboostcampuscache->set('badgeareadata', array());
        }
    }
}


/**
 * Returns a modified flat_navigation object.
 *
 * @param flat_navigation $flatnav The flat navigation object.
 * @return flat_navigation.
 */
function theme_boost_campus_process_flatnav(flat_navigation $flatnav) {
    global $USER;
    // If the setting defaulthomepageontop is enabled.
    if (get_config('theme_boost_campus', 'defaulthomepageontop') == 'yes') {
        // Only proceed processing if we are in a course context.
        if ($flatnav->find('coursehome', global_navigation::TYPE_CUSTOM) != false) {
            // If the site home is set as the deafult homepage by the admin.
            if (get_config('core', 'defaulthomepage') == HOMEPAGE_SITE) {
                // Return the modified flat_navigtation.
                $flatnavreturn = theme_boost_campus_set_node_on_top($flatnav, 'home');
            } else if (get_config('core', 'defaulthomepage') == HOMEPAGE_MY) { // If the dashboard is set as the default homepage
                // by the admin.
                // Return the modified flat_navigtation.
                $flatnavreturn = theme_boost_campus_set_node_on_top($flatnav, 'myhome');
            } else if (get_config('core', 'defaulthomepage') == HOMEPAGE_USER) { // If the admin defined that the user can set
                // the default homepage for himself.
                // Site home.
                if (get_user_preferences('user_home_page_preference', $USER) == 0) {
                    // Return the modified flat_navigtation.
                    $flatnavreturn = theme_boost_campus_set_node_on_top($flatnav, 'home');
                } else if (get_user_preferences('user_home_page_preference', $USER) == 1 || // Dashboard.
                    get_user_preferences('user_home_page_preference', $USER) == false) { // If no user preference is set,
                    // use the default value of core setting default homepage (Dashboard).
                    // Return the modified flat_navigtation.
                    $flatnavreturn = theme_boost_campus_set_node_on_top($flatnav, 'myhome');
                } else { // Should not happen.
                    // Return the passed flat navigation without changes.
                    $flatnavreturn = $flatnav;
                }
            } else { // Should not happen.
                // Return the passed flat navigation without changes.
                $flatnavreturn = $flatnav;
            }
        } else { // Not in course context.
            // Return the passed flat navigation without changes.
            $flatnavreturn = $flatnav;
        }
    } else { // Defaulthomepageontop not enabled.
        // Return the passed flat navigation without changes.
        $flatnavreturn = $flatnav;
    }
    return $flatnavreturn;
}

/**
 * Modifies the flat_navigation to add the node on top.
 *
 * @param flat_navigation $flatnav The flat navigation object.
 * @param string $nodename The name of the node that is to modify.
 * @return flat_navigation.
 */
function theme_boost_campus_set_node_on_top(flat_navigation $flatnav, $nodename) {
    $pageflatnav = $flatnav->find($nodename, global_navigation::TYPE_SYSTEM);
    // Add the showdivider to the coursehome node as this is the next one and this will add a margin top to it.
    $flatnav->find('coursehome', global_navigation::TYPE_CUSTOM)->set_showdivider(true);
    // Remove the site home navigation node that it does not appear twice in the menu.
    $flatnav->remove($nodename);
    // Add the saved site home node as the before node of the course home node.
    $flatnav->add($pageflatnav, 'coursehome');
    // Return the modified changes.
    return $flatnav;
}
