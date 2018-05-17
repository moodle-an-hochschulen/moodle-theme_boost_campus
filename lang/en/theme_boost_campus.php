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
 * Theme Boost Campus - Language pack
 *
 * @package    theme_boost_campus
 * @copyright  2017 Kathrin Osswald, Ulm University <kathrin.osswald@uni-ulm.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// GENERAL.
$string['pluginname'] = 'Boost Campus';
$string['choosereadme'] = 'Theme Boost Campus is a child theme to be used on university campuses.';

// SETTINGS.
$string['configtitle'] = 'Boost Campus settings';

// General settings.
$string['presetheadingsetting'] = 'Theme presets';
// ...Background image.
$string['backgroundimage_desc_note'] = '<br/> Please note: This will not override the setting "theme_boost_campus | loginbackgroundimage" which means that the pictures uploaded to the login page background will be displayed anyway.';
// ...Brand colors.
$string['brandcolorheadingsetting'] = 'Brand colors';
$string['brandsuccesscolorsetting'] = 'Brand success color';
$string['brandsuccesscolorsetting_desc'] = 'This color is used for example in regards to form validations.';
$string['brandinfocolorsetting'] = 'Brand info color';
$string['brandinfocolorsetting_desc'] = 'This color is used for example for availabiity information of course activities or resources.';
$string['brandwarningcolorsetting'] = 'Brand warning color';
$string['brandwarningcolorsetting_desc'] = 'This color is used for example for warning texts.';
$string['branddangercolorsetting'] = 'Brand danger color';
$string['branddangercolorsetting_desc'] = 'This color is used for example in regards to form validations.';
// ...Favicon.
$string['faviconheadingsetting'] = 'Favicon';
$string['faviconsetting'] = 'Favicon';
$string['faviconsetting_desc'] = 'You can upload one image (.ico or .png format) that the browser will show as the favicon of your Moodle website.';

// Advanced settings.
// ... Catch keyboard commands.
$string['catchkeyboardcommandsheadingsetting'] = 'Catch keyboard commands';
$string['catchkeyboardcommandsheadingsetting_desc'] = 'The following settings are intended to serve the needs for advanced users, especially if your Moodle instance has a large footer. Advanced users are likely to use keyboard shortcuts to navigate through the sites. They may use this for reaching the end of the page in the intention to get fast to the most recent topic in the course (for adding content or grading latest activities). If the footer is not quite small, they would need to scroll up again. With these settings you can enable that the following shortcuts are caught and would only scroll to the bottom of the main course content.';
$string['catchendkeysetting'] = 'End key';
$string['catchendkeysetting_desc'] = 'This setting will catch the "End" key (should work on all main browsers and operating systems), ';
$string['catchcmdarrowdownsetting'] = 'Cmd + Arrow down shortcut';
$string['catchcmdarrowdownsetting_desc'] = 'This setting will catch the "Cmd + Arrow down" shortcut (MAC),';
$string['catchctrlarrowdownsetting'] = 'Ctrl + Arrow down shortcut';
$string['catchctrlarrowdownsetting_desc'] = 'This setting will catch the "Ctrl + Arrow down" shortcut (Windows),';
$string['catchkeys_desc_addition'] = 'prevent the default scrolling to the bottom of the web page and changes the behavior to scroll only to the bottom of the main course content.';

