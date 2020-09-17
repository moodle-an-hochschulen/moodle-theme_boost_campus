moodle-theme_boost_campus
=========================

Changes
-------

### Release v3.8-r5

* 2020-09-01 - Fixed bug that multiple imagearea rows are displayed dependent on the amount of uploaded images.

### Release v3.8-r4

* 2020-08-27 - Fixed bug in image area feature if link attribute was left empty.
* 2020-08-27 - Fixed regression for commit Added rule to show description border for all users for restricted activities.

### Release v3.8-r3

* 2020-08-26 - Removed nasty hack in Behat tests as it is not needed anymore.
* 2020-08-25 - Changed calling of footer and footnote layouts to fix behat issues.
* 2020-08-25 - Fixed favicon 404 Error when no individual favicon is uploaded in Boost Campus.
* 2020-08-19 - Added capability theme/boost_campus:viewhintinhiddencourse for setting showhintcoursehidden.
* 2020-08-14 - Reduced inflationary call to reset theme caches for the settings.
* 2020-08-12 - Fixed undefined variables notices.
* 2020-08-11 - Added setting to be able to show a hint for a unrestricted self enrolment in a visible course.
               NOTE: Capability theme/boost_campus:viewhintcourseselfenrol introduced.
* 2020-08-07 - Added rule to show description border for all users for restricted activities.
* 2020-08-07 - Added check for empty string to regular expression for time controlled info banner settings.
* 2020-08-05 - Added settings to be able to show a banner with information on selected pages.
               PLEASE NOTE: For all scenarios to pass, the Moodle version 3.8.4+ (Build: 2019111804) is needed.

### Release v3.8-r2

* 2020-06-22 - Improved SCSS settings to be used with admin_setting_scsscode that validates the code before saving.
* 2020-06-08 - Adjusted post.scss due to upstream changes in theme Boost.
* 2020-06-08 - Fixed functionality bug for back to top button.
* 2020-06-05 - Fixing broken behat step.
* 2020-06-04 - Adjusted columns2.mustache template due to upstream changes in theme Boost.
* 2020-06-04 - Making Travis happy again.

### Release v3.8-r1

* 2020-03-24 - Changed setting imageareaitemslink to imageareaitemsattributes to be able to add alt text to the images.
* 2020-03-10 - Fixed accessibility issues with in-course settings.
* 2020-03-09 - Fixed accessibility issues with back-to-top button.
* 2020-03-05 - Adjusted function full_header() in core_renderer.php due to upstream changes in theme Boost.
* 2020-03-05 - Removed SCSS rule to wrap words in cards as it has been fixed in theme Boost.
* 2020-03-05 - Adjusted login.mustache template due to upstream changes in theme Boost.
* 2020-03-05 - Adjusted columns2.mustache template due to upstream changes in theme Boost.
* 2020-03-05 - Prepare compatibility for Moodle 3.8.

### Release v3.7-r4

* 2020-02-11 - Re-ordered in course course settings to be displayed within the course header.
* 2020-02-07 - Added missing information to README.md for the changes to the activity navigation links.
* 2020-02-06 - Made changes to icons in course category overview undone as the alignment of them were improved in theme Boost (MDL-65357).
* 2020-01-29 - Adjusted navbar.mustache template due to upstream changes in theme Boost.
* 2020-01-29 - Adjusted columns2.mustache template due to upstream changes in theme Boost.
* 2019-12-20 - Added Behat tests.
               PLEASE NOTE: For all scenarios to pass, the Moodle version 3.7.3+ (Build: 20191212) is needed.
* 2019-12-17 - Fixed bug for the selection of block regions when 2 block columns in footer are enabled.
* 2019-11-29 - Moved the variable output.standard_end_of_body_html from footer.mustache to solve Javascript issues with behat tests.

### Release v3.7-r3

* 2019-11-13 - Improved Video JS Skin for hiding big play button in audio players and removed centered placement of this button in SCSS.
               IMPORTANT NOTE for ADMINS: If you want the button to be centered again, please add the class "vjs-big-play-centered"
               to the setting "media_videojs | videocssclass".
