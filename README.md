moodle-theme_boost_campus
=========================

[![Build Status](https://travis-ci.org/moodleuulm/moodle-theme_boost_campus.svg?branch=master)](https://travis-ci.org/moodleuulm/moodle-theme_boost_campus)

Moodle Boost child theme which is intended to meet the needs of university campuses and adds several features and improvements


Requirements
------------

This plugin requires Moodle 3.8+


Motivation for this theme
-------------------------

Moodle installations on university campuses have certain constraints which are not completely covered by the Boost theme in Moodle core. We implemented this Boost child theme to accommodate these needs as much as possible while keeping the functionality from Boost from Moodle core as much as possible as well.



Installation
------------

Install the plugin like any other theme to folder
/theme/boost_campus

See http://docs.moodle.org/en/Installing_plugins for details on installing Moodle plugins


Usage & Settings
----------------

After installing the theme, it does not do anything to Moodle yet.

To configure the theme and its behaviour, please visit:
Site administration -> Appearance -> Themes -> Boost Campus.

There, you find multiple settings tabs:

### 1. Tab "General Settings"

In this tab there are the following settings:

#### Theme presets

##### Theme preset

This setting is already available in the Moodle core theme Boost. For more information how to use it, please have a look at the official Moodle documentation: http://docs.moodle.org/en/Boost_theme

##### Additional theme preset files

This setting is already available in the Moodle core theme Boost. For more information how to use it, please have a look at the official Moodle documentation: http://docs.moodle.org/en/Boost_theme

#### Background image

This setting is already available in the Moodle core theme Boost. For more information how to use it, please have a look at the official Moodle documentation: http://docs.moodle.org/en/Boost_theme
Please note: This will not override the setting "theme_boost_campus | loginbackgroundimage" which means that the pictures uploaded to the login page background will be displayed anyway.

#### Brand colors

##### Brand color

This setting is already available in the Moodle core theme Boost. For more information how to use it, please have a look at the official Moodle documentation: http://docs.moodle.org/en/Boost_theme

##### Brand success color

This color is used for example in regards to form valiations.

##### Brand info color

This color is used for example for availabiity information of course activities or resources.

##### Brand warning color

This color is used for example for warning texts.

##### Brand danger color

This color is used for example in regards to form valiations.

#### Favicon

This setting allows you to upload an image (.ico or .png format) that your browser will display as a favicon.


### 2. Tab "Advanced Settings"

In this tab there are the following settings:

#### Raw initial SCSS

This setting is already available in the Moodle core theme Boost. For more information how to use it, please have a look at the official Moodle documentation: http://docs.moodle.org/en/Boost_theme

#### Raw SCSS

This setting is already available in the Moodle core theme Boost. For more information how to use it, please have a look at the official Moodle documentation: http://docs.moodle.org/en/Boost_theme

#### Catch keyboard commands
The following settings are intended to serve the needs for advanced users, especially if your Moodle instance has a large footer. Advanced users are likely to use keyboard shortcuts to navigate through the sites. They may use this for reaching the end of the page in the intention to get fast to the most recent topic in the course (for adding content or grading latest activities). If the footer is not quite small, they would need to scroll up again. With these settings you can enable that the following shortcuts are caught and would only scroll to the bottom of the main course content.

##### End key

This setting will catch the "End" key (should work on all main browsers and operating systems), prevent the default scrolling to the bottom of the web page and changes the behavior to scroll only to the bottom of the main course content.

##### Cmd + Arrow down shortcut

This setting will catch the "Cmd + Arrow down" shortcut (MAC), prevent the default scrolling to the bottom of the web page and changes the behavior to scroll only to the bottom of the main course content.

##### Ctrl + Arrow down shortcut

This setting will catch the "Ctrl + Arrow down" shortcut (Windows), prevent the default scrolling to the bottom of the web page and changes the behavior to scroll only to the bottom of the main course content.

##### Position of "Add a block" widget

With this setting you can manage where the "Add a block" widget should be displayed. "At the bottom of the nav drawer" means the widget to add new blocks is displayed in the left sliding navigation panel like in theme Boost. "At the bottom of the default block region" means the widget to add new blocks will be displayed in the default block region.

### 3. Tab "Course Layout Settings"

#### Section 0: Title

This setting can change the behaviour Moodle displays the title for the first course section. Moodle does not display it as long as the default title for this section is set. As soon as a user changes the title, it will appear. With this setting (option is checked), you can achieve a consistent behaviour by always showing the title for section 0.

#### Course edit button

With this setting you can add an additional course edit on / off button to the course header for faster accessibility. This the same way as it was displayed before theme_boost.

#### Course related hints

##### Position of switch role information

With this setting you can choose the place where the information to which role a user has switched is being displayed. If set to 'Just in the user menu' (default value), the role information will be displayed right beneath the user\'s name in the user menu (like in theme Boost). If set to 'Just in the course settings', this information - together with a link to switch back - will be displayed beneath the course, as this functionality is course related. If set to 'Both in the user menu and in the course settings' it will be shown in both places.

##### Show hint in hidden courses

With this setting a hint will appear in the course header as long as the visibility of the course is hidden. This helps to identify the visibility state of a course at a glance without the need for looking at the course settings.

##### Show hint guest for access

With this setting a hint will appear in the course header when a user is accessing it with the guest access feature. If the course provides an active self enrolment, a link to that page is also presented to the user.

##### Show hint for unrestricted self enrolment

With this setting a hint will appear in the course header when the course is visible and a unrestricted (no enrolment key or end date is set) self enrolment is active.

#### Course settings

##### In course settings menu

With this setting you can change the displaying of the context menus. In Boost, there is a popup context menu right next to the cog icon. By enabling this setting the settings will occur directly beneath the course header. The settings are arranged in tabs, so it is easier for the user to get to the desired setting instead of scanning a long list of menu items. With this setting we also hide the settings icon on the participants page as the entries on this page are duplicated with the in-course course menu and therefore not necessary.

Please note that this change does not affect users who have switched off javascript in their browsers - they will still get the behaviour from Moodle core with a popup course context menu.

##### Switch role to..." location(s)

With this setting you can choose the place where the information to which role a user has switched is being displayed. If set to 'Just in the user menu' (default value), the role information will be displayed right beneath the user's name in the user menu (like in theme Boost). If set to 'Just in the course settings', this information - together with a link to switch back - will be displayed beneath the course, as this functionality is course related. If set to 'Both in the user menu and in the course settings' it will be shown in both places.

### 4. Tab "Footer Layout Settings"

#### Footer blocks

You can chose if you want to enable the possibility to place blocks into the footer. If enabled, you can choose between one, two or three block columns. These columns are only displayed on large screens. On small screens the columns will be automatically reduced to one column for better readability and layout.

#### Default footer links

Moodle provides some default links in the footer: Link to the Moodle docs, login information, a link to the webpage start and a link to reset the user tour for the current page. With these three settings you can decide if you want to hide specific links because you think that your users won't need them in your instance. If checked, the link will not be displayed in the footer. If not checked (default), it will be shown.

#### Hiding the footer

##### Hiding the footer on the login page

By enabling this setting you can hide the footer on the login page. Please note, that this will only hide the footer section, not the footnote section.


### 5. Tab "Additional Layout Settings"

#### Image area

##### Image area items

With this widget you can upload your images that will be displayed in the additional image area region. The images will be sorted and displayed alphabetically by the filename. To remove this region, simply delete all uploaded images.

##### Image area item links

With this optional setting you can add links to your uploaded images.
Each line consists of the file identifier (the file name) the a link URL, separated by pipe characters. Each link declaration needs to be written in a new line.
For example:
``moodle.jpg|http://moodle.org``
You can declare links for a abitrary amount of your uploaded images. The links will be added only to those images that match their filename with the identifier declared in this setting.

##### Image area items maximal height

With this setting you can change the height in pixels for your uploaded images. All images will have the same maximum height and their width will be resized proportionally. The default value is set to 100 pixels.

#### Footnote

Whatever you add to this textarea will be displayed beneath the footer on every page that renders the theme standard footer (for layouts "columns2", "login" and "maintenance"). Content in this area could be for example the copyright, the terms of use and the name of your organisation.

#### Nav drawer menu

##### Default homepage on top

By checking this setting the default homepage link (Dashboard or Site home) will always be located at the top of the nav drawer. By default, this is already the case on every Moodle page except for course pages. There, the current course and its contents are placed on top. This might break user's expectations for the placement of the default homepage link.

##### Nav drawer width on small screens

By checking this setting you can enlarge the opened nav drawer menu to the full page width on small screens. This may be wanted because on small screens only very few of the main content area in the background is visible. And a full width menu might serve the users' expectations how menus are displayed on small screens.


### 6. Tab "Design Settings"

#### Login Page

##### Login page background images

In this setting you can add up to 25 files as a background image for the login page. One of these images will be picked randomly and delivered when the user visits the login page.

Please note: These images will *not* be rendered on small screens. We prevent the loading of the images for several reasons:
* The login field takes most of the space on small screens, so the background image is hidden behind it and therefore it is not really needed there.
* Smalls screens indicate that the user is visiting the page with a mobile device. Not loading the background image in this cases will also save data traffic for the user.

##### Display text for login background images

With this optional setting you can add text, e.g. a copyright notice to your uploaded background images.
Each line consists of the file identifier (the file name) and the text that should be displayed, separated by a pipe character. Each declaration needs to be written in a new line.

For example:
``background-image-1.jpg|Copyright: CC0``

You can declare texts for a arbitrary amount of your uploaded background images. The texts will be added only to those images that match their filename with the identifier declared in this setting.

##### Login form

With this setting you can optimize the login form to fit to a greater variety background images (if checked). This means that the login form will be moved to the left of the login page, will get smaller in width and will get a background that let the background image shine through. The login form will be placed on the left because many images have their main content rather in the center and so we keep this content visible. Note: You can also activate this setting if no background images are uploaded, of course.

#### Fonts

##### Font files

With this dialogue you can upload own font files. The upload is resricted to the font files of type .eot, .woff, .woff2, .ttf and .svg.

Important: To be able to use the uploaded fonts within this theme, you have to add related code to your "Raw SCSS" area in the tab "Advanced Settings"!
First you have to add all font-faces correctly and then you can set the font as font-family to any tag. Set it for the body tag to use it all over the instance. With the following expamle you can see how the SCSS code should look like. Of course you have to adapt it for your individual font and the number and type of uploaded files.

```css

/* your-font-regular - latin */
@font-face {
        font-family: "Your Font";
        font-style: normal;
        font-weight: 400;
        /* IE9 Compat Modes */
        src: url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-regular.eot");
        src: local("Your Font"), local("YourFont-Regular"),
               /* IE6-IE8 */
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-regular.eot?#iefix") format("embedded-opentype"),
                /* Super Modern Browsers */
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-regular.woff2") format("woff2"),
                /* Modern Browsers */
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-regular.woff") format("woff"),
                /* Safari, Android, iOS */
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-regular.ttf") format("truetype"),
                /* Legacy iOS */
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-regular.svg#YourFont") format("svg");
\}
/* your-font-italic - latin */
@font-face {
        font-family: "Your Font";
        font-style: italic;
        font-weight: 400;
        src: url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-italic.eot");
        src: local("Your Font Italic"), local("YourFont-Italic"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-italic.eot?#iefix") format("embedded-opentype"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-italic.woff2") format("woff2"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-italic.woff") format("woff"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-italic.ttf") format("truetype"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-italic.svg#YourFont") format("svg");
}
/* your-font-700 - latin */
@font-face {
        font-family: "Your Font";
        font-style: normal;
        font-weight: 700;
        src: url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-700.eot");
        src: local("Your Font Bold"), local("YourFont-Bold"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-700.eot?#iefix") format("embedded-opentype"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-700.woff2") format("woff2"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-700.woff") format("woff"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-700.ttf") format("truetype"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-700.svg#YourFont") format("svg");
}
/* your-font-700italic - latin */
@font-face {
        font-family: "Your Font";
        font-style: italic;
        font-weight: 700;
        src: url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-700italic.eot");
        src: local("Your Font Bold Italic"), local("YourFont-BoldItalic"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-700-italic.eot?#iefix") format("embedded-opentype"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-700-italic.woff2") format("woff2"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-700-italic.woff") format("woff"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-700-italic.ttf") format("truetype"),
                url("/pluginfile.php/1/theme_boost_campus/fontfiles/0/your-font-latin-700-italic.svg#YourFont") format("svg");
}

body {
        font-family: "Your Font";
}

```

Please note: The code itself and the URLs have to fit exactly to your uploaded files, unless the fonts cannot be loaded! As the font files will be delivered with an expires header to the client but currently without a timestamp in the URL, emptying the Moodle cache unfortunately will not force a reload of the font files on the client side.

#### Blocks

##### Block icon

With this setting you can add a default Font Awesome icon in front of the block title. If checked, we additionally provide individual icon replacements for many Moodle core blocks and also some widely used blocks. You also can change the icons easily for each block individually in your raw SCSS via the change of the Font Awesome content. For all available icons please visit https://fontawesome.com/v4.7.0/icons/ and use the Unicode value of the icon to replace the default one. The code to change the icon looks like this example change for the block "People": ``.block_people .card-block .card-title::before { content: '\f0c0' ; }``.

#### Navbar

##### Dark navbar

By enabling this setting you can invert the default light navbar to a dark one with white links.

#### Help texts

##### Show help texts in a modal dialogue

The default solution to display help texts in popover leads to different issues. For example popovers are not scrollable and they can reach over the viewport.
For this reason, with this setting you can decide that the help texts should be displayed in a dedicated text box (modal dialogue) that appears in the middle of the page with enough space to hold even long helping texts.

#### Breakpoint

##### Change breakpoint

In theme Boost, the right block column will break down even on devices with a width up to 1200 pixels (widescreen resolution of the iPad is 1024 pixels, for example).
This is because the breakpoint is set to [media-breakpoint-down(lg)](https://getbootstrap.com/docs/4.0/layout/overview/#responsive-breakpoints").

If you think there is enough space to show the content plus the blocks column side by side on a screen width of 992 pixels and up, then enable this setting. It will change the breakpoint to media-breakpoint-down(md). This will break the blocks column only on screens with widths of less than 992 pixels.

#### Additional resources

##### Add additional resources

With this setting you can upload additional resources to the theme. You can reference these resources by using a link.
The advantage of uploading files to this file area is that those files can be delivered without a check if the user is logged in. This is also why you should only add files that are uncritical and everyone should be allowed to access and don't need be protected with a valid login.

Use case and usage example:
We're using the footer blocks setting and some of the blocks are displaying an image that was added to the HTML block. When a newly registered user logs in, he will be redirected to the policy page (user/policy.php). The footer blocks are displayed on this page layout and because the HTML block will only deliver its resources after the user is logged in and accepted the user policy, the delivering will be prevented and the redirect is saved to this resource. This leads to the behavior that after accepting the policy the resource was displayed and not the Dashbaord as intended.
With this setting, the image (e.g. htmlblockimage.png) that should be displayed in the block could be added to this file area and added as a link with the url "/pluginfile.php/1/theme_boost_campus/additionalresources/0/htmlblockimage.png".


### 7. Tab "Info Banner Settings"

#### Perpetual information banner

##### Enable perpetual info banner

With this checkbox you can decide if the perpetual information banner should be shown or hidden on the selected pages.

##### Perpetual information banner content (dependent on setting "Enable perpetual info banner")

Enter your information which should be shown within the banner here.

##### Page layouts to display the info banner on (dependent on setting "Enable perpetual info banner")

With this setting you can select the pages on which the perpetual information banner should be displayed.

##### Bootstrap css class for the perpetual info banner (dependent on setting "Enable perpetual info banner")

With this setting you can select the Bootstrap style with which the perpetual information banner should be displayed.

##### Perpetual info banner dismissible (dependent on setting "Enable perpetual info banner")

With this checkbox you can make the banner dismissible permanently. If the user clicks on the x-button a confirmation dialogue will appear and only after the user confirmed this dialogue the banner will be hidden for this user permanently. 

Please note:

This setting has no effect for the banners shown on the login page. Because banners on the login page cannot be clicked away permanently, we do not offer the possibility to click the banner away at all on the login page.

##### Confirmation dialogue (dependent on setting "Perpetual info banner dismissible")

When you enable this setting you can show a confirmation dialogue to a user when he is dismissing the info banner. 

The text is saved in the string with the name "closingperpetualinfobanner":
```
Are you sure you want to dismiss this information? Once done it will not occur again!
```
You can override this within your language customization if you need some other text in this dialogue.

##### Reset visibility for perpetual info banner (dependent on setting "Perpetual info banner dismissible")

By enabling this checkbox, the visibility of the individually dismissed perpetual info banners will be set to visible again. You can use this setting if you made important content changes and want to show the info to all users again.

Please note: 
After saving this option, the database operations for resetting the visibility will be triggered and this checkbox will be unticked again. The next enabling and saving of this feature will trigger the database operations for resetting the visibility again.

#### Time controlled information banner

##### Enable time controlled info banner

With this checkbox you can decide if the time controlled information banner should be shown or hidden on the selected pages.

##### Time controlled information banner content (dependent on setting "Enable time controlled info banner")

Enter your information which should be shown within the time controlled banner here.

##### Page layouts to display the info banner on (dependent on setting "Enable time controlled info banner")

With this setting you can select the pages on which the time controlled information banner should be displayed. 
If both info banners are active on a selected layout, the time controlled info banner will always appear above the perpetual info banner!

##### Bootstrap css class for the time controlled info banner (dependent on setting "Enable time controlled info banner")

With this setting you can select the Bootstrap style with which the time controlled information banner should be displayed.

##### Start time for the time controlled info banner (dependent on setting "Enable time controlled info banner")

With this setting you can define when the time controlled information banner should be displayed on the selected pages. 
Please enter a valid in this format: YYYY-MM-DD HH:MM:SS. For example: "2020-01-01 08:00:00". The time zone will be the time zone you have defined in the setting "Default timezone". 
If you leave this setting empty but entered a date in the for the end, it is the same as if you entered a date far in the past.

##### End time for the time controlled info banner (dependent on setting "Enable time controlled info banner")

With this setting you can define when the time controlled information banner should be hidden on the selected pages. 
Please enter a valid date in this format: YYYY-MM-DD HH:MM:SS. For example: "2020-01-07 08:00:00. The time zone will be the time zone you have defined in the setting "Default timezone". 
If you leave this setting empty but entered a date in the for the start, the banner won't hide after the starting time has been reached.


Further improvements to Boost core theme
----------------------------------------

Apart from the features which can be configured in the theme's settings, we have added some more improvements which are simply there without any settings:

### Flat navigation (nav-drawer) menu

We improved the code of the new flatnavigation nay-drawer menu items to be uniformly. Furthermore, we made slight improvements to the design by deleting borders to those nodes that are children of a parent node. So logical groups should be better recognisable.

### Course settings icon

The course settings icon will now be displayed on all sites that renders the course header. This improves the accessibility to those settings as there is not a onmipresent block anymore.

### Back to top button

We added a back to top button that appears in the right bottom corner when the user scrolls down the page. With a click on it the page scrolls back to top smoothly and the button will disappear again.

### Design

* Added Font Awesome icons to mailto and broken links. Furthermore, colored broken link in red for fast recognizability.
* Added a Video JS skin that fits to the brand color.

Course Design:

* Used the brand color as border color.
* Improved highlighting of a highlighted section.
* Improved recognisability of hidden activities by gray scaling the icon.
* Improved paddings and margins for better alignment and better delineation of sections.
* Designed description and intro boxes.
* Designed blockquotes.
* Improved design of maintenance warning to be more visible.
* Changed the design of the activity navigation links within a course to buttons for better recognisability.

### Categories overview page

Improved font sizes and weights on category overview page for better readability.

### User profile page

* Replaced the the user settings icon with a button to edit the profile. The menu items shown in this setting are not related to the user profile in the closer sense, they are related to the user's system preferences. So we decided to replace this with the only profile related function. Furthermore, the user preferences can be accessed any time over the user's menu in the fixed to top navigation bar.

### Layout

* Reduced paddings on small screens (max. 768px) to be able to show a little bit more content and less whitespace.


How this theme works
-------------------

This Boost child theme is implemented with minimal code duplication in mind. It inherits / requires as much code as possible from theme_boost and only implements the extended or modified functionalities.


Plugin repositories
-------------------

This plugin is published and regularly updated in the Moodle plugins repository:
http://moodle.org/plugins/view/theme_boost_campus

The latest development version can be found on Github:
https://github.com/moodleuulm/moodle-theme_boost_campus


Bug and problem reports / Support requests
------------------------------------------

This plugin is carefully developed and thoroughly tested, but bugs and problems can always appear.

Please report bugs and problems on Github:
https://github.com/moodleuulm/moodle-theme_boost_campus/issues

We will do our best to solve your problems, but please note that due to limited resources we can't always provide per-case support.


Feature proposals
-----------------

Due to limited resources, the functionality of this plugin is primarily implemented for our own local needs and published as-is to the community. We are aware that members of the community will have other needs and would love to see them solved by this plugin.

Please issue feature proposals on Github:
https://github.com/moodleuulm/moodle-theme_boost_campus/issues

Please create pull requests on Github:
https://github.com/moodleuulm/moodle-theme_boost_campus/pulls

We are always interested to read about your feature proposals or even get a pull request from you, but please accept that we can handle your issues only as feature _proposals_ and not as feature _requests_.


Moodle release support
----------------------

Due to limited resources, this plugin is only maintained for the most recent major release of Moodle. However, previous versions of this plugin which work in legacy major releases of Moodle are still available as-is without any further updates in the Moodle Plugins repository.

There may be several weeks after a new major release of Moodle has been published until we can do a compatibility check and fix problems if necessary. If you encounter problems with a new major release of Moodle - or can confirm that this plugin still works with a new major relase - please let us know on Github.

If you are running a legacy version of Moodle, but want or need to run the latest version of this plugin, you can get the latest version of the plugin, remove the line starting with $plugin->requires from version.php and use this latest plugin version then on your legacy Moodle. However, please note that you will run this setup completely at your own risk. We can't support this approach in any way and there is a undeniable risk for erratic behavior.


Translating this plugin
-----------------------

This Moodle plugin is shipped with an english language pack only. All translations into other languages must be managed through AMOS (https://lang.moodle.org) by what they will become part of Moodle's official language pack.

As the plugin creator, we manage the translation into german for our own local needs on AMOS. Please contribute your translation into all other languages in AMOS where they will be reviewed by the official language pack maintainers for Moodle.


Right-to-left support
---------------------

This plugin has not been tested with Moodle's support for right-to-left (RTL) languages.
If you want to use this plugin with a RTL language and it doesn't work as-is, you are free to send us a pull request on Github with modifications.


PHP7 Support
------------

Since Moodle 3.4 core, PHP7 is mandatory. We are developing and testing this plugin for PHP7 only.


Copyright
---------

Ulm University
Communication and Information Centre (kiz)
Kathrin Osswald

