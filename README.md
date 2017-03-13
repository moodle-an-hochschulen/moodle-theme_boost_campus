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


### 2. Tab "Advanced Settings"

In this tab there are the following settings:

#### Raw initial SCSS

This setting is already available in the Moodle core theme Boost. For more information how to use it, please have a look at the official Moodle documentation: http://docs.moodle.org/en/Boost_theme

#### Raw SCSS

This setting is already available in the Moodle core theme Boost. For more information how to use it, please have a look at the official Moodle documentation: http://docs.moodle.org/en/Boost_theme

### 3. Tab "Layout Settings"

#### Footer Layout

With this setting you can add block regions to the footer to be able to place blocks within the footer. You can choose between no blocks (default value) or one up to three block columns in the footer. The two and three columns layouts are only displayed on large screens. On small screens the columns will be automatically reduced to one column for better readability and layout.

#### Section 0: Title

This setting can change the behaviour Moodle displays the title for the first course section. Moodle does not display it as long as the default title for this section is set. As soon as a user changes the title, it will appear. With this setting (option is checked), you can achieve a consistent behaviour by always showing the title for section 0.


Further improvements to Boost core theme
----------------------------------------

### Font Awesome

To be able to use icons provided by Font Awesome it is added to theme_boost_campus.

### Flat navigation (nav-drawer) menu

We improved the code of the new flatnavigation nay-drawer menu items to be uniformly. Furthermore, we improved the layout of the menu by styling borders, icons and margins. Now a user can recognize faster what items belong together to a parent node.

### Course settings icon

The course settings icon will now be displayed on all sites that renders the course header. This improves the accessibility to those settings as there is not a onmipresent block anymore.

### Course edit button

We added the course edit on / off button to the course header again like it was displayed before theme_boost for faster accessibility.


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