* 2019-11-11 - Improved loginform.mustache for the info box and maintenance box to fit to the login box.
* 2019-11-08 - Added special CSS styles for plugin mod_attendance.
* 2019-10-28 - Changed the link in the README.md to get to the correct Font Awesome version.
* 2019-10-28 - Adjusted login.mustache template due to upstream changes in theme Boost.
* 2019-10-28 - Adjusted columns2.mustache template due to upstream changes in theme Boost.
* 2019-10-28 - Adjusted loginform.mustache template due to upstream changes in Moodle core.
* 2019-10-28 - Adjusted function favicon() in core_renderer.php due to upstream changes in Moodle core.
* 2019-10-28 - Removed CSS rule for maintenance warning due to upstream changes.

### Release v3.7-r2

* 2019-06-21 - Removed SCSS fix because MDL-61319 has now been fixed and integrated.
* 2019-06-11 - Added hide_if function to suitable admin setting incoursesettingsswitchtoroleposition and corrected README.md.

### Release v3.7-r1

* 2019-06-04 - Further formal changes to the course_renderer to be constistent with Moodle core.
* 2019-06-04 - Adjusted function coursecat_coursebox() in course_renderer.php due to upstream changes in theme Boost.
* 2019-06-03 - Added newly introduced collection labels in the navdrawer nodes.
* 2019-06-03 - Adjusted columns2.php due to upstream changes in theme Boost.
* 2019-06-03 - Adjusted login.mustache template due to upstream changes in theme Boost.
* 2019-06-03 - Adjusted footer.mustache template due to upstream changes in theme Boost.
* 2019-06-03 - Adjusted columns2.mustache template due to upstream changes in theme Boost.
* 2019-06-03 - Further formal changes to the renderers to be constistent with Moodle core.
* 2019-05-31 - Adjusted function render_help_icon() in core_renderer.php due to upstream changes in theme Boost.
* 2019-05-31 - Adjusted function render_login() in core_renderer.php due to upstream changes in theme Boost.
* 2019-05-31 - Adjusted function context_header_settings_menu() in core_renderer.php due to upstream changes in theme Boost.
* 2019-05-31 - Adjusted function full_header() in core_renderer.php due to upstream changes in theme Boost.
* 2019-05-31 - Fixed referencing of renderers due to upstream changes in theme Boost.
* 2019-05-31 - Prepare compatibility for Moodle 3.7.

### Release v3.6-r5

* 2019-05-29 - Check existence of property blockcolumnwidth before accessing it.
* 2019-05-29 - Login background image did not fill the page completely when browser window was really low but really wide.
* 2019-05-27 - Added multilanguage filtering to the login background image texts.
* 2019-05-24 - Prevent back-to-top button from being printed.
* 2019-05-03 - Added a setting to be able to add texts to your uploaded background images for the login page.
* 2019-05-02 - Added setting to be able to add additional resources to the theme.

### Release v3.6-r4

* 2019-04-26 - Fixed some fixable prechecker warnings.
* 2019-04-26 - Updated README.md, because a change was removed due tu upstream changes.
* 2019-04-25 - Fixed bug in the change to increase the number of uploadable login background images.

### Release v3.6-r3

* 2019-04-16 - Add the possibility to set the block column width on the Dashboard and all other pages.
* 2019-04-16 - Fixed template paths in mustache templates.
* 2019-04-16 - Adjusted navbar.mustache template due to upstream changes in theme Boost.
* 2019-04-15 - Adjusted loginform.mustache and helpicon.mustache templates due to upstream changes in theme Boost.
* 2019-04-15 - Increased limit for background images up to 25.
* 2019-02-15 - Setting to manage where the Add a block widget should be displayed.
* 2019-04-15 - Adjusted function context_header_settings_menu() due to upstream changes in theme Boost.
* 2019-04-15 - Added source information to all overridden renderers.

### Release v3.6-r2

* 2019-02-13 - Added source information to renderers that are overridden from core directly.
* 2019-02-07 - Adjusted function coursecat_coursebox to upstream changes in Moodle core.

### Release v3.6-r1

* 2019-01-31 - Deleted now non matching rule in post.scss.
* 2019-01-31 - Adjusted styles due to upstream SCSS changes in Boost.
* 2019-01-30 - Adjusted config.php due to upstream changes in theme Boost.
* 2019-01-29 - Adjusted styles for the footnote due to upstream changes in Boost.
* 2019-01-28 - Adjusted styles for the imagearea due to upstream changes in Boost.
* 2019-01-25 - Adjusted login.mustache template due to upstream changes in theme Boost.
* 2019-01-25 - Adjusted header.mustache template due to upstream changes in theme Boost.
* 2019-01-25 - Adjusted loginform.mustache template due to upstream changes in theme Boost.
* 2019-01-25 - Adjusted columns2.mustache template due to upstream changes in theme Boost.
* 2019-01-24 - Adjusted function render_login due to upstream changes in theme Boost.
* 2018-01-24 - Check compatibility for Moodle 3.6, no functionality change.

