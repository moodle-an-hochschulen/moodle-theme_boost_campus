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

namespace theme_boost_campus\output;

use coding_exception;
use html_writer;
use tabobject;
use tabtree;
use custom_menu_item;
use custom_menu;
use block_contents;
use navigation_node;
use action_link;
use stdClass;
use moodle_url;
use preferences_groups;
use action_menu;
use help_icon;
use single_button;
use single_select;
use paging_bar;
use url_select;
use context_course;
use pix_icon;

defined('MOODLE_INTERNAL') || die;

/**
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * @package   theme_boost_campus
 * @copyright 2017 Kathrin Osswald, Ulm University kathrin.osswald@uni-ulm.de
   @copyright based on code from theme_boost by Bas Brands
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class core_renderer extends \theme_boost\output\core_renderer {

    /**
     * Override to display an edit button again by calling the parent function
     * in core/core_renderer because theme_boost's function returns an empty
     * string and therefore displays nothing.
     *
     * We don't like these...
     *
     */
    public function edit_button(moodle_url $url) {
        /* MODIFICATION START */
        // If setting editbuttonincourseheader ist checked give out the edit on / off button in course header
        if (get_config('theme_boost_campus', 'courseeditbutton') == '1') {
            return \core_renderer::edit_button($url);
        }
        /* MODIFICATION END */
        /* ORIGINAL START
        return '';
        ORIGINAL END */
    }

    /**
     * Override to add additional class for the random login image to the body.
     *
     * Returns HTML attributes to use within the body tag. This includes an ID and classes.
     *
     * @since Moodle 2.5.1 2.6
     * @param string|array $additionalclasses Any additional classes to give the body tag,
     * @return string
     */
    public function body_attributes($additionalclasses = array()) {
        global $PAGE, $CFG;
        require_once($CFG->dirroot . '/theme/boost_campus/locallib.php');

        if (!is_array($additionalclasses)) {
            $additionalclasses = explode(' ', $additionalclasses);
        }

        /* MODIFICATION START */
        // Only add classes for the login page.
        if ($PAGE->bodyid == 'page-login-index') {
            $additionalclasses[] = 'loginbackgroundimage';
            // Generating a random class for displaying a random image for the login page.
            $additionalclasses[] = theme_boost_campus_get_random_loginbackgroundimage_class();
        }
        /* MODIFICATION END */

        return ' id="'. $this->body_id().'" class="'.$this->body_css_classes($additionalclasses).'"';
    }

    /**
     * Override to be able to use uploaded images from admin_setting as well.
     *
     * Returns the URL for the favicon.
     *
     * @since Moodle 2.5.1 2.6
     * @return string The favicon URL
     */
    public function favicon() {
        global $PAGE;
        /* MODIFICATION START */
        if (!empty($PAGE->theme->settings->favicon)) {
            return $PAGE->theme->setting_file_url('favicon', 'favicon');
        }
        else {
            return $this->pix_url('favicon', 'theme');
        }
        /* MODIFICATION END */
        /* ORIGINAL START
        return $this->pix_url('favicon', 'theme');
        ORIGINAL END */
    }


    /**
     * Override to dispaly switched role information beneath the course header instead of the user menu.
     * We change this because the switch role function is course related and therefore it should be placed in the course context.
     *
     * Wrapper for header elements.
     *
     * @return string HTML to display the main header.
     */
    public function full_header() {
        /* MODIFICATION START */
        global $PAGE, $USER, $COURSE;
        /* MODIFICATION END */
        /* ORIGINAL START
        global $PAGE;
        ORIGINAL END */

        $html = html_writer::start_tag('header', array('id' => 'page-header', 'class' => 'row'));
        $html .= html_writer::start_div('col-xs-12 p-a-1');
        $html .= html_writer::start_div('card');
        $html .= html_writer::start_div('card-block');
        $html .= html_writer::div($this->context_header_settings_menu(), 'pull-xs-right context-header-settings-menu');
        $html .= html_writer::start_div('pull-xs-left');
        $html .= $this->context_header();
        $html .= html_writer::end_div();
        $pageheadingbutton = $this->page_heading_button();
        if (empty($PAGE->layout_options['nonavbar'])) {
            $html .= html_writer::start_div('clearfix w-100 pull-xs-left', array('id' => 'page-navbar'));
            $html .= html_writer::tag('div', $this->navbar(), array('class' => 'breadcrumb-nav'));
            $html .= html_writer::div($pageheadingbutton, 'breadcrumb-button pull-xs-right');
            $html .= html_writer::end_div();
        } else if ($pageheadingbutton) {
            $html .= html_writer::div($pageheadingbutton, 'breadcrumb-button nonavbar pull-xs-right');
        }
        $html .= html_writer::tag('div', $this->course_header(), array('id' => 'course-header'));
        $html .= html_writer::end_div();
        $html .= html_writer::end_div();
        $html .= html_writer::end_div();
        $html .= html_writer::end_tag('header');

        /* MODIFICATION START */
        /* Only use this if setting 'showswitchedroleincourse' is active. */
        if (get_config('theme_boost_campus', 'showswitchedroleincourse') === 'yes') {
            $opts = \user_get_user_navigation_info($USER, $this->page);
            // Role is switched.
            if (!empty($opts->metadata['asotherrole'])) {
                // Get the role name switched to.
                $role = $opts->metadata['rolename'];
                // Get the URL to switch back (normal role).
                $url = new moodle_url('/course/switchrole.php', array('id' => $COURSE->id, 'sesskey' => sesskey(), 'switchrole' => 0,
                       'returnurl' => $this->page->url->out_as_local_url(false)));

                $html .= html_writer::start_tag('div', array('class' => 'switched-role-infobox alert alert-info'));
                $html .= html_writer::start_tag('div', array());
                $html .= get_string('switchedroleto', 'theme_boost_campus');
                // Give this a span to be able to address via CSS
                $html .= html_writer::tag('span', $role, array('class' => 'switched-role'));
                $html .= html_writer::end_tag('div');
                // Return to normal role link
                $html .= html_writer::start_tag('div', array('class' => 'switched-role-back col-6'));
                $html .= html_writer::empty_tag('img', array('src' => $this->pix_url('a/logout', 'moodle')));
                $html .= html_writer::tag('a', get_string('switchrolereturn', 'core'), array('class' => 'switched-role-backlink', 'href' => $url));
                $html .= html_writer::end_tag('div'); // Return to normal role link end
                $html .= html_writer::end_tag('div');
            }
        }
        /* MODIFICATION END */

        return $html;
    }