// Course layout settings.
$string['courselayoutsettings'] = 'Course Layout Settings';
// ...Section 0.
$string['section0titlesetting'] = 'Section 0: Title';
$string['section0titlesetting_desc'] = 'This setting can change the behaviour Moodle displays the title for the first course section. Moodle does not display it as long as the default title for this section is set. As soon as a user changes the title, it will appear. With this setting (option is checked), you can achieve a consistent behaviour by always showing the title for section 0.';
// ...Course edit button.
$string['courseeditbuttonsetting'] = 'Course edit button';
$string['courseeditbuttonsetting_desc'] = 'With this setting you can add an additional course edit on / off button to the course header for faster accessibility of this often used function.';
// ...Course related hints.
$string['coursehintsheadingsetting'] = 'Course related hints.';
// ...Switch role information.
$string['showswitchedroleincoursesetting'] = 'Position of switch role information';
$string['showswitchedroleincoursesetting_desc'] = 'With this setting you can choose the place where the information to which role a user has switched is being displayed. If not checked (default value), the role information will be displayed right beneath the user\'s name in the user menu (like in theme Boost). If checked, this information - together with a link to switch back - will be displayed beneath the course, as this functionality is course related.';
$string['switchedroleto'] = 'You are viewing this course currently with the role:';
// ...Show hint for hidden course.
$string['showhintcoursehiddensetting'] = 'Show hint in hidden courses';
$string['showhintcoursehiddensetting_desc'] = 'With this setting a hint will appear in the course header as long as the visibility of the course is hidden. This helps to identify the visibility state of a course at a glance without the need for looking at the course settings.';
// ... Show hint for guest access.
$string['showhintcoursguestaccesssetting'] = 'Show hint for guest access';
$string['showhintcourseguestaccesssetting_desc'] = 'With this setting a hint will appear in the course header when a user is accessing it with the guest access feature. If the course provides an active self enrolment, a link to that page is also presented to the user.';
// ...Course settings.
$string['coursesettingsheadingsetting'] = 'Course settings';
// ...Show course settings within the course.
$string['showsettingsincoursesetting'] = 'In course settings menu';
$string['showsettingsincoursesetting_desc'] = 'With this setting you can change the displaying of the context menus. In Boost, there is a popup context menu right next to the cog icon. By enabling this setting the settings will occur directly beneath the course header. The settings are arranged in tabs, so it is easier for the user to get to the desired setting instead of scanning a long list of menu items. With this setting we also hide the settings icon on the participants page as the entries on this page are duplicated with the in-course course menu and therefore not necessary.<br/>
Please note that this change does not affect users who have switched off javascript in their browsers - they will still get the behaviour from Moodle core with a popup course context menu.';
// ...Show switch role to link within the in-course course settings.
$string['incoursesettingsswitchtorolesetting'] = 'Move "Switch role to..." to the course settings';
$string['incoursesettingsswitchtorolesetting_desc'] = 'With this setting you can move the "Switch role to..." link as a new tab from the user menu to the in-course course menu. The role switching is a feature which is used in course context and thus it is better to place it in the course settings menu than in the user menu. <br/>
Please note that this setting won\'t have any effect if you do not activate the "In course settings menu" above.';


// Footer layout settings.
$string['footerlayoutsettings'] = 'Footer Layout Settings';
// ...Footer blocks.
$string['footerblocksheadingsetting'] = 'Footer blocks';
$string['footerblocks0columnssetting'] = 'No blocks in footer';
$string['footerblocks1columnssetting'] = 'One block columns in footer';
$string['footerblocks2columnssetting'] = 'Two block columns in footer';
$string['footerblocks3columnssetting'] = 'Three block columns in footer';
$string['footerblockssetting'] = 'Footer blocks';
$string['footerblockssetting_desc'] = 'You can chose if you want to enable the possibility to place blocks into the footer. If enabled, you can choose between one, two or three block columns. These columns are only displayed on large screens. On small screens the columns will be automatically reduced to one column for better readability and layout.';
$string['region-footer-left'] = 'Footer (left)';
$string['region-footer-middle'] = 'Footer (middle)';
$string['region-footer-right'] = 'Footer (right)';
$string['region-side-pre'] = 'Right';
// ...Hide footer links.
$string['footerlinksheadingsetting'] = 'Default footer links';
$string['footerlinksheadingsetting_desc'] = 'Moodle provides some default links in the footer: Link to the Moodle docs, login information, and a link to the webpage start. <br/> With the following three settings you can decide if you want to hide specific links because you think that your users won\'t need them in your instance.';
$string['footerlinks_desc'] = 'If checked, the link will not be displayed in the footer. If not checked (default), it will be shown.';
$string['footerhidehelplinksetting'] = 'Hide link to the Moodle docs';
$string['footerhidelogininfosetting'] = 'Hide login information';
$string['footerhidehomelinksetting'] = 'Hide link to the webpage start';
$string['footerhideusertourslinksetting'] = 'Hide link to reset the user tour';
// ... Hide the footer.
$string['hidefooterheadingsetting'] = 'Hiding the footer';
$string['hidefooteronloginpagesetting'] = 'Hiding the footer on the login page';
$string['hidefooteronloginpagesetting_desc'] = 'By enabling this setting you can hide the footer on the login page. Please note, that this will only hide the footer section, not the footnote section (if used).';