### Release v3.5-r5

* 2018-01-23 - Remove unnecessary double border and padding around blocks in main column on Dashboard.
* 2018-01-23 - Improved whitespaces on small screens to show more of the course content.
* 2018-12-20 - Fixed loginform.mustache as a wrong bootstrap class sneaked in previously and as a modification comment was missing
* 2018-12-20 - Fixed a bug with modal help text setting occuring in (sub)plugins that use only enabled / enabled_help for the help texts.
* 2018-12-19 - Improved the feature showhintcourseguestaccess to not be shown in some edge cases.
* 2018-12-18 - Adding 'both' option for 'Switch to role…' menu fixes - Many thanks to Luca Bösch (lucaboesch) for his proposal and main work on this!
* 2018-12-17 - Setting to change the breakpoint for smaller screens.

### Release v3.5-r4

* 2018-12-12 - Bugfix: Improved font size for all modal help text dialogues.
* 2018-12-12 - Adjusted navbar.mustache template due to upstream changes in MDL-62145.
* 2018-12-06 - Bugfix: Improved placement of the footnote to prevent that it covers the login form on small mobile devices.
* 2018-12-04 - Bugfix: body and html tags were closed before additional layout elements were added.
* 2018-12-04 - Changed travis.yml due to upstream changes.

### Release v3.5-r3

* 2018-11-26 - Fixed broken login functionality caused by Moodle security patch (see MDL-63183).

### Release v3.5-r2

* 2018-07-31 - Fixed bug in function theme_boost_campus_process_flatnav.
* 2018-07-31 - Removed deprecated.txt file because it is unnecessary.
* 2018-07-24 - Setting to display help texts in modal dialogues instead of popups.
* 2018-07-24 - Fixed brand colors due to Bootstrap changes in Boost.
* 2018-07-24 - Fixed logo width when loginform is active.
* 2018-07-24 - Fixed debugging output for admins on profile page.
* 2018-07-24 - Removed rules for local_boostnavigation due to core integration.
* 2018-06-15 - Minor fix to the user menu displaying if switch role is moved to course menu.
* 2018-06-12 - Added Video JS skin that fits to the brand color.

### Release v3.5-r1

* 2018-05-23 - Improved footer blocks feature to only use the chosen columns as the region in the config.
* 2018-05-17 - Fixed section0title setting.
* 2018-05-17 - Added upgrade.php to handle all settings changes correctly.
* 2018-05-15 - Changes to navdrawerfullwidth setting (corrections and removing code because MDL-61411 is integrated into core).
* 2018-05-16 - Minor improvement to block controls for footer blocks.
* 2018-05-16 - Fixed imagearea setting due to changes in Moodle core.
* 2018-05-16 - Fixed CSS rules for block icons due to changes in the classes in Moodle core.
* 2018-05-15 - Fixed setting for footnote due to changes in Moodle core.
* 2018-05-15 - Fixed setting for dark navbar due to changes in Moodle core.
* 2018-05-15 - Adjusted core renderer method full_header due to changes in Boost and added own version of header mustache.
* 2018-05-14 - Adjusted improved mustache templates due to changes in the original templates.
* 2018-05-14 - Removed setting to show icons in the navdrawer due to integration of MDL-61298 into the core.
* 2018-05-14 - Made changes to nav drawer HTML structure undone due to integration of MDL-61343 into the core.
* 2018-05-14 - Changed used SCSS variable name due to renaming of variables by Moodle.
* 2018-05-14 - Check compatibility for Moodle 3.5, no functionality change.

### Release v3.4-r5

* 2018-05-17 - Add missing PHPDoc to make codechecker happier.
* 2018-05-16 - Implement Privacy API.
* 2018-04-25 - Removed build_action_menu_from_navigation in core_renderer as MDL-58174 is integrated.
* 2018-04-25 - Fixed bug with accessing courses with guest login. Thanks to Benedikt Schneider for reporting and pointing to the solution.

### Release v3.4-r4

