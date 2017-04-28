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

### Brand success color

This color is used for example in regards to form valiations.

### Brand info color

This color is used for example for availabiity information of course activities or resources.

### Brand warning color

This color is used for example for warning texts.

### Brand danger color

This color is used for example in regards to form valiations.

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

### Course edit button

With this setting you can add an additional course edit on / off button to the course header for faster accessibility. This the same way as it was displayed before theme_boost.

### Default footer links

Moodle provides some default links in the footer: Link to the Moodle docs, login information, and a link to the webpage start. With these three settings you can decide if you want to hide specific links because you think that your users won't need them in your instance. If checked, the link will not be displayed in the footer. If not checked (default), it will be shown.

### 4. Tab "Design Settings"

#### Background images for login page

In this setting you can add up to 10 files as a background image for the login page. One of these images will be picked randomly and delivered when the user visits the login page.

#### Login form

With this setting you can optimize the login form to fit to a greater variety background images (if checked). This means that the login form will be moved to the left of the login page, will get smaller in width and will get a background that let the background image shine through. The login form will be placed on the left because many images have their main content rather in the center and so we keep this content visible. Note: You can also activate this setting if no background images are uploaded, of course.

#### Font files

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

### Design

* Added Font Awesome icons to mailto and broken links. Furthermore, colored broken link in red for fast recognizability.

Course Design:

* Used the brand color as border color.
* Improved highlighting of a highlighted section.
* Improved recognisability of hidden activities by gray scaling the icon.
* Improved paddings and margins for better alignment and better delineation of sections.
* Designed description and intro boxes.
* Designed blockquotes.
* Improved design of maintenance warning to be more visible.

### Categories overview page

Improved font sizes and weights on category overview page for better readability.

### Block icon

With this setting you can add a default Font Awesome icon in front of the block title. If checked, we additionally provide individual icon replacements for many Moodle core blocks and also some widely used blocks. You also can change the icons easily for each block individually in your raw SCSS via the change of the Font Awesome content. For all available icons please visit http://fontawesome.io/icons/ and use the Unicode value of the icon to replace the default one. The code to change the icon looks like this example change for the block "People": ``.block_people .card-block .card-title::before { content: '\f0c0' ; }``.


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

