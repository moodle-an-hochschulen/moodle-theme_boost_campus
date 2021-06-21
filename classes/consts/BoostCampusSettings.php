<?php
/**
 * Author: Daniel Poggenpohl
 * Date: 11.12.2020
 */

namespace theme_boost_campus\consts;

defined('MOODLE_INTERNAL') || die();

use \admin_setting_configcolourpicker;
use \admin_setting_configthemepreset;
use \admin_setting_configstoredfile;
use \admin_setting_configselect;
use \admin_setting_configcheckbox;
use \admin_setting_scsscode;
use \admin_setting_heading;

use \context_system;

/**
 * Defines all Boost Campus settings which we use in our FeU child themes.
 * Class BoostCampusSettings
 * @package theme_boost_campus_feu_base\consts
 */
class BoostCampusSettings {

    const THEME_NAME = "boost_campus";

    const QUALIFIED_THEME_NAME = "theme_".self::THEME_NAME;

    const RESET_CALLBACK = "theme_reset_all_caches";

    const SETTING_PRESET_HEADING = 'presetheading';

    const SETTING_PRESET = 'preset';

    const SETTING_PRESET_FILES = 'presetfiles';

    const SETTING_BRAND_COLOR_HEADING = 'brandcolorheading';

    const SETTING_BRAND_COLOR = 'brandcolor';

    const SETTING_BRAND_COLOR_SUCCESS = 'brandsuccesscolor';

    const SETTING_BRAND_COLOR_INFO = 'brandinfocolor';

    const SETTING_BRAND_COLOR_WARNING = 'brandwarningcolor';

    const SETTING_BRAND_COLOR_DANGER = 'branddangercolor';

    const SETTING_SCSS_PRE = 'scsspre';

    const SETTING_SCSS = 'scss';

    const SETTING_ADD_BLOCK_WIDGET_HEADING = 'addablockwidgetheading';

    const SETTING_ADD_BLOCK_WIDGET_POSITION = 'addablockposition';

    const SETTING_BACK_TO_TOP_BUTTON_HEADING = 'bcbttbuttonheading';

    const SETTING_BACK_TO_TOP_BUTTON = 'bcbttbutton';

    public static function getQualifiedThemeName() {
        return "theme_".static::THEME_NAME;
    }

    public static function getPresetHeadingSetting() {
        $name = static::getSettingName(self::SETTING_PRESET_HEADING);
        $title = get_string('presetheadingsetting', self::QUALIFIED_THEME_NAME, null, true);
        $setting = new admin_setting_heading($name, $title, null);
        return $setting;
    }

    public static function getPresetSetting() {
        $fqThemeName = self::getQualifiedThemeName();
        $name = static::getSettingName(self::SETTING_PRESET);
        $title = get_string('preset', 'theme_boost', null, true);
        $description = get_string('preset_desc', 'theme_boost', null, true);
        $default = 'default.scss';

        // We list files in our own file area to add to the drop down. We will provide our own function to
        // load all the presets from the correct paths.
        $context = context_system::instance();
        $fs = get_file_storage();

        $files = $fs->get_area_files($context->id, $fqThemeName, 'preset', 0, 'itemid, filepath, filename', false);

        $choices = [];
        foreach ($files as $file) {
            $choices[$file->get_filename()] = $file->get_filename();
        }
        // These are the built in presets from Boost.
        $choices['default.scss'] = 'default.scss';
        $choices['plain.scss'] = 'plain.scss';

        $setting = new admin_setting_configthemepreset($name, $title, $description, $default, $choices, $fqThemeName);
        $setting->set_updatedcallback(self::RESET_CALLBACK);
        return $setting;
    }