* 2018-03-02 - Removed introduced get_extra_scss callbak again due to doubled CSS code.
* 2018-03-02 - Removed border-radius for all nav-drawer items.
* 2018-03-01 - Re-added (empty) pre.scss due to problems with child themes.
* 2018-03-01 - Further fixes to footer SCSS due to changes in Moodle core.

### Release v3.4-r3

* 2018-02-27 - Fixed bug in improved flat_navigation.mustache.
* 2018-02-27 - Fixed small bug in boostnavigation SCSS code.

### Release v3.4-r2

* 2018-02-27 - Correction to README.md due to the changes for the nav drawer design changes.
* 2018-02-25 - Simplify the borders between the nav drawer nodes, all borders are now simply solid again. Thanks for understanding.
* 2018-02-25 - Change the CSS workarounds which were introduced for local_boostnavigation.
* 2018-02-23 - Changes to footer SCSS due to changes in Moodle core.
* 2018-02-23 - Improved README.md for section login background images.
* 2018-02-22 - Improvements to the nav drawer icons feature.
* 2018-02-21 - Fixed further color bugs in dark navbar.
* 2018-02-21 - Further improvement of nav drawer SCSS section.
* 2018-02-21 - Implemented get_extra_scss function.

### Release v3.4-r1

* 2018-02-19 - Setting to show a hint when a user is guest accessing a course.
* 2018-02-14 - Improved icon positions in the course category tree.
* 2018-02-13 - Cleaned up post.scss.
* 2018-02-12 - Setting to expand nav drawer menu to full page width on small screens.
* 2018-02-12 - Setting to show / hide icons for navigation menu items.
* 2018-02-08 - Fixed bug for the profile editing button in non admin view.
* 2018-02-08 - Improved SCSS search for competencies node in the nav drawer.
* 2018-02-08 - Harmonise HTML structure of the nav drawer regarding to media spans.
* 2018-02-08 - Removed backport of MDL-59425 because this code is integrated into core.
* 2018-02-08 - Added newly introduced Boost core setting to upload a background image.
* 2018-02-08 - Removed design improvements for calendar block popups as this is fixed in core.
* 2018-02-08 - Setting to be able to hide the link to reset the user tour in the footer.
* 2018-02-08 - Improved activity navigation design.
* 2018-02-08 - Synchronized columns2.mustache with core changes.
* 2018-02-08 - Necessary changes because of renaming core/login.mustache to core/loginform.mustache.
* 2018-02-08 - Prepare compatibility for Moodle 3.4, no functionality change.

### Release v3.3-r3

* 2018-02-07 - Fixed structure of image area to prevent applying the link hover style.
* 2018-02-05 - Improvements to feature 'Show hint in hidden courses'.
* 2018-02-05 - Improvement site name color in dark navbar style with uploaded logo.

### Release v3.3-r2

* 2018-01-31 - Improved design of "Switched role to" infobox.
* 2018-01-30 - Added CSS rules for .fa-pull-left/right because of a core bug (MDL-61319)
* 2018-01-29 - Setting to show a hint in hidden courses.

### Release v3.3-r1

* 2017-12-05 - Deleted availability improvements because Boost uses labels now.
* 2017-12-05 - Changed SCSS rules due to changed navbar icon structure.
* 2017-12-05 - Removed Font Awesome integration because it is now provided by core.
* 2017-12-05 - Replaced the settings_link_page.mustache.original with the updated core version.
* 2017-12-05 - Synchronized loginform.mustache with core changes.
* 2017-12-05 - Synchronized overwritten core_renderer function favicon() with core changes.
* 2017-12-05 - Improved design of in course settings slightly.
* 2018-01-16 - Prepare compatibility for Moodle 3.3, no functionality change.

### Release v3.2-r7

* 2018-01-15 - Setting to be able to remove the footer on the login page.
* 2018-01-15 - Fixed bug for setting incoursesettingsswitchedrole without showsettingsincourse enabled.
* 2018-01-12 - Fixed bug for the frontpage settings.
* 2018-01-12 - Fixed bug for the profile editing button in admin view.
* 2018-01-11 - Fixed bug in the hierarchical displaying of lists within the course.
* 2017-12-05 - Added Workaround to travis.yml for fixing Behat tests with TravisCI.

### Release v3.2-r6

* 2017-11-17 - Extended the behaviour of the setting "showsettingsincourse" to respect activities and resources menus, too. Please check this setting due to the new scope.
* 2017-11-09 - Replaced the settings icon with a edit profile button on the profile page.
* 2017-11-07 - Updated travis.yml to use newer node version for fixing TravisCI error.
* 2017-10-17 - Minor change in SCSS to fit the borders of the current section in the periods format into the section.

