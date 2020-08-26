@theme @theme_boost_campus @theme_boost_campus_general_settings
Feature: Configuring the theme_boost_campus plugin for the "General settings" tab
  In order to use the features
  As admin
  I need to be able to configure the theme Boost Campus plugin

  # This is derivated from theme Boost and should be covered there with tests
  #  Scenario: Change "Theme preset"

  # This is derivated from theme Boost and should be covered there with tests
  #  Scenario: Upload "Additional theme preset files"

  # This is derivated from theme Boost and should be covered there with tests
  #  Scenario: Add "Background image"

  # This is derivated from theme Boost and should be covered there with tests
  #  Scenario: Set "Brand colour"

  # This is not testable with behat
  #  Scenario: Set "Brand success colour"

  # This is not testable with behat
  #  Scenario: Set "Brand info colour"

  # This is not testable with behat
  #  Scenario: Set "Brand warning colour"

  # This is not testable with behat
  #  Scenario: Set "Brand danger colour"

  @javascript @_file_upload
  Scenario: Add "Favicon"
    When I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "General settings" "link"
    And I upload "theme/boost_campus/tests/fixtures/favicon.ico" file to "Favicon" filemanager
    And I press "Save changes"
    Then "//head//link[contains(@href, 'favicon.ico')]" "xpath_element" should exist