    public static function getPresetFilesSetting() {
        $name = static::getSettingName(self::SETTING_PRESET_FILES);
        $title = get_string('presetfiles', 'theme_boost', null, true);
        $description = get_string('presetfiles_desc', 'theme_boost', null, true);

        $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
            array('maxfiles' => 20, 'accepted_types' => array('.scss')));
        return $setting;
    }

    public static function getBrandColorHeadingSetting() {
        $name = static::getSettingName(self::SETTING_BRAND_COLOR_HEADING);
        $title = get_string('brandcolorheadingsetting', self::QUALIFIED_THEME_NAME, null, true);
        $setting = new admin_setting_heading($name, $title, null);
        return $setting;
    }

    public static function getBrandColorSetting() {
        $name = static::getSettingName(self::SETTING_BRAND_COLOR);
        $title = get_string('brandcolor', 'theme_boost', null, true);
        $description = get_string('brandcolor_desc', 'theme_boost', null, true);
        $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
        $setting->set_updatedcallback(self::RESET_CALLBACK);
        return $setting;
    }

    public static function getBrandColorSuccessSetting() {
        $name = static::getSettingName(self::SETTING_BRAND_COLOR_SUCCESS);
        $title = get_string('brandsuccesscolorsetting', 'theme_boost_campus', null, true);
        $description = get_string('brandsuccesscolorsetting_desc', 'theme_boost_campus', null, true);
        $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
        $setting->set_updatedcallback(self::RESET_CALLBACK);
        return $setting;
    }

    public static function getBrandColorInfoSetting() {
        $name = static::getSettingName(self::SETTING_BRAND_COLOR_INFO);
        $title = get_string('brandinfocolorsetting', 'theme_boost_campus', null, true);
        $description = get_string('brandinfocolorsetting_desc', 'theme_boost_campus', null, true);
        $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
        $setting->set_updatedcallback(self::RESET_CALLBACK);
        return $setting;
    }

    public static function getBrandColorWarningSetting() {
        $name = static::getSettingName(self::SETTING_BRAND_COLOR_WARNING);
        $title = get_string('brandwarningcolorsetting', 'theme_boost_campus', null, true);
        $description = get_string('brandwarningcolorsetting_desc', 'theme_boost_campus', null, true);
        $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
        $setting->set_updatedcallback(self::RESET_CALLBACK);
        return $setting;
    }

    public static function getBrandColorDangerSetting() {
        $name = static::getSettingName(self::SETTING_BRAND_COLOR_DANGER);
        $title = get_string('branddangercolorsetting', 'theme_boost_campus', null, true);
        $description = get_string('branddangercolorsetting_desc', 'theme_boost_campus', null, true);
        $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
        $setting->set_updatedcallback(self::RESET_CALLBACK);
        return $setting;
    }

    public static function getScssPreSetting() {
        $name = static::getSettingName(self::SETTING_SCSS_PRE);
        $title = get_string('rawscsspre', 'theme_boost', null, true);
        $description = get_string('rawscsspre_desc', 'theme_boost', null, true);
        $setting = new admin_setting_scsscode($name, $title, $description, '', PARAM_RAW);
        $setting->set_updatedcallback(self::RESET_CALLBACK);
        return $setting;
    }

    public static function getScssSetting() {
        $name = static::getSettingName(self::SETTING_SCSS);
        $title = get_string('rawscss', 'theme_boost', null, true);
        $description = get_string('rawscss_desc', 'theme_boost', null, true);
        $setting = new admin_setting_scsscode($name, $title, $description, '', PARAM_RAW);
        $setting->set_updatedcallback(self::RESET_CALLBACK);
        return $setting;
    }

    public static function getAddBlockWidgetHeadingSetting() {
        $name = static::getSettingName(self::SETTING_ADD_BLOCK_WIDGET_HEADING);
        $title = get_string('addablockwidgetheadingsetting', 'theme_boost_campus', null, true);
        $setting = new admin_setting_heading($name, $title, null);
        return $setting;
    }

    public static function getAddBlockWidgetSetting() {
        $name = static::getSettingName(self::SETTING_ADD_BLOCK_WIDGET_POSITION);
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
        $setting->set_updatedcallback(self::RESET_CALLBACK);
        return $setting;
    }

    public static function getBackToTopHeadingSetting() {
        $name = static::getSettingName(self::SETTING_BACK_TO_TOP_BUTTON_HEADING);
        $title = get_string('bcbttbuttonheadingsetting', 'theme_boost_campus', null, true);
        $setting = new admin_setting_heading($name, $title, null);
        return $setting;
    }

    public static function getBackToTopButtonSetting() {
        $name = static::getSettingName(self::SETTING_BACK_TO_TOP_BUTTON);
        $title = get_string('bcbttbuttonsetting', 'theme_boost_campus', null, true);
        $description = get_string('bcbttbuttonsetting_desc', 'theme_boost_campus', null, true);
        $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
        return $setting;
    }

    protected static function getSettingValue(string $settingName) {
        return get_config(self::getQualifiedThemeName(), $settingName);
    }

    protected static function getSettingName(string $setting) {
        return self::getQualifiedThemeName().'/'.$setting;
    }
}
