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
 * Theme Boost Campus - Upgrade script
 *
 * @package   theme_boost_campus
 * @copyright 2017 Kathrin Osswald, Ulm University kathrin.osswald@uni-ulm.de
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

/**
 * Function to upgrade theme_boost_campus
 * @param int $oldversion the version we are upgrading from
 * @return bool result
 */
function xmldb_theme_boost_campus_upgrade($oldversion) {
    global $DB;

    if ($oldversion < 2018051701) {
        // The setting "theme_boost_campus|navdrawericons" has been deleted because this functionality was
        // integrated into core.
        // Set the config to null.
        set_config('navdrawericons', null, 'theme_boost_campus');

        // The setting "theme_boost_campus|nawdrawerfullwidth" has been renamed to navdrawerfullwidth.
        // If the setting is configured.
        if ($oldnavdrawerfullwidth = get_config('theme_boost_campus', 'nawdrawerfullwidth')) {
            // Set the value of the setting to the new setting.
            set_config('navdrawerfullwidth', $oldnavdrawerfullwidth, 'theme_boost_campus');
            // Drop the old setting.
            set_config('nawdrawerfullwidth', null, 'theme_boost_campus');
        }

        upgrade_plugin_savepoint(true, 2018051701, 'theme', 'boost_campus');
    }

    if ($oldversion < 2018121700) {
        // The setting "theme_boost_campus|incoursesettingsswitchtorole" has been renamed because the setting was
        // upgraded with another option.
        // Therefore set the old config to null.
        set_config('incoursesettingsswitchtorole', null, 'theme_boost_campus');

        upgrade_plugin_savepoint(true, 2018121700, 'theme', 'boost_campus');
    }

    if ($oldversion < 2020030800) {

        // The setting "theme_boost_campus|imageareaitemslinks" has been renamed to imageareaitemsattributes.
        // If the setting is configured.
        if ($oldimageareaitemslinks = get_config('theme_boost_campus', 'imageareaitemslink')) {
            // Set the value of the setting to the new setting.
            set_config('imageareaitemsattributes', $oldimageareaitemslinks, 'theme_boost_campus');
            // Drop the old setting.
            set_config('imageareaitemslink', null, 'theme_boost_campus');
        }

        upgrade_plugin_savepoint(true, 2020030800, 'theme', 'boost_campus');
    }

    return true;
}
