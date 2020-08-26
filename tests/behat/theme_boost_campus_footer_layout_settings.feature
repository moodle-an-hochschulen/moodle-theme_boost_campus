@theme @theme_boost_campus @theme_boost_campus_footer_layout_settings
Feature: Configuring the theme_boost_campus plugin for the "Footer Layout Settings" tab
  In order to use the features
  As admin
  I need to be able to configure the theme Boost Campus plugin

  Background:
    Given the following "users" exist:
      | username |
      | teacher1 |
    And the following "courses" exist:
      | fullname | shortname |
      | Course 1 | C1        |
    And the following "course enrolments" exist:
      | user     | course | role           |
      | teacher1 | C1     | editingteacher |

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  Scenario: Setting "Footer blocks" to "One block columns in footer"
    # Position of "Add a block" widget must be set to "At the bottom of the nav drawer" because the Moodle
    # Behat step to add a block does not work with the position "At the bottom of the default block region"
    Given the following config values are set as admin:
      | config            | value             | plugin             |
      | footerblocks      | 1columns          | theme_boost_campus |
      | addablockposition | positionnavdrawer | theme_boost_campus |
    And I log in as "admin"
    And I navigate to "Development > Purge caches" in site administration
    And I press "Purge all caches"
    And I follow "Dashboard" in the user menu
    When I press "Customise this page"
    And I add the "Latest announcements" block
    And I configure the "Latest announcements" block
    And I set the following fields to these values:
      | id_bui_region | footer-left |
    And I press "Save changes"
    Then I should see "Latest announcements" in the "#block-region-footer-left" "css_element"

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  Scenario: Setting "Footer blocks" to "Two block columns in footer"
    # Position of "Add a block" widget must be set to "At the bottom of the nav drawer" because the Moodle
    # Behat step to add a block does not work with the position "At the bottom of the default block region"
    Given the following config values are set as admin:
      | config            | value             | plugin             |
      | footerblocks      | 2columns          | theme_boost_campus |
      | addablockposition | positionnavdrawer | theme_boost_campus |
    And I log in as "admin"
    And I navigate to "Development > Purge caches" in site administration
    And I press "Purge all caches"
    And I follow "Dashboard" in the user menu
    When I press "Customise this page"
    And I add the "Latest announcements" block
    And I configure the "Latest announcements" block
    And I set the following fields to these values:
      | id_bui_region | footer-left |
    And I press "Save changes"
    And I add the "Comments" block
    And I configure the "Comments" block
    And I set the following fields to these values:
      | id_bui_region | footer-right |
    And I press "Save changes"
    Then I should see "Latest announcements" in the "#block-region-footer-left" "css_element"
    And I should see "Comments" in the "#block-region-footer-right" "css_element"

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  Scenario: Setting "Footer blocks" to "Three block columns in footer"
    # Position of "Add a block" widget must be set to "At the bottom of the nav drawer" because the Moodle
    # Behat step to add a block does not work with the position "At the bottom of the default block region"
    Given the following config values are set as admin:
      | config            | value             | plugin             |
      | footerblocks      | 3columns          | theme_boost_campus |
      | addablockposition | positionnavdrawer | theme_boost_campus |
    And I log in as "admin"
    And I navigate to "Development > Purge caches" in site administration
    And I press "Purge all caches"
    And I follow "Dashboard" in the user menu
    When I press "Customise this page"
    And I add the "Latest announcements" block
    And I configure the "Latest announcements" block
    And I set the following fields to these values:
      | id_bui_region | footer-left |
    And I press "Save changes"
    And I add the "Comments" block
    And I configure the "Comments" block
    And I set the following fields to these values:
      | id_bui_region | footer-middle |
    And I press "Save changes"
    And I add the "Tags" block
    And I configure the "Tags" block
    And I set the following fields to these values:
      | id_bui_region | footer-right |
    And I press "Save changes"
    Then I should see "Latest announcements" in the "#block-region-footer-left" "css_element"
    And I should see "Comments" in the "#block-region-footer-middle" "css_element"
    And I should see "Tags" in the "#block-region-footer-right" "css_element"

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  Scenario: Setting "Footer blocks" to "No blocks in footer"
    # Position of "Add a block" widget must be set to "At the bottom of the nav drawer" because the Moodle
    # Behat step to add a block does not work with the position "At the bottom of the default block region"
    Given the following config values are set as admin:
      | config            | value             | plugin             |
      | footerblocks      | 0columns          | theme_boost_campus |
      | addablockposition | positionnavdrawer | theme_boost_campus |
    And I log in as "admin"
    And I navigate to "Development > Purge caches" in site administration
    And I press "Purge all caches"
    And I follow "Dashboard" in the user menu
    When I press "Customise this page"
    And I add the "Latest announcements" block
    And I configure the "Latest announcements" block
    Then I should not see "Footer (left)" in the "#id_bui_region" "css_element"
    And  I should not see "Footer (middle)" in the "#id_bui_region" "css_element"
    Then I should not see "Footer (right)" in the "#id_bui_region" "css_element"
    And I set the following fields to these values:
      | id_bui_region | side-pre |
    And I press "Save changes"
    Then "#block-region-footer-left" "css_element" should not exist
    And "#block-region-footer-middle" "css_element" should not exist
    And "#block-region-footer-right" "css_element" should not exist
    And I should not see "Latest announcements" in the "#page-footer" "css_element"

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  # This scenario does not work with the settings short notation
  #  Given the following config values are set as admin:
  #    | config             | value | plugin             |
  #    | footerhidehelplink | 1     | theme_boost_campus |
  Scenario: Enable Hide link to the Moodle docs"
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Footer Layout Settings" "link"
    And I set the field "s_theme_boost_campus_footerhidehelplink" to "1"
    And I press "Save changes"
    And I log out
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    Then I should not see "Moodle Docs for this page" in the "page-footer" "region"

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  # This scenario does not work with the settings short notation
  #  Given the following config values are set as admin:
  #    | config             | value | plugin             |
  #    | footerhidehelplink | 0     | theme_boost_campus |
  Scenario: Counter check: Disable "Hide link to the Moodle docs"
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Footer Layout Settings" "link"
    And I set the field "s_theme_boost_campus_footerhidehelplink" to "0"
    And I press "Save changes"
    And I log out
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    Then I should see "Moodle Docs for this page" in the "page-footer" "region"

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  Scenario: Enable "Hide login information"
  # This scenario does not work with the settings short notation
  #  Given the following config values are set as admin:
  #    | config              | value | plugin             |
  #    | footerhidelogininfo | 1     | theme_boost_campus |
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Footer Layout Settings" "link"
    And I set the field "s_theme_boost_campus_footerhidelogininfo" to "1"
    And I press "Save changes"
    Then I should not see "You are logged in as Admin User" in the "page-footer" "region"

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  Scenario: Counter check: Disable "Hide login information"
  # This scenario does not work with the settings short notation
  #  Given the following config values are set as admin:
  #    | config              | value | plugin             |
  #    | footerhidelogininfo | 0     | theme_boost_campus |
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Footer Layout Settings" "link"
    And I set the field "s_theme_boost_campus_footerhidelogininfo" to "0"
    And I press "Save changes"
    Then I should see "You are logged in as Admin User" in the "page-footer" "region"

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  # This scenario does not work with the settings short notation
  #  Given the following config values are set as admin:
  #    | config             | value | plugin             |
  #    | footerhidehomelink | 1     | theme_boost_campus |
  Scenario: Enable "Hide link to the webpage start"
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Footer Layout Settings" "link"
    And I set the field "s_theme_boost_campus_footerhidehomelink" to "1"
    And I press "Save changes"
    Then I should not see "Home" in the "page-footer" "region"

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  # This scenario does not work with the settings short notation
  #  Given the following config values are set as admin:
  #    | config             | value | plugin             |
  #    | footerhidehomelink | 0     | theme_boost_campus |
  Scenario: Counter check: Disable"Hide link to the webpage start"
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Footer Layout Settings" "link"
    And I set the field "s_theme_boost_campus_footerhidehomelink" to "0"
    And I press "Save changes"
    Then I should see "Home" in the "page-footer" "region"

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  # This scenario does not work with the settings short notation
  #  Given the following config values are set as admin:
  #    | config                  | value | plugin             |
  #    | footerhideusertourslink | 1     | theme_boost_campus |
  Scenario: Enable "Hide link to reset the user tour"
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Footer Layout Settings" "link"
    And I set the field "s_theme_boost_campus_footerhideusertourslink" to "1"
    And I press "Save changes"
    # As both provided user tours are disabled in the testing environment, we need to enable one
    # (the Dashboard tour) first.
    And I navigate to "Appearance > User tours" in site administration
    And I click on "//td[@id='tours_r0_c3']//a[contains(concat(' ',normalize-space(@class),' '),'quickeditlink')]" "xpath_element"
    And I log out
    When I log in as "teacher1"
    Then I should not see "Reset user tour on this page" in the "page-footer" "region"

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  # This scenario does not work with the settings short notation
  #  Given the following config values are set as admin:
  #    | config                  | value | plugin             |
  #    | footerhideusertourslink | 0     | theme_boost_campus |
  Scenario: Counter check: Disable "Hide link to reset the user tour"
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Footer Layout Settings" "link"
    And I set the field "s_theme_boost_campus_footerhideusertourslink" to "0"
    And I press "Save changes"
    # As both provided user tours are disabled in the testing environment, we need to enable one
    # (the Dashboard tour) first.
    And I navigate to "Appearance > User tours" in site administration
    And I click on "//td[@id='tours_r0_c3']//a[contains(concat(' ',normalize-space(@class),' '),'quickeditlink')]" "xpath_element"
    And I log out
    When I log in as "teacher1"
    Then I should see "Reset user tour on this page" in the "page-footer" "region"

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  # This scenario does not work with the settings short notation
  #  Given the following config values are set as admin:
  #    | config                | value | plugin             |
  #    | hidefooteronloginpage | 1     | theme_boost_campus |
  Scenario: Enable "Hiding the footer on the login page"
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Footer Layout Settings" "link"
    And I set the field "s_theme_boost_campus_hidefooteronloginpage" to "1"
    And I press "Save changes"
    And I log out
    And I click on "Log in" "link"
    Then I should not see "You are not logged in."

  # This scenario needs full browser support only for this Behat test to pass, otherwise javascript would not be needed.
  @javascript
  # This scenario does not work with the settings short notation
  #  Given the following config values are set as admin:
  #    | config                | value | plugin             |
  #    | hidefooteronloginpage | 0     | theme_boost_campus |
  Scenario: Counter check: Disable "Hiding the footer on the login page"
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Footer Layout Settings" "link"
    And I set the field "s_theme_boost_campus_hidefooteronloginpage" to "0"
    And I press "Save changes"
    And I log out
    And I click on "Log in" "link"
    Then I should see "You are not logged in."
