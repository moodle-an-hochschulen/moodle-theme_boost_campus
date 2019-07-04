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
 * @package   theme_urcourses_default
 * @copyright 2017 Kathrin Osswald, Ulm University kathrin.osswald@uni-ulm.de
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

/**
 * Function to upgrade theme_urcourses_default
 * @param int $oldversion the version we are upgrading from
 * @return bool result
 */
function xmldb_theme_urcourses_default_upgrade($oldversion) {
    global $DB;
    $dbman = $DB->get_manager();

    if ($oldversion < 2018051701) {
        // The setting "theme_urcourses_default|navdrawericons" has been deleted because this functionality was
        // integrated into core.
        // Set the config to null.
        set_config('navdrawericons', null, 'theme_urcourses_default');

        // The setting "theme_urcourses_default|nawdrawerfullwidth" has been renamed to navdrawerfullwidth.
        // If the setting is configured.
        if ($oldnavdrawerfullwidth = get_config('theme_urcourses_default', 'nawdrawerfullwidth')) {
            // Set the value of the setting to the new setting.
            set_config('navdrawerfullwidth', $oldnavdrawerfullwidth, 'theme_urcourses_default');
            // Drop the old setting.
            set_config('nawdrawerfullwidth', null, 'theme_urcourses_default');
        }

        upgrade_plugin_savepoint(true, 2018051701, 'theme', 'urcourses_default');
    }

    if ($oldversion < 2018121700) {
        // The setting "theme_urcourses_default|incoursesettingsswitchtorole" has been renamed because the setting was
        // upgraded with another option.
        // Therefore set the old config to null.
        set_config('incoursesettingsswitchtorole', null, 'theme_urcourses_default');

        upgrade_plugin_savepoint(true, 2018121700, 'theme', 'urcourses_default');
    }

    if ($oldversion < 2019051600) {
        $table = new xmldb_table('theme_urcourses_darkmode');
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('userid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('darkmode', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, null);
        
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        upgrade_plugin_savepoint(true, 2019051600, 'theme', 'urcourses_default');
    }
	

    if ($oldversion < 2019060900) {
        $table = new xmldb_table('theme_urcourses_hdrstyle');
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('courseid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('hdrstyle', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, null);
        
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        upgrade_plugin_savepoint(true, 2019060900, 'theme', 'urcourses_default');
    }
    return true;
}
