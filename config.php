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
 * Theme Boost Campus - Theme config
 *
 * @package    theme_boost_campus
 * @copyright  2017 Kathrin Osswald, Ulm University <kathrin.osswald@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$THEME->name = 'boost_campus';
$THEME->parents = ['boost'];
$THEME->editor_sheets = [];
$THEME->scss = function($theme) {
    return theme_boost_campus_get_main_scss_content($theme);
};

// MODIFICATION START:
// The declaration of the regions in that way is not part of the default config file.
// It is needed for the Footer Blocks feature of Boost Campus.
$regions = array('side-pre');
if (get_config('theme_boost_campus', 'footerblocks') == '1columns') {
    $regions[] = 'footer-left';
} else if (get_config('theme_boost_campus', 'footerblocks') == '2columns') {
    $regions[] = 'footer-left';
    $regions[] = 'footer-right';
} else if (get_config('theme_boost_campus', 'footerblocks') == '3columns') {
    $regions[] = 'footer-left';
    $regions[] = 'footer-middle';
    $regions[] = 'footer-right';
}

$THEME->layouts = [
    // Most backwards compatible layout without the blocks - this is the layout used by default.
    'base' => array(
        'file' => 'columns2.php',
        'regions' => $regions,
        'defaultregion' => 'side-pre',
    ),
    // Standard layout with blocks, this is recommended for most pages with general information.
    'standard' => array(
        'file' => 'columns2.php',
        'regions' => $regions,
        'defaultregion' => 'side-pre',
    ),
    // Main course page.
    'course' => array(
        'file' => 'columns2.php',
        'regions' => $regions,
        'defaultregion' => 'side-pre',
        'options' => array('langmenu' => true),
    ),
    // Course category.
    'coursecategory' => array(
        'file' => 'columns2.php',
        'regions' => $regions,
        'defaultregion' => 'side-pre',
    ),
    // Part of course, typical for modules - default page layout if $cm specified in require_login().
    'incourse' => array(
        'file' => 'columns2.php',
        'regions' => $regions,
        'defaultregion' => 'side-pre',
    ),
    // The site home page.
    'frontpage' => array(
        'file' => 'columns2.php',
        'regions' => $regions,
        'defaultregion' => 'side-pre',
        'options' => array('nonavbar' => true),
    ),
    // Server administration scripts.
    'admin' => array(
        'file' => 'columns2.php',
        'regions' => $regions,
        'defaultregion' => 'side-pre',
    ),
    // My dashboard page.
    'mydashboard' => array(
        'file' => 'columns2.php',
        'regions' => $regions,
        'defaultregion' => 'side-pre',
        'options' => array('nonavbar' => true, 'langmenu' => true, 'nocontextheader' => true),
    ),
    // My public page.
    'mypublic' => array(
        'file' => 'columns2.php',
        'regions' => $regions,
        'defaultregion' => 'side-pre',
    ),
    // Login page.
    'login' => array(
        'file' => 'login.php',
        'regions' => array(),
        'options' => array('langmenu' => true),
    ),
    // Pages that appear in pop-up windows - no navigation, no blocks, no header.
    'popup' => array(
        'file' => 'columns1.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => true),
    ),
    // No blocks and minimal footer - used for legacy frame layouts only!
    'frametop' => array(
        'file' => 'columns1.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nocoursefooter' => true),
    ),
    // Embeded pages, like iframe/object embeded in moodleform - it needs as much space as possible.
    'embedded' => array(
        'file' => 'embedded.php',
        'regions' => array()
    ),
    // Used during upgrade and install, and for the 'This site is undergoing maintenance' message.
    // This must not have any blocks, links, or API calls that would lead to database or cache interaction.
    // Please be extremely careful if you are modifying this layout.
    'maintenance' => array(
        'file' => 'maintenance.php',
        'regions' => array(),
    ),
    // Should display the content and basic headers only.
    'print' => array(
        'file' => 'columns1.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => false),
    ),
    // The pagelayout used when a redirection is occuring.
    'redirect' => array(
        'file' => 'embedded.php',
        'regions' => array(),
    ),
    // The pagelayout used for reports.
    'report' => array(
        'file' => 'columns2.php',
        'regions' => $regions,
        'defaultregion' => 'side-pre',
    ),
    // The pagelayout used for safebrowser and securewindow.
    'secure' => array(
        'file' => 'secure.php',
        'regions' => $regions,
        'defaultregion' => 'side-pre'
    )
];

$THEME->enable_dock = false;
$THEME->prescsscallback = 'theme_boost_campus_get_pre_scss';
$THEME->yuicssmodules = array();
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->requiredblocks = ' ';
if (get_config('theme_boost_campus', 'addablockposition') == 'positionnavdrawer') {
    $THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;
} else {
    $THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_DEFAULT;
}
