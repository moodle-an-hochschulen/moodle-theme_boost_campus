# This file is part of Moodle - http://moodle.org/
#
# Moodle is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# Moodle is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
#
# Tests for Boost campus add block position.
#
# @package    theme_boost_campus
# @copyright  2019 Luca Bösch <luca.boesch@bfh.ch>
# @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later

@theme @theme_boost_campus
Feature: When the Moodle theme is set to Boost campus, the "Add a block" widget can be set
    either to be in the nav drawer or in the default block column.

  Scenario: Log in as admin and set the "Add a block" widget to be in the nav drawer
    Given I log in as "admin"
    And I navigate to "Appearance > Themes > Boost Campus" in site administration
    And I click on "Advanced settings" "link"
    And I set the field "Position of \"Add a block\" widget" to "At the bottom of the nav drawer"
    And I press "Save changes"
    And I am on site homepage
    And I turn editing mode on
    Then I should see "Add a block" in the "nav-drawer" "region"

  Scenario: Log in as admin and set the "Add a block" widget to be in the default block column
    Given I log in as "admin"
    And I navigate to "Appearance > Themes > Boost Campus" in site administration
    And I click on "Advanced settings" "link"
    And I set the field "Position of \"Add a block\" widget" to "At the bottom of the default block region"
    And I press "Save changes"
    And I am on site homepage
    And I turn editing mode on
    Then I should see "Add a block" in the "block-region-side-pre" "region"
