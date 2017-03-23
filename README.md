moodle-theme_boost_campus
=========================

Moodle Boost Campus is a child theme of Moodle core theme Boost.

It is intended to meet the needs of university campuses and adds several features and improvements.


Requirements
------------

This plugin requires Moodle 3.2+


Installation
------------

Install the plugin like any other theme to folder
/theme/boost_campus

See http://docs.moodle.org/en/Installing_plugins for details on installing Moodle plugins


Settings
--------

To make use of the advanced features of the theme, please visit Site administration -> Appearance -> Themes -> Boost Campus.

There, you find multiple settings tabs:

### 1. Tab "General Settings"

In this tab there are the following settings:

#### Theme preset

This setting is already available in the Moodle core theme Boost. For more information how to use it, please have a look at the official Moodle documentation: http://docs.moodle.org/en/Boost_theme

#### Additional theme preset files

This setting is already available in the Moodle core theme Boost. For more information how to use it, please have a look at the official Moodle documentation: http://docs.moodle.org/en/Boost_theme

#### Brand colour

This setting is already available in the Moodle core theme Boost. For more information how to use it, please have a look at the official Moodle documentation: http://docs.moodle.org/en/Boost_theme

#### Favicon

This setting allows you to upload an image (.ico or .png format) that your browser will display as a favicon.


### 2. Tab "Advanced Settings"

In this tab there are the following settings:

#### Raw initial SCSS

This setting is already available in the Moodle core theme Boost. For more information how to use it, please have a look at the official Moodle documentation: http://docs.moodle.org/en/Boost_theme

#### Raw SCSS

This setting is already available in the Moodle core theme Boost. For more information how to use it, please have a look at the official Moodle documentation: http://docs.moodle.org/en/Boost_theme

#### Position of switch role information

With this setting you can choose the place where the information to which role a user has switched is being displayed. If not checked (default value), the role information will be displayed right beneath the user\'s name in the user menu (like in theme Boost). If checked, this information - together with a link to switch back - will be displayed beneath the course, as this functionality is course related.

### 3. Tab "Layout Settings"

#### Footer Layout

With this setting you can add block regions to the footer to be able to place blocks within the footer. You can choose between no blocks (default value) or one up to three block columns in the footer. The two and three columns layouts are only displayed on large screens. On small screens the columns will be automatically reduced to one column for better readability and layout.

#### Section 0: Title

This setting can change the behaviour Moodle displays the title for the first course section. Moodle does not display it as long as the default title for this section is set. As soon as a user changes the title, it will appear. With this setting (option is checked), you can achieve a consistent behaviour by always showing the title for section 0.

#### Background images for login page

In this setting you can add up to 10 files as a background image for the login page. One of these images will be picked randomly and delivered when the user visits the login page.

#### Course edit button

With this setting you can add an additional course edit on / off button to the course header for faster accessibility. This the same way as it was displayed before theme_boost.


Further improvements to Boost core theme
----------------------------------------

### Font Awesome

To be able to use icons provided by Font Awesome it is added to theme_boost_campus.

### Flat navigation (nav-drawer) menu

We improved the code of the new flatnavigation nay-drawer menu items to be uniformly. Furthermore, we improved the layout of the menu by styling borders, icons and margins. Now a user can recognize faster what items belong together to a parent node.

### Course settings icon

The course settings icon will now be displayed on all sites that renders the course header. This improves the accessibility to those settings as there is not a onmipresent block anymore.

### Back to top button

We added a back to top button that appears in the right bottom corner when the user scrolls down the page. With a click on it the page scrolls back to top smoothly and the button will disappear again.


Further information
-------------------

theme_boost_campus is found in the Moodle Plugins repository: http://moodle.org/plugins/view/theme_boost_campus

Report a bug or suggest an improvement: https://github.com/moodleuulm/moodle-theme_boost_campus/issues


Moodle release support
----------------------

Due to limited resources, theme_boost_campus is only maintained for the most recent major release of Moodle. However, previous versions of this plugin which work in legacy major releases of Moodle are still available as-is without any further updates in the Moodle Plugins repository.

There may be several weeks after a new major release of Moodle has been published until we can do a compatibility check and fix problems if necessary. If you encounter problems with a new major release of Moodle - or can confirm that theme_boost_campus still works with a new major relase - please let us know on https://github.com/moodleuulm/moodle-theme_boost_campus/issues

Right-to-left support
---------------------

This plugin has not been tested with Moodle's support for right-to-left (RTL) languages.
If you want to use this plugin with a RTL language and it doesn't work as-is, you are free to send us a pull request on github with modifications.

PHP7 Support
------------

Since Moodle 3.0, Moodle core basically supports PHP7.
Please note that PHP7 support is on our roadmap for this plugin, but it has not yet been thoroughly tested for PHP7 support and we are still running it in production on PHP5.
If you encounter any success or failure with this plugin and PHP7, please let us know.


Copyright
---------

Ulm University
kiz - Media Department
Team Web & Teaching Support
Kathrin Osswald

