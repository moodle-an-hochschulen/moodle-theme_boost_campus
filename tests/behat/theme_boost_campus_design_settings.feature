@theme @theme_boost_campus @theme_boost_campus_design_settings
Feature: Configuring the theme_boost_campus plugin for the "Design Settings" tab
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

  @javascript @_file_upload
  # The setting is designed to display multiple login background images in a random order.
  # The randomness is the reason why we cannot test it here with more than one image.
  Scenario: Use Login page background images
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Design Settings" "link"
    And I upload "theme/boost_campus/tests/fixtures/login_bg.jpg" file to "Login page background images" filemanager
    And I press "Save changes"
    And I log out
    And I click on "Log in" "link"
    Then the "class" attribute of "body" "css_element" should contain "loginbackgroundimage1"

  # Dependent on setting "Use Login page background images"
  @javascript @_file_upload
  Scenario: Display text for login background images
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Design Settings" "link"
    And I upload "theme/boost_campus/tests/fixtures/login_bg.jpg" file to "Login page background images" filemanager
    And I set the field "id_s_theme_boost_campus_loginbackgroundimagetext" to "login_bg.jpg|Copyright by SplitShire on pexels.com"
    And I press "Save changes"
    And I log out
    And I click on "Log in" "link"
    Then I should see "Copyright by SplitShire on pexels.com" in the "#loginbackgroundimagetext" "css_element"

  # This is not testable with Behat
  # Scenario: Enable "Login form"

  # This is not testable with Behat
  # Scenario: Add "Font files"

  # This is not testable with Behat
  # Scenario: Enable "Block icon"

  # This is not testable with Behat
  # Scenario: Change "Block column width on Dashboard"

  # This is not testable with Behat
  # Scenario: Change "Block column width on all other pages"

  Scenario: Enable "Dark navbar"
    Given the following config values are set as admin:
      | config     | value | plugin             |
      | darknavbar | yes   | theme_boost_campus |
    When I log in as "teacher1"
    Then the "class" attribute of "nav" "css_element" should contain "bg-dark"

  Scenario: Counter check: Disable "Dark navbar"
    Given the following config values are set as admin:
      | config     | value | plugin             |
      | darknavbar | no    | theme_boost_campus |
    When I log in as "teacher1"
    Then the "class" attribute of "nav" "css_element" should not contain "bg-dark"

  @javascript
  Scenario: Enable "Show help texts in a modal dialogue"
    # This scenario does not work with the settings short notation
    #  Given the following config values are set as admin:
    #    | config        | value | plugin             |
    #    | helptextmodal | 1     | theme_boost_campus |
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Design Settings" "link"
    And I set the field "s_theme_boost_campus_helptextmodal" to "1"
    And I press "Save changes"
    And I log out
    And I log in as "teacher1"
    And I am on "Course 1" course homepage with editing mode on
    And I add a "Assignment" to section "1" and I fill the form with:
      | Assignment name | Test assign |
      | Description     | Test        |
    And I open "Test assign" actions menu
    And I click on "Edit settings" "link" in the "Test assign" activity
    And I click on "Help with Additional files" "icon"
    Then ".modal-dialog" "css_element" should exist
    And I should see "Help with Additional files" in the "#assign-introattachments-modal-dialogue .modal-title" "css_element"
    And I should see "Additional files for use in the assignment" in the "#assign-introattachments-modal-dialogue .modal-body" "css_element"
    And I should see "Close" in the "#assign-introattachments-modal-dialogue .modal-footer" "css_element"
    And I click on "//div[@id='assign-introattachments-modal-dialogue']//div[@class='modal-footer']//button" "xpath_element"
    Then ".modal-dialog" "css_element" should not be visible

  # This is not testable with Behat #
  # Scenario: Change breakpoint

  @javascript @_file_upload
  Scenario: Add additional resources
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "Design Settings" "link"
    And I upload "theme/boost_campus/tests/fixtures/login_bg.jpg" file to "Add additional resources" filemanager
    # Moodle core step "And I add the "HTML" block relies on the fact that the widget is in the nav drawer
    And I click on "Advanced settings" "link"
    And I set the field "id_s_theme_boost_campus_addablockposition" to "positionnavdrawer"
    And I press "Save changes"
    And I follow "Dashboard" in the user menu
    When I press "Customise this page"
    And I add the "HTML" block
    And I configure the "(new HTML block)" block
    And I set the field "Content" to "<p><img src='/pluginfile.php/1/theme_boost_campus/additionalresources/0/moodle_logo.jpg'><br></p>"
    And I press "Save changes"
    Then "//section[contains(concat(' ',normalize-space(@class),' '),' block_html ')]//img[contains(@src, 'moodle_logo.jpg')]" "xpath_element" should exist
