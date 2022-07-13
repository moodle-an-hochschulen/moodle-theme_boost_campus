Upgrading this plugin
=====================

This is an internal documentation for plugin developers with some notes what has to be considered when updating this plugin to a new Moodle major version.

General
-------

* Generally, this is a theme which adds additional a larger set of functionality and configurability to Boost from Moodle core.
* Due to the nature of themes and due to the amount of settings, the upgrading effort is high.


Upstream changes
----------------

* This theme is built on top of theme_boost from Moodle core. It inherits the codebase from theme_boost and overwrites and extends several behaviours and functions. Doing this, code duplication couldn't be avoided. If there are any upstream changes in theme_boost, you should check if they should be adopted to this theme as well.
* In addition to that, you should check any upstream changes which happen in /lib/templates and /lib/outputrenderers.php as some of these templates and renderers are overwritten in this theme as well.


Automated tests
---------------

* The theme has a good coverage with Behat tests which test most of the theme's user stories.


Manual tests
------------

* There aren't any manual tests needed to upgrade this plugin.
* However, if you look at the Behat feature file, you will see that there are some scenarios still commented out. If you have time, you should test them manually or write a Behat test for it.


Visual checks
-------------

* As this is a theme, you should have a close look at all functionalities of the theme and all major Moodle GUI pages to make sure that everything is displayed nicely and correctly.
