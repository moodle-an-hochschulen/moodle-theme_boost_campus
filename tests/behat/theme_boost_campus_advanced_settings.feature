@theme @theme_boost_campus @theme_boost_campus_advanced_settings
Feature: Configuring the theme_boost_campus plugin for the "Advanced settings" tab
  In order to use the features
  As admin
  I need to be able to configure the theme Boost Campus plugin

  Background:
    Given the following "users" exist:
      | username |
      | student1 |
      | teacher1 |
    And the following "courses" exist:
      | fullname | shortname |
      | Course 1 | C1        |
    And the following "course enrolments" exist:
      | user     | course | role           |
      | teacher1 | C1     | editingteacher |
      | student1 | C1     | student        |

  # This is derivated from theme Boost and should be covered there with tests
  # Scenario: Add "Raw initial SCSS"

  # This is derivated from theme Boost and should be covered there with tests
  # Scenario: Add "Raw SCSS"

  # This is not testable with Behat
  # Scenario: "Catch keyboard commands"

  Scenario: Set "Position of "Add a block" widget" to "At the bottom of the default block region"
    Given the following config values are set as admin:
      | config            | value                 | plugin             |
      | addablockposition | positionblockregion   | theme_boost_campus |
    And I log in as "admin"
    And I navigate to "Development > Purge caches" in site administration
    And I press "Purge all caches"
    And I log out
    When I log in as "teacher1"
    And I am on "Course 1" course homepage with editing mode on
    Then I should see "Add a block" in the "#block-region-side-pre" "css_element"
    And I should not see "Add a block" in the "#nav-drawer" "css_element"

  Scenario: Set "Position of "Add a block" widget" to "At the bottom of the nav drawer"
    Given the following config values are set as admin:
      | config            | value                 | plugin             |
      | addablockposition | positionnavdrawer   | theme_boost_campus |
    And I log in as "admin"
    And I navigate to "Development > Purge caches" in site administration
    And I press "Purge all caches"
    And I log out
    When I log in as "teacher1"
    And I am on "Course 1" course homepage with editing mode on
    Then I should see "Add a block" in the "#nav-drawer" "css_element"
    And "#block-region-side-pre" "css_element" should not exist
