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
 * Theme Boost Campus - Settings file
 *
 * @package    theme_boost_campus
 * @copyright  2017 Kathrin Osswald, Ulm University <kathrin.osswald@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    // Create settings page with tabs.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingboost_campus',
        get_string('configtitle', 'theme_boost_campus', null, true));


    // Create general tab.
    $page = new admin_settingpage('theme_boost_campus_general', get_string('generalsettings', 'theme_boost', null, true));

    // Settings title to group preset related settings together with a common heading. We don't want a description here.
    $name = 'theme_boost_campus/presetheading';
    $title = get_string('presetheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    // Replicate the preset setting from theme_boost.
    $name = 'theme_boost_campus/preset';
    $title = get_string('preset', 'theme_boost', null, true);
    $description = get_string('preset_desc', 'theme_boost', null, true);
    $default = 'default.scss';

    // We list files in our own file area to add to the drop down. We will provide our own function to
    // load all the presets from the correct paths.
    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_boost_campus', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    // These are the built in presets from Boost.
    $choices['default.scss'] = 'default.scss';
    $choices['plain.scss'] = 'plain.scss';

    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Preset files setting.
    $name = 'theme_boost_campus/presetfiles';
    $title = get_string('presetfiles', 'theme_boost', null, true);
    $description = get_string('presetfiles_desc', 'theme_boost', null, true);

    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        array('maxfiles' => 20, 'accepted_types' => array('.scss')));
    $page->add($setting);

    // Settings title to group core background image related settings together with a common heading.
    // We don't want a description here.
    $name = 'theme_boost_campus/backgroundimageheading';
    $title = get_string('backgroundimage', 'theme_boost', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    // Background image setting.
    $name = 'theme_boost_campus/backgroundimage';
    $title = get_string('backgroundimage', 'theme_boost', null, true);
    $description = get_string('backgroundimage_desc', 'theme_boost', null, true);
    $description .= get_string('backgroundimage_desc_note', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group brand color related settings together with a common heading. We don't want a description here.
    $name = 'theme_boost_campus/brandcolorheading';
    $title = get_string('brandcolorheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    // Variable $brand-color.
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_boost_campus/brandcolor';
    $title = get_string('brandcolor', 'theme_boost', null, true);
    $description = get_string('brandcolor_desc', 'theme_boost', null, true);
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brand-succes-color.
    $name = 'theme_boost_campus/brandsuccesscolor';
    $title = get_string('brandsuccesscolorsetting', 'theme_boost_campus', null, true);
    $description = get_string('brandsuccesscolorsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brand-info-color.
    $name = 'theme_boost_campus/brandinfocolor';
    $title = get_string('brandinfocolorsetting', 'theme_boost_campus', null, true);
    $description = get_string('brandinfocolorsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brand-warning-color.
    $name = 'theme_boost_campus/brandwarningcolor';
    $title = get_string('brandwarningcolorsetting', 'theme_boost_campus', null, true);
    $description = get_string('brandwarningcolorsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brand-warning-color.
    $name = 'theme_boost_campus/branddangercolor';
    $title = get_string('branddangercolorsetting', 'theme_boost_campus', null, true);
    $description = get_string('branddangercolorsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group favicon related settings together with a common heading. We don't want a description here.
    $name = 'theme_boost_campus/faviconheading';
    $title = get_string('faviconheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    // Favicon upload.
    $name = 'theme_boost_campus/favicon';
    $title = get_string('faviconsetting', 'theme_boost_campus', null, true);
    $description = get_string('faviconsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0,
        array('maxfiles' => 1, 'accepted_types' => array('.ico', '.png')));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Add tab to settings page.
    $settings->add($page);


    // Create advanced settings tab.
    $page = new admin_settingpage('theme_boost_campus_advanced', get_string('advancedsettings', 'theme_boost', null, true));

    // Raw SCSS to include before the content.
    $name = 'theme_boost_campus/scsspre';
    $title = get_string('rawscsspre', 'theme_boost', null, true);
    $description = get_string('rawscsspre_desc', 'theme_boost', null, true);
    $setting = new admin_setting_scsscode($name, $title, $description, '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $name = 'theme_boost_campus/scss';
    $title = get_string('rawscss', 'theme_boost', null, true);
    $description = get_string('rawscss_desc', 'theme_boost', null, true);
    $setting = new admin_setting_scsscode($name, $title, $description, '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title for the catching keybaord commands.
    $name = 'theme_boost_campus/catchkeyboardcommandsheading';
    $title = get_string('catchkeyboardcommandsheadingsetting', 'theme_boost_campus', null, true);
    $description = get_string('catchkeyboardcommandsheadingsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, $description);
    $page->add($setting);

    // Setting for catching the end key.
    $name = 'theme_boost_campus/catchendkey';
    $title = get_string('catchendkeysetting', 'theme_boost_campus', null, true);
    $description = get_string('catchendkeysetting_desc', 'theme_boost_campus', null, true) . ' ' .
        get_string('catchkeys_desc_addition', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    // Setting for catching the cmd + arrow down keys.
    $name = 'theme_boost_campus/catchcmdarrowdown';
    $title = get_string('catchcmdarrowdownsetting', 'theme_boost_campus', null, true);
    $description = get_string('catchcmdarrowdownsetting_desc', 'theme_boost_campus', null, true) . ' ' .
        get_string('catchkeys_desc_addition', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    // Setting for catching the strg + arrow down keys.
    $name = 'theme_boost_campus/catchctrlarrowdown';
    $title = get_string('catchctrlarrowdownsetting', 'theme_boost_campus', null, true);
    $description = get_string('catchctrlarrowdownsetting_desc', 'theme_boost_campus', null, true) . ' ' .
        get_string('catchkeys_desc_addition', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    // Settings title for the Add a block widget. We don't need a description here.
    $name = 'theme_boost_campus/addablockwidgetheading';
    $title = get_string('addablockwidgetheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);
    // Setting to manage where the Add a block widget should be displayed.
    $name = 'theme_boost_campus/addablockposition';
    $title = get_string('addablockpositionsetting', 'theme_boost_campus', null, true);
    $description = get_string('addablockpositionsetting_desc', 'theme_boost_campus', null, true);
    $addablockpositionsetting = [
        // Don't use string lazy loading (= false) because the string will be directly used and would produce a
        // PHP warning otherwise.
        'positionblockregion' => get_string('settingsaddablockpositionbottomblockregion', 'theme_boost_campus', null, false),
        'positionnavdrawer' => get_string('settingsaddablockpositionbottomnavdrawer', 'theme_boost_campus', null, true),
    ];
    $setting = new admin_setting_configselect($name, $title, $description, $addablockpositionsetting['positionblockregion'],
        $addablockpositionsetting);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Add tab to settings page.
    $settings->add($page);


    // Create course layout settings tab.
    $name = 'theme_boost_campus_courselayout';
    $title = get_string('courselayoutsettings', 'theme_boost_campus', null, true);
    $page = new admin_settingpage($name, $title);

    // Setting for displaying section-0 title in courses.
    $name = 'theme_boost_campus/section0title';
    $title = get_string('section0titlesetting', 'theme_boost_campus', null, true);
    $description = get_string('section0titlesetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no'); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Setting for displaying edit on / off button addionally in course header.
    $name = 'theme_boost_campus/courseeditbutton';
    $title = get_string('courseeditbuttonsetting', 'theme_boost_campus', null, true);
    $description = get_string('courseeditbuttonsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    // Settings title for grouping course settings related aspects together. We don't need a description here.
    $name = 'theme_boost_campus/coursehintsheading';
    $title = get_string('coursehintsheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    // Setting to display information of a switched role in the course header.
    $name = 'theme_boost_campus/showswitchedroleincourse';
    $title = get_string('showswitchedroleincoursesetting', 'theme_boost_campus', null, true);
    $description = get_string('showswitchedroleincoursesetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no'); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php).
        // Default 0 value would not write the variable to scss that could cause the scss to crash if used in that file.
        // See MDL-58376.
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Setting to display a hint to the hidden visibility of a course.
    $name = 'theme_boost_campus/showhintcoursehidden';
    $title = get_string('showhintcoursehiddensetting', 'theme_boost_campus', null, true);
    $description = get_string('showhintcoursehiddensetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no'); // Overriding default values
    // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php).
    // Default 0 value would not write the variable to scss that could cause the scss to crash if used in that file.
    // See MDL-58376.
    $page->add($setting);

    // Setting to display a hint to the guest accessing of a course.
    $name = 'theme_boost_campus/showhintcourseguestaccess';
    $title = get_string('showhintcoursguestaccesssetting', 'theme_boost_campus', null, true);
    $description = get_string('showhintcourseguestaccesssetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no'); // Overriding default values
    // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php).
    // Default 0 value would not write the variable to scss that could cause the scss to crash if used in that file.
    // See MDL-58376.
    $page->add($setting);

    // Setting to display a hint that the active course has a unrestricted self enrolment.
    $name = 'theme_boost_campus/showhintcourseselfenrol';
    $title = get_string('showhintcourseselfenrolsetting', 'theme_boost_campus', null, true);
    $description = get_string('showhintcourseselfenrolsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no'); // Overriding default values
    // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php).
    // Default 0 value would not write the variable to scss that could cause the scss to crash if used in that file.
    // See MDL-58376.
    $page->add($setting);

    // Settings title for grouping course settings related aspects together. We don't need a description here.
    $name = 'theme_boost_campus/coursesettingsheading';
    $title = get_string('coursesettingsheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    // Setting to display the course settings page as a panel within the course.
    $name = 'theme_boost_campus/showsettingsincourse';
    $title = get_string('showsettingsincoursesetting', 'theme_boost_campus', null, true);
    $description = get_string('showsettingsincoursesetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no'); // Overriding default values
    // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php).
    // Default 0 value would not write the variable to scss that could cause the scss to crash if used in that file.
    // See MDL-58376.
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Setting to display the switch role to link as a separate tab within the in-course settings panel.
    $name = 'theme_boost_campus/incoursesettingsswitchtoroleposition';
    $title = get_string('incoursesettingsswitchtorolepositionsetting', 'theme_boost_campus', null, true);
    $description = get_string('incoursesettingsswitchtorolepositionsetting_desc', 'theme_boost_campus', null, true);
    $incoursesettingsswitchtorolesetting = [
     // Don't use string lazy loading (= false) because the string will be directly used and would produce a PHP warning otherwise.
    'no' => get_string('incoursesettingsswitchtorolesettingjustmenu', 'theme_boost_campus', null, false),
    'yes' => get_string('incoursesettingsswitchtorolesettingjustcourse', 'theme_boost_campus', null, true),
    'both' => get_string('incoursesettingsswitchtorolesettingboth', 'theme_boost_campus', null, true)
    ];
    $setting = new admin_setting_configselect($name, $title, $description, $incoursesettingsswitchtorolesetting['no'],
        $incoursesettingsswitchtorolesetting);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    $settings->hide_if('theme_boost_campus/incoursesettingsswitchtoroleposition',
            'theme_boost_campus/showsettingsincourse', 'notchecked');

    // Add tab to settings page.
    $settings->add($page);


    // Create footer layout settings tab.
    $name = 'theme_boost_campus_footerlayout';
    $title = get_string('footerlayoutsettings', 'theme_boost_campus', null, true);
    $page = new admin_settingpage($name, $title);

    // Settings title for the footer blocks. We don't need a description here.
    $name = 'theme_boost_campus/footerblocksheading';
    $title = get_string('footerblocksheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    // Setting for enabling blocks with different layouts in the footer.
    $name = 'theme_boost_campus/footerblocks';
    $title = get_string('footerblockssetting', 'theme_boost_campus', null, true);
    $description = get_string('footerblockssetting_desc', 'theme_boost_campus', null, true);
    $footerlayoutoptions = [
     // Don't use string lazy loading (= false) because the string will be directly used and would produce a PHP warning otherwise.
    '0columns' => get_string('footerblocks0columnssetting', 'theme_boost_campus', null, false),
    '1columns' => get_string('footerblocks1columnssetting', 'theme_boost_campus', null, true),
    '2columns' => get_string('footerblocks2columnssetting', 'theme_boost_campus', null, true),
    '3columns' => get_string('footerblocks3columnssetting', 'theme_boost_campus', null, true)
    ];
    $setting = new admin_setting_configselect($name, $title, $description, $footerlayoutoptions['0columns'], $footerlayoutoptions);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group the settings footerhelplink, footerlogininfo and footerhomelink together with a common description.
    $name = 'theme_boost_campus/footerlinksheading';
    $title = get_string('footerlinksheadingsetting', 'theme_boost_campus', null, true);
    $description = get_string('footerlinksheadingsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, $description);
    $page->add($setting);

    // Helplink.
    $name = 'theme_boost_campus/footerhidehelplink';
    $title = get_string('footerhidehelplinksetting', 'theme_boost_campus', null, true);
    $description = get_string('footerlinks_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no' ); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Logininfo.
    $name = 'theme_boost_campus/footerhidelogininfo';
    $title = get_string('footerhidelogininfosetting', 'theme_boost_campus', null, true);
    $description = get_string('footerlinks_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no' ); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Homelink.
    $name = 'theme_boost_campus/footerhidehomelink';
    $title = get_string('footerhidehomelinksetting', 'theme_boost_campus', null, true);
    $description = get_string('footerlinks_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no' ); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // User tours.
    $name = 'theme_boost_campus/footerhideusertourslink';
    $title = get_string('footerhideusertourslinksetting', 'theme_boost_campus', null, true);
    $description = get_string('footerlinks_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no' ); // Overriding default values
    // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
    // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title for hiding the footer. We don't need a description here.
    $name = 'theme_boost_campus/hidefooterheading';
    $title = get_string('hidefooterheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    // Hide the footer on the login page.
    $name = 'theme_boost_campus/hidefooteronloginpage';
    $title = get_string('hidefooteronloginpagesetting', 'theme_boost_campus', null, true);
    $description = get_string('hidefooteronloginpagesetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no' ); // Overriding default values
    // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
    // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Add tab to settings page.
    $settings->add($page);


    // Create additional layout settings tab.
    $name = 'theme_boost_campus_additionallayout';
    $title = get_string('additionallayoutsettings', 'theme_boost_campus', null, true);
    $page = new admin_settingpage($name, $title);

    // Settings title to group image area settings together with a common heading and description.
    $name = 'theme_boost_campus/imageareaheading';
    $title = get_string('imageareaheadingsetting', 'theme_boost_campus', null, true);
    $description = get_string('imageareaheadingsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, $description);
    $page->add($setting);

    // Image area setting.
    $name = 'theme_boost_campus/imageareaitems';
    $title = get_string('imageareaitemssetting', 'theme_boost_campus', null, true);
    $description = get_string('imageareaitemssetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'imageareaitems', 0, array('maxfiles' => 100,
        'accepted_types' => array('web_image'), 'subdirs' => 0));
    $setting->set_updatedcallback('theme_boost_campus_reset_app_cache');
    $page->add($setting);

    $name = 'theme_boost_campus/imageareaitemsattributes';
    $title = get_string('imageareaitemsattributessetting', 'theme_boost_campus', null, true);
    $description = get_string('imageareaitemsattributessetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configtextarea($name, $title, $description, null, PARAM_TEXT);
    $setting->set_updatedcallback('theme_boost_campus_reset_app_cache');
    $page->add($setting);

    $name = 'theme_boost_campus/imageareaitemsmaxheight';
    $title = get_string('imageareaitemsmaxheightsetting', 'theme_boost_campus', null, true);
    $description = get_string('imageareaitemsmaxheightsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configtext_with_maxlength($name, $title, $description, 100, PARAM_INT, null, 3);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group footnote settings together with a common heading and description.
    $name = 'theme_boost_campus/footnoteheading';
    $title = get_string('footnoteheadingsetting', 'theme_boost_campus', null, true);
    $description = get_string('footnoteheadingsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, $description);
    $page->add($setting);

    // Footnote setting.
    $name = 'theme_boost_campus/footnote';
    $title = get_string('footnotesetting', 'theme_boost_campus', null, true);
    $description = get_string('footnotesetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $page->add($setting);

    // Settings title to group navdrawer related settings together with a common heading. We don't want a description here.
    $setting = new admin_setting_heading('theme_boost_campus/navdrawerheading',
        get_string('navdrawerheadingsetting', 'theme_boost_campus', null, true), null);
    $page->add($setting);

    // Create default homepage on top control widget
    // (switch label and description depending on what will really happens on the site).
    if (get_config('core', 'defaulthomepage') == HOMEPAGE_SITE) {
        $page->add(new admin_setting_configcheckbox('theme_boost_campus/defaulthomepageontop',
            get_string('sitehomeontopsetting', 'theme_boost_campus', null, true),
            get_string('sitehomeontopsetting_desc', 'theme_boost_campus', null, true), 'no', 'yes', 'no'));
            // Overriding default values yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss()
            // (lib.php). Default 0 value would not write the variable to scss that could cause the scss to crash if used in
            // that file. See MDL-58376.
    } else if (get_config('core', 'defaulthomepage') == HOMEPAGE_MY) {
        $page->add(new admin_setting_configcheckbox('theme_boost_campus/defaulthomepageontop',
            get_string('dashboardontopsetting', 'theme_boost_campus', null, true),
            get_string('dashboardontopsetting_desc', 'theme_boost_campus', null, true), 'no', 'yes', 'no'));
            // Overriding default values yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss()
            // (lib.php). Default 0 value would not write the variable to scss that could cause the scss to crash if used in
            // that file. See MDL-58376.
    } else if (get_config('core', 'defaulthomepage') == HOMEPAGE_USER) {
        $page->add(new admin_setting_configcheckbox('theme_boost_campus/defaulthomepageontop',
            get_string('userdefinedontopsetting', 'theme_boost_campus', null, true),
            get_string('userdefinedontopsetting_desc', 'theme_boost_campus', null, true), 'no', 'yes', 'no'));
            // Overriding default values yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss()
            // (lib.php). Default 0 value would not write the variable to scss that could cause the scss to crash if used in
            // that file. See MDL-58376.
    } else { // This should not happen.
        $page->add(new admin_setting_configcheckbox('theme_boost_campus/defaulthomepageontop',
            get_string('defaulthomepageontopsetting', 'theme_boost_campus', null, true),
            get_string('defaulthomepageontopsetting_desc', 'theme_boost_campus', null, true), 'no', 'yes', 'no'));
            // Overriding default values yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss()
            // (lib.php). Default 0 value would not write the variable to scss that could cause the scss to crash if used in
            // that file. See MDL-58376.
    }
    $page->add($setting);

    // Set navdrawer to full width on small screens when opened.
    $name = 'theme_boost_campus/navdrawerfullwidth';
    $title = get_string('navdrawerfullwidthsetting', 'theme_boost_campus', null, true);
    $description = get_string('navdrawerfullwidthsettings_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no' ); // Overriding default
    // values yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value
    // would not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Add tab to settings page.
    $settings->add($page);


     // Create design settings tab.
    $page = new admin_settingpage('theme_boost_campus_design', get_string('designsettings',
            'theme_boost_campus', null, true));

    // Settings title to group login page related settings together with a common heading. We don't want a description here.
    $name = 'theme_boost_campus/loginpagedesignheading';
    $title = get_string('loginpagedesignheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    // Login page background setting.
    $name = 'theme_boost_campus/loginbackgroundimage';
    $title = get_string('loginbackgroundimagesetting', 'theme_boost_campus', null, true);
    $description = get_string('loginbackgroundimagesetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbackgroundimage', 0,
        array('maxfiles' => 25, 'accepted_types' => 'web_image'));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_boost_campus/loginbackgroundimagetext';
    $title = get_string('loginbackgroundimagetextsetting', 'theme_boost_campus', null, true);
    $description = get_string('loginbackgroundimagetextsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configtextarea($name, $title, $description, null, PARAM_TEXT);
    $page->add($setting);

    // Setting to change the position and design of the login form.
    $name = 'theme_boost_campus/loginform';
    $title = get_string('loginform', 'theme_boost_campus', null, true);
    $description = get_string('loginform_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no'); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group font related settings together with a common heading. We don't want a description here.
    $name = 'theme_boost_campus/fontdesignheading';
    $title = get_string('fontdesignheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    // Font files upload.
    $name = 'theme_boost_campus/fontfiles';
    $title = get_string('fontfilessetting', 'theme_boost_campus', null, true);
    $description = get_string('fontfilessetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfiles', 0,
            array('maxfiles' => 100, 'accepted_types' => array('.ttf', '.eot', '.woff', '.woff2')));
    $page->add($setting);

    // Settings title to group block related settings together with a common heading. We don't want a description here.
    $name = 'theme_boost_campus/blockdesignheading';
    $title = get_string('blockdesignheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    // Setting for displaying a standard Font Awesome icon in front of the block title.
    $name = 'theme_boost_campus/blockicon';
    $title = get_string('blockiconsetting', 'theme_boost_campus', null, true);
    $description = get_string('blockiconsetting_desc', 'theme_boost_campus', null, true) .
        get_string('blockiconsetting_desc_code', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no'); // Overriding default values
        // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
        // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
        $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Setting for the width of the block column on the Dashboard.
    $name = 'theme_boost_campus/blockcolumnwidthdashboard';
    $title = get_string('blockcolumnwidthdashboardsetting', 'theme_boost_campus', null, true);
    $description = get_string('blockcolumnwidthdashboardsetting_desc', 'theme_boost_campus', null, true).' '.
            get_string('blockcolumnwidthdefault', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configtext_with_maxlength($name, $title, $description, 360, PARAM_INT, null, 3);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Setting for the width of the block column on all other pages.
    $name = 'theme_boost_campus/blockcolumnwidth';
    $title = get_string('blockcolumnwidthsetting', 'theme_boost_campus', null, true);
    $description = get_string('blockcolumnwidthsetting_desc', 'theme_boost_campus', null, true).' '.
            get_string('blockcolumnwidthdefault', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configtext_with_maxlength($name, $title, $description, 360, PARAM_INT, null, 3);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group navbar related settings together with a common heading. We don't want a description here.
    $name = 'theme_boost_campus/navbardesignheading';
    $title = get_string('navbardesignheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    $name = 'theme_boost_campus/darknavbar';
    $title = get_string('darknavbarsetting', 'theme_boost_campus', null, true);
    $description = get_string('darknavbarsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no' ); // Overriding default values
    // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
    // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group navbar related settings together with a common heading. We don't want a description here.
    $name = 'theme_boost_campus/helptextheading';
    $title = get_string('helptextheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    $name = 'theme_boost_campus/helptextmodal';
    $title = get_string('helptextmodalsetting', 'theme_boost_campus', null, true);
    $description = get_string('helptextmodalsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no' ); // Overriding default values
    // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
    // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group breakpoint related settings together with a common heading. We don't want a description here.
    $name = 'theme_boost_campus/breakpointheading';
    $title = get_string('breakpointheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    $name = 'theme_boost_campus/breakpoint';
    $title = get_string('breakpointsetting', 'theme_boost_campus', null, true);
    $description = get_string('breakpointsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 'no', 'yes', 'no' ); // Overriding default values
    // yes = 1 and no = 0 because of the use of empty() in theme_boost_campus_get_pre_scss() (lib.php). Default 0 value would
    // not write the variable to scss that could cause the scss to crash if used in that file. See MDL-58376.
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Settings title to group additional resources settings together with a common heading. We don't want a description here.
    $name = 'theme_boost_campus/additionalresourcesheading';
    $title = get_string('additionalresourcesheadingsetting', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, null);
    $page->add($setting);

    // Background image setting.
    $name = 'theme_boost_campus/additionalresources';
    $title = get_string('additionalresourcessetting', 'theme_boost_campus', null, true);
    $description = get_string('additionalresourcessetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'additionalresources', 0,
        array('maxfiles' => -1));
    $page->add($setting);

    // Add tab to settings page.
    $settings->add($page);

    // Create info banner settings tab.
    $page = new admin_settingpage('theme_boost_campus_infobanner', get_string('infobannersettings',
            'theme_boost_campus', null, true));

    // Settings title to group perpetual information banner settings together with a common heading and description.
    $name = 'theme_boost_campus/perpetualinfobannerheading';
    $title = get_string('perpetualinfobannerheadingsetting', 'theme_boost_campus', null, true);
    $description = get_string('perpetualinfobannerheadingsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, $description);
    $page->add($setting);

    // Activate perpetual information banner.
    $name = 'theme_boost_campus/perpibenable';
    $title = get_string('perpibenablesetting', 'theme_boost_campus', null, true);
    $description = get_string('perpibenablesetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    // Perpetual information banner content.
    $name = 'theme_boost_campus/perpibcontent';
    $title = get_string('perpibcontent', 'theme_boost_campus', null, true);
    $description = get_string('perpibcontent_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $page->add($setting);
    $settings->hide_if('theme_boost_campus/perpibcontent',
            'theme_boost_campus/perpibenable', 'notchecked');

    // Select pages on which the perpetual information banner should be shown.
    $name = 'theme_boost_campus/perpibshowonpages';
    $title = get_string('perpibshowonpagessetting', 'theme_boost_campus', null, true);
    $description = get_string('perpibshowonpagessetting_desc', 'theme_boost_campus', null, true);
    $perpibshowonpageoptions = [
            // Don't use string lazy loading (= false) because the string will be directly used and would produce a
            // PHP warning otherwise.
            'mydashboard' => get_string('myhome', 'core', null, false),
            'course' => get_string('course', 'core', null, false),
            'login' => get_string('login_page', 'theme_boost_campus', null, false)
    ];
    $setting = new admin_setting_configmultiselect($name, $title, $description,
            array($perpibshowonpageoptions['mydashboard']), $perpibshowonpageoptions);
    $page->add($setting);
    $settings->hide_if('theme_boost_campus/perpibshowonpages',
            'theme_boost_campus/perpibenable', 'notchecked');

    // Select the bootstrap class that should be used for the perpetual info banner.
    $name = 'theme_boost_campus/perpibcss';
    $title = get_string('perpibcsssetting', 'theme_boost_campus', null, true);
    $description = get_string('perpibcsssetting_desc', 'theme_boost_campus', null, true);
    $perpibcssoptions = [
            // Don't use string lazy loading (= false) because the string will be directly used and would produce a
            // PHP warning otherwise.
            'primary' => get_string('bootstrapprimarycolor', 'theme_boost_campus', null, false),
            'secondary' => get_string('bootstrapsecondarycolor', 'theme_boost_campus', null, false),
            'success' => get_string('bootstrapsuccesscolor', 'theme_boost_campus', null, false),
            'danger' => get_string('bootstrapdangercolor', 'theme_boost_campus', null, false),
            'warning' => get_string('bootstrapwarningcolor', 'theme_boost_campus', null, false),
            'info' => get_string('bootstrapinfocolor', 'theme_boost_campus', null, false),
            'light' => get_string('bootstraplightcolor', 'theme_boost_campus', null, false),
            'dark' => get_string('bootstrapdarkcolor', 'theme_boost_campus', null, false)
    ];
    $setting = new admin_setting_configselect($name, $title, $description, $perpibcssoptions['primary'],
            $perpibcssoptions);
    $page->add($setting);
    $settings->hide_if('theme_boost_campus/perpibcss',
            'theme_boost_campus/perpibenable', 'notchecked');

    // Perpetual information banner dismissible.
    $name = 'theme_boost_campus/perpibdismiss';
    $title = get_string('perpibdismisssetting', 'theme_boost_campus', null, true);
    $description = get_string('perpibdismisssetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);
    $settings->hide_if('theme_boost_campus/perpibdismiss',
            'theme_boost_campus/perpibenable', 'notchecked');

    // Perpetual information banner show confirmation dialogue when dismissing.
    $name = 'theme_boost_campus/perpibconfirm';
    $title = get_string('perpibconfirmsetting', 'theme_boost_campus', null, true);
    $description = get_string('perpibconfirmsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);
    $settings->hide_if('theme_boost_campus/perpibconfirm',
            'theme_boost_campus/perpibenable', 'notchecked');
    $settings->hide_if('theme_boost_campus/perpibconfirm',
            'theme_boost_campus/perpibdismiss', 'notchecked');

    // Reset the user preference for all users.
    $name = 'theme_boost_campus/perpibresetvisibility';
    $title = get_string('perpetualinfobannerresetvisiblitysetting', 'theme_boost_campus', null, true);
    $description = get_string('perpetualinfobannerresetvisiblitysetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_boost_campus_infobanner_reset_visibility');
    $page->add($setting);
    $settings->hide_if('theme_boost_campus/perpibresetvisibility',
            'theme_boost_campus/perpibenable', 'notchecked');
    $settings->hide_if('theme_boost_campus/perpibresetvisibility',
            'theme_boost_campus/perpibdismiss', 'notchecked');

    // Settings title to group time controlled information banner settings together with a common heading and description.
    $name = 'theme_boost_campus/timedinfobannerheading';
    $title = get_string('timedinfobannerheadingsetting', 'theme_boost_campus', null, true);
    $description = get_string('timedinfobannerheadingsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_heading($name, $title, $description);
    $page->add($setting);

    // Activate time controlled information banner.
    $name = 'theme_boost_campus/timedibenable';
    $title = get_string('timedibenablesetting', 'theme_boost_campus', null, true);
    $description = get_string('timedibenablesetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    // Time controlled information banner content.
    $name = 'theme_boost_campus/timedibcontent';
    $title = get_string('timedibcontent', 'theme_boost_campus', null, true);
    $description = get_string('timedibcontent_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $page->add($setting);
    $settings->hide_if('theme_boost_campus/timedibcontent',
            'theme_boost_campus/timedibenable', 'notchecked');

    // Select pages on which the time controlled information banner should be shown.
    $name = 'theme_boost_campus/timedibshowonpages';
    $title = get_string('timedibshowonpagessetting', 'theme_boost_campus', null, true);
    $description = get_string('timedibshowonpagessetting_desc', 'theme_boost_campus', null, true);
    $timedibpageoptions = [
        // Don't use string lazy loading (= false) because the string will be directly used and would produce a
        // PHP warning otherwise.
            'mydashboard' => get_string('myhome', 'core', null, false),
            'course' => get_string('course', 'core', null, false),
            'login' => get_string('login_page', 'theme_boost_campus', null, false)
    ];
    $setting = new admin_setting_configmultiselect($name, $title, $description,
            array($timedibpageoptions['mydashboard']), $timedibpageoptions);
    $page->add($setting);
    $settings->hide_if('theme_boost_campus/timedibshowonpages',
            'theme_boost_campus/timedibenable', 'notchecked');

    // Select the bootstrap class that should be used for the perpetual info banner.
    $name = 'theme_boost_campus/timedibcss';
    $title = get_string('timedibcsssetting', 'theme_boost_campus', null, true);
    $description = get_string('timedibcsssetting_desc', 'theme_boost_campus', null, true);
    $timedibcssoptions = [
        // Don't use string lazy loading (= false) because the string will be directly used and would produce a
        // PHP warning otherwise.
            'primary' => get_string('bootstrapprimarycolor', 'theme_boost_campus', null, false),
            'secondary' => get_string('bootstrapsecondarycolor', 'theme_boost_campus', null, false),
            'success' => get_string('bootstrapsuccesscolor', 'theme_boost_campus', null, false),
            'danger' => get_string('bootstrapdangercolor', 'theme_boost_campus', null, false),
            'warning' => get_string('bootstrapwarningcolor', 'theme_boost_campus', null, false),
            'info' => get_string('bootstrapinfocolor', 'theme_boost_campus', null, false),
            'light' => get_string('bootstraplightcolor', 'theme_boost_campus', null, false),
            'dark' => get_string('bootstrapdarkcolor', 'theme_boost_campus', null, false)
    ];
    $setting = new admin_setting_configselect($name, $title, $description, $timedibcssoptions['primary'],
            $timedibcssoptions);
    $page->add($setting);
    $settings->hide_if('theme_boost_campus/timedibcss',
            'theme_boost_campus/timedibenable', 'notchecked');

    // This will check for the desired date time format YYYY-MM-DD HH:MM:SS
    $timeregex = '/(20[0-9]{2}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])\s([0-1][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9])|^$/';

    // Start time for controlled information banner.
    $name = 'theme_boost_campus/timedibstart';
    $title = get_string('timedibstartsetting', 'theme_boost_campus', null, true);
    $description = get_string('timedibstartsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configtext($name, $title, $description, '', $timeregex);
    $page->add($setting);
    $settings->hide_if('theme_boost_campus/timedibstart',
            'theme_boost_campus/timedibenable', 'notchecked');

    // End time for controlled information banner.
    $name = 'theme_boost_campus/timedibend';
    $title = get_string('timedibendsetting', 'theme_boost_campus', null, true);
    $description = get_string('timedibendsetting_desc', 'theme_boost_campus', null, true);
    $setting = new admin_setting_configtext($name, $title, $description, '', $timeregex);
    $page->add($setting);
    $settings->hide_if('theme_boost_campus/timedibend',
            'theme_boost_campus/timedibenable', 'notchecked');

    // Add tab to settings page.
    $settings->add($page);
}