/**
     * Override to display course settings on every course site for permanent access
     *
     * This is an optional menu that can be added to a layout by a theme. It contains the
     * menu for the course administration, only on the course main page.
     *
     * @return string
     */
    public function context_header_settings_menu() {
        $context = $this->page->context;
        $menu = new action_menu();

        $items = $this->page->navbar->get_items();
        $currentnode = end($items);

        $showcoursemenu = false;
        $showfrontpagemenu = false;
        $showusermenu = false;

        /* MODIFICATION START
           REASON: With the original code, the course settings icon will only appear on the course main page.
                   Therefore the access to the course settings and related functions is not possible on other
                   course pages as there is no omnipresent block anymore. We want these to be accessible
                   on each course page.*/
        if (($context->contextlevel == CONTEXT_COURSE || $context->contextlevel == CONTEXT_MODULE
                || $context->contextlevel == CONTEXT_BLOCK) && !empty($currentnode)) {
            $showcoursemenu = true;
        }
        /* MODIFICATION END */
        /* ORIGINAL START
        if (($context->contextlevel == CONTEXT_COURSE) &&
                !empty($currentnode) &&
                ($currentnode->type == navigation_node::TYPE_COURSE || $currentnode->type == navigation_node::TYPE_SECTION)) {
            $showcoursemenu = true;
        }
        ORIGINAL END */

        $courseformat = course_get_format($this->page->course);
        // This is a single activity course format, always show the course menu on the activity main page.
        if ($context->contextlevel == CONTEXT_MODULE &&
                !$courseformat->has_view_page()) {

            $this->page->navigation->initialise();
            $activenode = $this->page->navigation->find_active_node();
            // If the settings menu has been forced then show the menu.
            if ($this->page->is_settings_menu_forced()) {
                $showcoursemenu = true;
            } else if (!empty($activenode) && ($activenode->type == navigation_node::TYPE_ACTIVITY ||
                    $activenode->type == navigation_node::TYPE_RESOURCE)) {

                // We only want to show the menu on the first page of the activity. This means
                // the breadcrumb has no additional nodes.
                if ($currentnode && ($currentnode->key == $activenode->key && $currentnode->type == $activenode->type)) {
                    $showcoursemenu = true;
                }
            }
        }

        // This is the site front page.
        if ($context->contextlevel == CONTEXT_COURSE &&
                !empty($currentnode) &&
                $currentnode->key === 'home') {
            $showfrontpagemenu = true;
        }

        // This is the user profile page.
        if ($context->contextlevel == CONTEXT_USER &&
                !empty($currentnode) &&
                ($currentnode->key === 'myprofile')) {
            $showusermenu = true;
        }


        if ($showfrontpagemenu) {
            $settingsnode = $this->page->settingsnav->find('frontpage', navigation_node::TYPE_SETTING);
            if ($settingsnode) {
                // Build an action menu based on the visible nodes from this navigation tree.
                $skipped = $this->build_action_menu_from_navigation($menu, $settingsnode, false, true);

                // We only add a list to the full settings menu if we didn't include every node in the short menu.
                if ($skipped) {
                    $text = get_string('morenavigationlinks');
                    $url = new moodle_url('/course/admin.php', array('courseid' => $this->page->course->id));
                    $link = new action_link($url, $text, null, null, new pix_icon('t/edit', $text));
                    $menu->add_secondary_action($link);
                }
            }
        } else if ($showcoursemenu) {
            $settingsnode = $this->page->settingsnav->find('courseadmin', navigation_node::TYPE_COURSE);
            if ($settingsnode) {
                // Build an action menu based on the visible nodes from this navigation tree.
                $skipped = $this->build_action_menu_from_navigation($menu, $settingsnode, false, true);

                // We only add a list to the full settings menu if we didn't include every node in the short menu.
                if ($skipped) {
                    $text = get_string('morenavigationlinks');
                    $url = new moodle_url('/course/admin.php', array('courseid' => $this->page->course->id));
                    $link = new action_link($url, $text, null, null, new pix_icon('t/edit', $text));
                    $menu->add_secondary_action($link);
                }
            }
        } else if ($showusermenu) {
            // Get the course admin node from the settings navigation.
            $settingsnode = $this->page->settingsnav->find('useraccount', navigation_node::TYPE_CONTAINER);
            if ($settingsnode) {
                // Build an action menu based on the visible nodes from this navigation tree.
                $this->build_action_menu_from_navigation($menu, $settingsnode);
            }
        }

        return $this->render($menu);
    }

    /* --------------------------------------------------------------
     * TODO: Delete function build_action_menu_from_navigation when
     * MDL-58174 is solved.
     * --------------------------------------------------------------/*

    /**
     * Take a node in the nav tree and make an action menu out of it.
     * The links are injected in the action menu.
     *
     * @param action_menu $menu
     * @param navigation_node $node
     * @param boolean $indent
     * @param boolean $onlytopleafnodes
     * @return boolean nodesskipped - True if nodes were skipped in building the menu
     */
    private function build_action_menu_from_navigation(action_menu $menu,
                                                       navigation_node $node,
                                                       $indent = false,
                                                       $onlytopleafnodes = false) {
        $skipped = false;
        // Build an action menu based on the visible nodes from this navigation tree.
        foreach ($node->children as $menuitem) {
            if ($menuitem->display) {
                if ($onlytopleafnodes && $menuitem->children->count()) {
                    $skipped = true;
                    continue;
                }
                if ($menuitem->action) {
                    if ($menuitem->action instanceof action_link) {
                        $link = $menuitem->action;
                        // Give preference to setting icon over action icon.
                        if (!empty($menuitem->icon)) {
                            $link->icon = $menuitem->icon;
                        }
                    } else {
                        $link = new action_link($menuitem->action, $menuitem->text, null, null, $menuitem->icon);
                    }
                } else {
                    if ($onlytopleafnodes) {
                        $skipped = true;
                        continue;
                    }
                    $link = new action_link(new moodle_url('#'), $menuitem->text, null, ['disabled' => true], $menuitem->icon);
                }
                if ($indent) {
                    $link->add_class('m-l-1');
                }
                if (!empty($menuitem->classes)) {
                    $link->add_class(implode(" ", $menuitem->classes));
                }

                $menu->add_secondary_action($link);
                $skipped = $skipped || $this->build_action_menu_from_navigation($menu, $menuitem, true);
            }
        }
        return $skipped;
    }

}