// Additional layout setting.
$string['additionallayoutsettings'] = 'Additional Layout Settings';
// ...Image area.
$string['imageareaheadingsetting'] = 'Image area';
$string['imageareaheadingsetting_desc'] = 'The following settings allow adding an additional region for displaying images like logos. This region will be added beneath the standard footer and above the optional footnote region. If images are uploaded this area will be displayed on all sites that use the columns2 layout.';
$string['imageareaitemssetting'] = 'Image area items';
$string['imageareaitemssetting_desc'] = 'With this widget you can upload your images that will be displayed in the additional image area region. The images will be sorted and displayed alphabetically by the filename. To remove this region, simply delete all uploaded images.';
$string['imageareaitemslinksetting'] = 'Image area item links';
$string['imageareaitemslinksetting_desc'] = 'With this optional setting you can add links to your uplaoded images.<br/>
Each line consists of the file identifier (the file name) the a link URL, separated by pipe characters. Each link declaration needs to be written in a new line. <br/>
For example:<br/>
moodle.jpg|http://moodle.org<br/>
You can declare links for a abitrary amount of your uplaoded images. The links will be added only to those images that match their filename with the identifier declared in this setting.';
$string['imageareaitemsmaxheightsetting'] = 'Image area items maximal height';
$string['imageareaitemsmaxheightsetting_desc'] = 'With this setting you can change the height in pixels for your uploaded images. All images will have the same maximum height and their width will be resized proportionally. The default value is set to 100 pixels.';
// ...Footnote.
$string['footnoteheadingsetting'] = 'Footnote';
$string['footnoteheadingsetting_desc'] = 'The following setting allows to add an additional region for displaying a footnote.';
$string['footnotesetting'] = 'Footnote';
$string['footnotesetting_desc'] = 'Whatever you add to this textarea will be displayed at the end of the footer on every page that renders the theme standard footer (for the layouts "columns2" and "login"). Content in this area could be for example the copyright, the terms of use and the name of your organisation. <br/> If you want to remove the footnote again, just empty the text area.';
// ...Nav drawer menu.
$string['navdrawerheadingsetting'] = 'Nav drawer menu';
$string['dashboardontopsetting'] = 'Dashboard menu item on top';
$string['dashboardontopsetting_desc'] = 'By checking this setting the Dashboard menu item will always be located at the top of the nav drawer. By default, this is already the case on every Moodle page except for course pages. There, the current course and its contents are placed on top. This might break user\'s expectations for the placement of the default homepage link.';
$string['sitehomeontopsetting'] = 'Site home menu item on top';
$string['sitehomeontopsetting_desc'] = 'By checking this setting the Site home menu item will always be located at the top of the nav drawer. By default, this is already the case on every Moodle page except for course pages. There, the current course and its contents are placed on top. This might break user\'s expectations for the placement of the default homepage link.';
$string['userdefinedontopsetting'] = 'User defined homepage on top';
$string['userdefinedontopsetting_desc'] = 'By checking this setting the Dashboard or Site home menu item (depends on the user\'s preferences) will always be located at the top of the nav drawer. By default, this is already the case on every Moodle page except for course pages. There, the current course and its contents are placed on top. This might break user\'s expectations for the placement of the default homepage link.';
$string['defaulthomepageontopsetting'] = 'Default homepage on top';
$string['defaulthomepageontopsetting_desc'] = 'By checking this setting the default homepage link (Dashboard or Site home) will always be located at the top of the nav drawer. By default, this is already the case on every Moodle page except for course pages. There, the current course and its contents are placed on top. This might break user\'s expectations for the placement of the default homepage link.';
// ...Navdrawer full width on small screens.
$string['nawdrawerfullwidthsetting'] = 'Nav drawer full width on small screens';
$string['nawdrawerfullwidthsettings_desc'] = 'By checking this setting you can enlarge the opened nav drawer menu to the full page width on small screens. This may be wanted because on small screens only very few of the main content area in the background is visible. And a full width menu might serve the users\' expectations how menus are displayed on small screens.';