### Release v3.2-r5

* 2017-10-16 - Improved catching shortcuts feature again to prevent catching when editable content is focused.

### Release v3.2-r4

* 2017-09-25 - Improved catching shortcuts feature to prevent the catching when form elements are focused.
* 2017-09-22 - Check if user is logged in before showing the switched role information box.

### Release v3.2-r3

* 2017-09-19 - Changed naming of the former badgearea setting to imagearea to prevent mixing up with Moodle badges.
* 2017-09-15 - Improving displaying of calendar block events popup panel.

### Release v3.2-r2

* 2017-09-12 - Making code checkers happy.

### Release v3.2-r1

* 2017-09-01 - Setting to move the 'Switch role to...' menu item to the course settings.
* 2017-08-28 - Expose navigation node properties in the boost flat navigation (Backport of MDL-59425).
* 2017-08-10 - Setting to be able to place the course context menu within the course beneath the page header.
* 2017-07-14 - Setting to place the link to the homepage always on top of the nav drawer.
* 2017-07-14 - Minor change to use bootstrap z-index variable for the maintenance warning.
* 2017-07-12 - Made changes from 2017-22-05 'Adding additional classes to list group items' undone because it won't be integrated into Moodle core.
* 2017-07-06 - Improved "Back to top": Javascript and icon.
* 2017-07-04 - Settings to be able to catch specific shortcuts to redefine the scrolling to bottom event.
* 2017-07-04 - Added modification hints to overridden layout files.
* 2017-07-04 - Fix CSS selector for the footer separator lines.
* 2017-07-03 - Minor improvements to the availability info for activities and resources.
* 2017-06-28 - Add Travis CI support
* 2017-06-14 - Improved settings pages and language file and adjusted README.md.
* 2017-06-13 - Changed the repeat attribute to the background images of the login page.
* 2017-06-08 - Corrected some wrong sub heading weighting in the README.md.
* 2017-06-04 - Settings to be able to add additional regions beneath the page footer.
* 2017-05-22 - Added some section separator lines to the footer.
* 2017-05-22 - Adding the possibility to give additional classes to the list group items of the flat navigation.
* 2017-05-16 - Changed naming and reference of mustache template that renders the login form.
* 2017-05-05 - Improve README.md
* 2017-05-04 - Setting to select dark page navigation bar design.
* 2017-04-25 - Improved design of maintenance warning to be more visible.
* 2017-04-10 - Settings to choose own colors for the variables brand-info, brand-warning, brand-success and brand-danger.
* 2017-04-07 - Added statement "@if variable-exists" to all setting variables processed to SCSS. See MDL-58376.
* 2017-04-06 - Improved course design for better optical experience.
* 2017-03-31 - Improved SCSS code for fixing flat navigation displaying bug when using different course formats.
* 2017-03-30 - Setting to be able to add a default Font Awesome icon in front of the block title.
* 2017-03-29 - Setting to be able to hide Moodle's default links in the footer.
* 2017-03-27 - Setting to be able to upload own font files.
* 2017-03-23 - Improved fonts on category overview page.
* 2017-03-21 - Improved design of mailto and broken links.
* 2017-03-21 - Setting to change position and style of the login form to work out with a greater variety of background images.
* 2017-03-21 - Update to change 2017-03-09: Added setting to be able to decide if  the additional edit on / off button should be placed.
* 2017-03-17 - Added back to top button with smooth scrolling.
* 2017-03-15 - Setting to choose if switched role information should be displayed beneath course header.
* 2017-03-14 - Setting to add multiple background images for the login page that will be picked randomly and delivered when the user visits the login page.
* 2017-03-13 - Setting to be able to upload a favicon.
* 2017-03-10 - Setting to be able to display the title for the first course section (section 0) again.
* 2017-03-09 - Placed course edit on / off button in the course header again like it was displayed before theme_boost.
* 2017-03-08 - Course settings icon will now be displayed on all sites that display the course header.
* 2017-03-06 - Changed flat navigation nav-drawer menu code to make all items structured uniformly and improve the layout of the menu.
* 2017-03-02 - Added Font Awesome
* 2017-02-04 - Setting to be able to add blocks to the footer and set a one up to three columns layout in the footer
* 2017-02-22 - Initial creation of a Boost child theme
