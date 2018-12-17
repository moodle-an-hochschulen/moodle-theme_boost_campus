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
 * Create information needed for the imagearea.mustache file.
 *
 * @return array
 */
function theme_boost_campus_get_imageareacontent() {
    // Get cache.
    $themeboostcampuscache = cache::make('theme_boost_campus', 'imagearea');
    // If cache is filled, return the cache.
    $cachecontent = $themeboostcampuscache->get('imageareadata');
    if (!empty($cachecontent)) {
        return $cachecontent;
    } else { // Create cache.
        // Fetch context.
        $systemcontext = \context_system::instance();
        // Get filearea.
        $fs = get_file_storage();
        // Get all files from filearea.
        $files = $fs->get_area_files($systemcontext->id, 'theme_boost_campus', 'imageareaitems', false, 'itemid', false);

        // Only continue processing if there are files in the filearea.
        if (!empty($files)) {
            // Get the content from the setting imageareaitemslink and explode it to an array by the delimiter "new line".
            // The string contains: the image identifier (uploaded file name) and the corresponding link URL.
            $lines = explode("\n", get_config('theme_boost_campus', 'imageareaitemslink'));
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
                // If filename and key value from the imageareaitemslink setting entry match.
                if (array_key_exists($filename, $links)) {
                    // Set the file and the corresponding link.
                    $imageareacache[] = array('filepath' => $filepath, 'linkpath' => $links[$filename]);
                    // Fill the cache.
                    $themeboostcampuscache->set('imageareadata', $imageareacache);
                } else { // Just add the file without a link.
                    $imageareacache[] = array('filepath' => $filepath);
                    // Fill the cache.
                    $themeboostcampuscache->set('imageareadata', $imageareacache);
                }
            }
            // Sort array alphabetically ascending to the key "filepath".
            usort($imageareacache, function($a, $b) {
                return strcmp($a["filepath"], $b["filepath"]);
            });
            return $imageareacache;
        } else { // If no images are uploaded, then cache an empty array.
            return $themeboostcampuscache->set('imageareadata', array());
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
        if (($coursehomenode = $flatnav->find('coursehome', global_navigation::TYPE_CUSTOM)) != false) {
            // If the site home is set as the default homepage by the admin.
            if (get_config('core', 'defaulthomepage') == HOMEPAGE_SITE) {
                // Return the modified flat_navigation.
                $flatnavreturn = theme_boost_campus_set_node_on_top($flatnav, 'home', $coursehomenode);
            } else if (get_config('core', 'defaulthomepage') == HOMEPAGE_MY) { // If the dashboard is set as the default homepage
                // by the admin.
                // Return the modified flat_navigation.
                $flatnavreturn = theme_boost_campus_set_node_on_top($flatnav, 'myhome', $coursehomenode);
            } else if (get_config('core', 'defaulthomepage') == HOMEPAGE_USER) { // If the admin defined that the user can set
                // the default homepage for himself.
                // Site home.
                if (get_user_preferences('user_home_page_preference') == 0) {
                    // Return the modified flat_navigtation.
                    $flatnavreturn = theme_boost_campus_set_node_on_top($flatnav, 'home', $coursehomenode);
                } else if (get_user_preferences('user_home_page_preference') == 1 || // Dashboard.
                    get_user_preferences('user_home_page_preference') === false) { // If no user preference is set,
                    // use the default value of core setting default homepage (Dashboard).
                    // Return the modified flat_navigtation.
                    $flatnavreturn = theme_boost_campus_set_node_on_top($flatnav, 'myhome', $coursehomenode);
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
 * @param navigation_node $beforenode The node before which the to be modified node shall be added.
 * @return flat_navigation.
 */
function theme_boost_campus_set_node_on_top(flat_navigation $flatnav, $nodename, $beforenode) {
    // Get the node for which the sorting shall be changed.
    $pageflatnav = $flatnav->find($nodename, global_navigation::TYPE_SYSTEM);

    // If user is logged in as a guest pageflatnav is false. Only proceed here if the result is true.
    if (!empty($pageflatnav)) {
        // Set the showdivider of the new top node to false that no empty nav-element will be created.
        $pageflatnav->set_showdivider(false);
        // Add the showdivider to the coursehome node as this is the next one and this will add a margin top to it.
        $beforenode->set_showdivider(true);
        // Remove the site home navigation node that it does not appear twice in the menu.
        $flatnav->remove($nodename);
        // Add the saved site home node before the $beforenode.
        $flatnav->add($pageflatnav, $beforenode->key);
    }

    // Return the modified changes.
    return $flatnav;
}


/**
 * Provides the node for the in-course course or activity settings.
 *
 * @return navigation_node.
 */
function theme_boost_campus_get_incourse_settings() {
    global $COURSE, $PAGE;
    // Initialize the node with false to prevent problems on pages that do not have a courseadmin node.
    $node = false;
    // If setting showsettingsincourse is enabled.
    if (get_config('theme_boost_campus', 'showsettingsincourse') == 'yes') {
        // Only search for the courseadmin node if we are within a course or a module context.
        if ($PAGE->context->contextlevel == CONTEXT_COURSE || $PAGE->context->contextlevel == CONTEXT_MODULE) {
            // Get the courseadmin node for the current page.
            $node = $PAGE->settingsnav->find('courseadmin', navigation_node::TYPE_COURSE);
            // Check if $node is not empty for other pages like for example the langauge customization page.
            if (!empty($node)) {
                // If the setting 'incoursesettingsswitchtoroleposition' is set either set to the option 'yes'
                // or to the option 'both', then add these to the $node.
                if (((get_config('theme_boost_campus', 'incoursesettingsswitchtoroleposition') == 'yes') ||
                    (get_config('theme_boost_campus', 'incoursesettingsswitchtoroleposition') == 'both'))
                    && !is_role_switched($COURSE->id)) {
                    // Build switch role link
                    // We could only access the existing menu item by creating the user menu and traversing it.
                    // So we decided to create this node from scratch with the values copied from Moodle core.
                    $roles = get_switchable_roles($PAGE->context);
                    if (is_array($roles) && (count($roles) > 0)) {
                        // Define the properties for a new tab.
                        $properties = array('text' => get_string('switchroleto', 'theme_boost_campus'),
                                            'type' => navigation_node::TYPE_CONTAINER,
                                            'key'  => 'switchroletotab');
                        // Create the node.
                        $switchroletabnode = new navigation_node($properties);
                        // Add the tab to the course administration node.
                        $node->add_node($switchroletabnode);
                        // Add the available roles as children nodes to the tab content.
                        foreach ($roles as $key => $role) {
                            $properties = array('action' => new moodle_url('/course/switchrole.php',
                                array('id'         => $COURSE->id,
                                      'switchrole' => $key,
                                      'returnurl'  => $PAGE->url->out_as_local_url(false),
                                      'sesskey'    => sesskey())),
                                                'type'   => navigation_node::TYPE_CUSTOM,
                                                'text'   => $role);
                            $switchroletabnode->add_node(new navigation_node($properties));
                        }
                    }
                }
            }
        }
        return $node;
    }
}

/**
 * Provides the node for the in-course settings for other contexts.
 *
 * @return navigation_node.
 */
function theme_boost_campus_get_incourse_activity_settings() {
    global $PAGE;
    $context = $PAGE->context;
    $node = false;
    // If setting showsettingsincourse is enabled.
    if (get_config('theme_boost_campus', 'showsettingsincourse') == 'yes') {
        // Settings belonging to activity or resources.
        if ($context->contextlevel == CONTEXT_MODULE) {
            $node = $PAGE->settingsnav->find('modulesettings', navigation_node::TYPE_SETTING);
        } else if ($context->contextlevel == CONTEXT_COURSECAT) {
            // For course category context, show category settings menu, if we're on the course category page.
            if ($PAGE->pagetype === 'course-index-category') {
                $node = $PAGE->settingsnav->find('categorysettings', navigation_node::TYPE_CONTAINER);
            }
        } else {
            $node = false;
        }
    }
    return $node;
}

/**
 * Build the guest access hint HTML code.
 *
 * @param int $courseid The course ID.
 * @return string.
 */
function theme_boost_campus_get_course_guest_access_hint($courseid) {
    global $CFG;
    require_once($CFG->dirroot . '/enrol/self/lib.php');

    $html = '';
    $instances = enrol_get_instances($courseid, true);
    $plugins = enrol_get_plugins(true);
    foreach ($instances as $instance) {
        if (!isset($plugins[$instance->enrol])) {
            continue;
        }
        $plugin = $plugins[$instance->enrol];
        if ($plugin->show_enrolme_link($instance)) {
            $html = html_writer::tag('div', get_string('showhintcourseguestaccesslink',
                'theme_boost_campus', array('url' => $CFG->wwwroot . '/enrol/index.php?id=' . $courseid)));
            break;
        }
    }

    return $html;
}