// Design settings.
$string['designsettings'] = 'Design Settings';
// ...Login page.
$string['loginpagedesignheadingsetting'] = 'Login page';
$string['loginbackgroundimagesetting'] = 'Login page background images';
$string['loginbackgroundimagesetting_desc'] = 'Images uploaded in this setting will be randomly displayed on the login page as background images.';
$string['loginform'] = 'Login form';
$string['loginform_desc'] = 'With this setting you can optimize the login form to fit to a greater variety background images (if checked). This means that the login form will be moved to the left of the login page, will get smaller in width and will get a background that let the background image shine through. The login form will be placed on the left because many images have their main content rather in the center and so we keep this content visible. Note: You can also activate this setting if no background images are uploaded, of course.';
// ...Fonts.
$string['fontdesignheadingsetting'] = 'Fonts';
$string['fontfilessetting'] = 'Font files';
$string['fontfilessetting_desc'] = 'With this dialogue you can upload own font files. The uplaod is resricted to the font files of type .eot, .woff, .woff2, .ttf and .svg. <br/>
Important: To be able to use the uploaded fonts within this theme, you have to add related code to your "Raw SCSS" area in the tab "Advanced Settings". A full example for this can be found in the README.md file.';
// ...Blocks.
$string['blockdesignheadingsetting'] = 'Blocks';
$string['blockiconsetting'] = 'Block icon';
$string['blockiconsetting_desc'] = 'With this setting you can add a default Font Awesome icon in front of the block title.  If checked, we additionally provide individual icon replacements for many Moodle core blocks and also some widely used blocks. You also can change the icons easily for each block individually in your raw SCSS via the change of the Font Awesome content. For all available icons please visit http://fontawesome.io/icons/ and use the Unicode value of the icon to replace the default one. <br/> The code to change the icon looks like this example change for the block "People": <br/>';
$string['blockiconsetting_desc_code'] = '.block_people .card-block .card-title::before { content: \'\f0c0\' ; }';
// ...Navbar.
$string['navbardesignheadingsetting'] = 'Navbar';
$string['darknavbarsetting'] = 'Dark navbar';
$string['darknavbarsetting_desc'] = 'By checking this setting you can invert the default light navbar to a dark one with white links.';
// ...Nav drawer.
$string['navdrawerheadingsetting'] = 'Navigation menu';
$string['navdrawericonssetting'] = 'Navigation menu item icons';
$string['navdrawericonssetting_desc'] = 'If this setting is enabled (default), icons will be added to corresponding navigation items of the sliding side menu. Root nodes, that group other items together won\'t get an icon to underline their heading character. <br/>If disabled, no icons in front of the items will be shown. <br/>
Please note: This is an all or nothing setting. It is only possible to display or hide icons for <strong>all suitable</strong> menu items at once.';

// ADDITIONAL STRINGS (IN ALPHABETICAL ORDER).
$string['cachedef_imagearea'] = 'Cache for imagearea items';
$string['showhintcourseguestaccessgeneral'] = 'You are currently viewing this course as <strong>{$a->role}</strong>.';
$string['showhintcourseguestaccesslink'] = 'To have full access to the course, you can <a href="{$a->url}">self enrol into this course</a>.';
$string['showhintcoursehiddengeneral'] = 'This course is currently <strong>hidden</strong>. Only enrolled teachers can access this course when hidden.';
$string['showhintcoursehiddensettingslink'] = 'You can change the visibility in the <a href="{$a->url}">course settings</a>.';
$string['switchroleto'] = 'Switch role to';

// PRIVACY.
$string['privacy:metadata'] = 'The Boost Campus theme does not store any personal data about any user.';
