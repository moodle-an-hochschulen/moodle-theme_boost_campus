@theme @theme_boost_campus @theme_boost_campus_general_settings
Feature: Configuring the theme_boost_campus plugin for the "General settings" tab
  In order to use the features
  As admin
  I need to be able to configure the theme Boost Campus plugin

  Background:
    # There is a nasty bug with Behat-testing this theme that the footer is not displayed until the settings
    # of the theme are stored manually. It seems not to be sufficient to just rely on the default settings being
    # stored during the installation of the theme. Until we find the root of this bug, we circumvent it by setting the
    # brand color manually and within this process making sure that all settings are really stored to the database.
    And I log in as "admin"
    And I navigate to "Appearance > Boost Campus" in site administration
    And I click on "General settings" "link"
    And I set the field "id_s_theme_boost_campus_brandcolor" to "#7a99ac"
    And I press "Save changes"
    And I log out

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
