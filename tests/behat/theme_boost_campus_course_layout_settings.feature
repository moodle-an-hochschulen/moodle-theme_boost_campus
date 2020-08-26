@theme @theme_boost_campus @theme_boost_campus_course_layout_settings
Feature: Configuring the theme_boost_campus plugin for the "Course Layout settings" tab
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

  Scenario: Enable "Section 0: Title"
    Given the following config values are set as admin:
      | config        | value   | plugin             |
      | section0title | yes     | theme_boost_campus |
    When I log in as "teacher1"
    And I am on "Course 1" course homepage with editing mode on
    Then I should see "General" in the "li#section-0" "css_element"
    When I edit the section "0" and I fill the form with:
      | Custom                     | 1                           |
      | New value for Section name | This is the general section |
    Then I should see "This is the general section" in the "li#section-0" "css_element"

  @javascript
  Scenario: Counter check: Disable "Section 0: Title"
    Given the following config values are set as admin:
      | config        | value  | plugin             |
      | section0title | no     | theme_boost_campus |
    When I log in as "teacher1"
    And I am on "Course 1" course homepage with editing mode on
    Then "General" "text" in the "li#section-0" "css_element" should not be visible
    When I edit the section "0" and I fill the form with:
      | Custom                     | 1                           |
      | New value for Section name | This is the general section |
    Then I should see "This is the general section" in the "li#section-0" "css_element"

  Scenario: Enable "Course edit button"
    Given the following config values are set as admin:
      | config           | value | plugin             |
      | courseeditbutton | 1     | theme_boost_campus |
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    Then I should see "Turn editing on" in the "#page-header .singlebutton" "css_element"
    When I click on "Turn editing on" "button"
    Then I should see "Turn editing off" in the "#page-header .singlebutton" "css_element"
    And I should see "Add an activity or resource"

  Scenario: Enable "Position of switch role information"
    Given the following config values are set as admin:
      | config                   | value | plugin             |
      | showswitchedroleincourse | yes   | theme_boost_campus |
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    And I follow "Switch role to..." in the user menu
    And I click on "Student" "button"
    Then I should see "You are viewing this course currently with the role:" in the ".switched-role-infobox" "css_element"
    When I click on "Return to my normal role" "link" in the ".switched-role-infobox" "css_element"
    Then I should not see "You are viewing this course currently with the role:"
    And ".switched-role-infobox" "css_element" should not exist

  Scenario: Enable "Show hint in hidden courses"
    Given the following config values are set as admin:
      | config               | value | plugin             |
      | showhintcoursehidden | yes   | theme_boost_campus |
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    When I navigate to "Edit settings" in current page administration
    And I set the following fields to these values:
      | Course visibility | Hide |
    And I click on "Save and display" "button"
    Then I should see "This course is currently hidden. Only enrolled teachers can access this course when hidden." in the ".course-hidden-infobox" "css_element"
    When I am on "Course 1" course homepage
    When I navigate to "Edit settings" in current page administration
    And I set the following fields to these values:
      | Course visibility | Show |
    And I click on "Save and display" "button"
    Then I should not see "This course is currently hidden. Only enrolled teachers can access this course when hidden."
    And ".course-hidden-infobox" "css_element" should not exist

  Scenario: Enable "Show hint for guest access"
    Given the following config values are set as admin:
      | config                    | value | plugin             |
      | showhintcourseguestaccess | yes   | theme_boost_campus |
    And the following "users" exist:
      | username |
      | student2 |
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    And I navigate to "Users > Enrolment methods" in current page administration
    And I click on "Edit" "link" in the "Guest access" "table_row"
    And I set the following fields to these values:
      | Allow guest access | Yes |
    And I press "Save changes"
    And I log out
    When I log in as "student2"
    And I am on "Course 1" course homepage
    Then I should see "You are currently viewing this course as Guest." in the ".course-guestaccess-infobox" "css_element"
    And I log out
    And I log in as "teacher1"
    And I am on "Course 1" course homepage
    And I navigate to "Users > Enrolment methods" in current page administration
    And I click on "Enable" "link" in the "Self enrolment (Student)" "table_row"
    And I log out
    When I log in as "student2"
    And I am on "Course 1" course homepage
    Then I should see "To have full access to the course, you can self enrol into this course." in the ".course-guestaccess-infobox" "css_element"
    And I click on "self enrol into this course" "link" in the ".course-guestaccess-infobox" "css_element"
    And I click on "Enrol me" "button"
    Then I should not see "You are currently viewing this course as Guest."
    And ".course-guestaccess-infobox" "css_element" should not exist
    And I log out
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    And I navigate to "Users > Enrolment methods" in current page administration
    And I click on "Edit" "link" in the "Guest access" "table_row"
    And I set the following fields to these values:
      | Allow guest access | No |
    And I press "Save changes"
    And I log out
    When I log in as "student2"
    And I am on "Course 1" course homepage
    Then I should not see "You are currently viewing this course as Guest."
    And ".course-guestaccess-infobox" "css_element" should not exist

  Scenario: Enable "Show hint for unrestricted self enrolment"
    Given the following config values are set as admin:
      | config                  | value | plugin             |
      | showhintcourseselfenrol | yes   | theme_boost_campus |
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    Then I should not see "This course is currently visible and an unrestricted self enrolment is active:"
    And ".course-selfenrol-infobox" "css_element" should not exist
    And I navigate to "Users > Enrolment methods" in current page administration
    When I click on "Enable" "link" in the "Self enrolment (Student)" "table_row"
    And I am on "Course 1" course homepage
    Then I should see "This course is currently visible and an unrestricted self enrolment is active: \"Self enrolment (Student)\"."
    And ".course-selfenrol-infobox" "css_element" should exist
    And I log out
    When I log in as "student1"
    And I am on "Course 1" course homepage
    Then I should not see "This course is currently visible and an unrestricted self enrolment is active: \"Self enrolment (Student)\""
    And ".course-selfenrol-infobox" "css_element" should not exist

  Scenario: Enable "Show hint for unrestricted self enrolment and check that it hides when password or end date is set"
    Given the following config values are set as admin:
      | config                  | value | plugin             |
      | showhintcourseselfenrol | yes   | theme_boost_campus |
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    Then I should not see "This course is currently visible and an unrestricted self enrolment is active:"
    And ".course-selfenrol-infobox" "css_element" should not exist
    And I navigate to "Users > Enrolment methods" in current page administration
    When I click on "Enable" "link" in the "Self enrolment (Student)" "table_row"
    And I am on "Course 1" course homepage
    Then I should see "This course is currently visible and an unrestricted self enrolment is active: \"Self enrolment (Student)\"."
    And ".course-selfenrol-infobox" "css_element" should exist
    When I click on "enrolment settings" "link" in the ".course-selfenrol-infobox" "css_element"
    And I set the following fields to these values:
      | id_enrolenddate_enabled | 1 |
    And I press "Save changes"
    And I am on "Course 1" course homepage
    Then I should not see "This course is currently visible and an unrestricted self enrolment is active: \"Self enrolment (Student)\""
    And ".course-selfenrol-infobox" "css_element" should not exist
    When I navigate to "Users > Enrolment methods" in current page administration
    And I click on "Edit" "link" in the "Self enrolment (Student)" "table_row"
    And I set the following fields to these values:
        | id_enrolenddate_enabled | 0 |
    And I press "Save changes"
    And I am on "Course 1" course homepage
    Then I should see "This course is currently visible and an unrestricted self enrolment is active: \"Self enrolment (Student)\"."
    And ".course-selfenrol-infobox" "css_element" should exist
    When I click on "enrolment settings" "link" in the ".course-selfenrol-infobox" "css_element"
    And I set the following fields to these values:
        | Enrolment key | 1234 |
    And I press "Save changes"
    And I am on "Course 1" course homepage
    Then I should not see "This course is currently visible and an unrestricted self enrolment is active: \"Self enrolment (Student)\""
    And ".course-selfenrol-infobox" "css_element" should not exist

  Scenario: Enable "Show hint for unrestricted self enrolment and add more than one self enrolment instance"
    Given the following config values are set as admin:
      | config                  | value | plugin             |
      | showhintcourseselfenrol | yes   | theme_boost_campus |
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    Then I should not see "This course is currently visible and an unrestricted self enrolment is active"
    And ".course-selfenrol-infobox" "css_element" should not exist
    And I navigate to "Users > Enrolment methods" in current page administration
    When I click on "Enable" "link" in the "Self enrolment (Student)" "table_row"
    And I am on "Course 1" course homepage
    Then I should see "This course is currently visible and an unrestricted self enrolment is active: \"Self enrolment (Student)\"."
    And ".course-selfenrol-infobox" "css_element" should exist
    When I add "Self enrolment" enrolment method with:
      | Custom instance name | Custom self enrolment |
    And I am on "Course 1" course homepage
    Then I should see "This course is currently visible and an unrestricted self enrolment is active: \"Self enrolment (Student)\"."
    And ".course-selfenrol-infobox" "css_element" should exist
    And I should see "This course is currently visible and an unrestricted self enrolment is active: \"Custom self enrolment\"."
    And ".course-selfenrol-infobox" "css_element" should exist
    When I navigate to "Users > Enrolment methods" in current page administration
    And I click on "Edit" "link" in the "Self enrolment (Student)" "table_row"
    And I set the following fields to these values:
      | Enrolment key | 1234 |
    And I press "Save changes"
    And I am on "Course 1" course homepage
    Then I should not see "This course is currently visible and an unrestricted self enrolment is active: \"Self enrolment (Student)\"."
    And I should see "This course is currently visible and an unrestricted self enrolment is active: \"Custom self enrolment\"."
    And ".course-selfenrol-infobox" "css_element" should exist

  @javascript
  Scenario: Enable "In course settings menu"
    Given the following config values are set as admin:
      | config               | value | plugin             |
      | showsettingsincourse | yes   | theme_boost_campus |
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    Then "#boost-campus-course-settings" "css_element" should not be visible
    When I click on ".context-header-settings-menu [role=button]" "css_element"
    Then "#boost-campus-course-settings" "css_element" should be visible
    And I should see "Course administration" in the "#boost-campus-course-settings" "css_element"
    And I should see "Backup" in the "#course-settings-courseadmin" "css_element"
    And I should see "Users" in the "#boost-campus-course-settings" "css_element"
    When I click on "Users" "link" in the "#boost-campus-course-settings" "css_element"
    Then "#course-settings-users" "css_element" should be visible
    And I should see "Enrolment methods" in the "#course-settings-users" "css_element"
    And I should see "Reports" in the "#boost-campus-course-settings" "css_element"
    When I click on "Reports" "link" in the "#boost-campus-course-settings" "css_element"
    Then "#course-settings-coursereports" "css_element" should be visible
    And I should see "Activity report" in the "#course-settings-coursereports" "css_element"
    And I should see "Badges" in the "#boost-campus-course-settings" "css_element"
    When I click on "Badges" "link" in the "#boost-campus-course-settings" "css_element"
    Then "#course-settings-coursebadges" "css_element" should be visible
    And I should see "Manage badges" in the "#course-settings-coursebadges" "css_element"
    And I should see "Question bank" in the "#boost-campus-course-settings" "css_element"
    When I click on "Question bank" "link" in the "#boost-campus-course-settings" "css_element"
    Then "#course-settings-questionbank" "css_element" should be visible
    And I should see "Questions" in the "#course-settings-questionbank" "css_element"

  # Dependent on setting showsettingsincourse
  @javascript
  Scenario: Set "Switch role to..." location(s) to "Just in the user menu"
    Given the following config values are set as admin:
      | config                               | value | plugin             |
      | showsettingsincourse                 | yes   | theme_boost_campus |
      | incoursesettingsswitchtoroleposition | no    | theme_boost_campus |
    # Purging caches is needed because the theme's SCSS must be rewritten based on the new settings
    And I log in as "admin"
    And I navigate to "Development > Purge caches" in site administration
    And I press "Purge all caches"
    And I log out
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    And I click on ".context-header-settings-menu [role=button]" "css_element"
    Then I should not see "Switch role to" in the "#boost-campus-course-settings" "css_element"
    When I click on ".usermenu" "css_element"
    Then I should see "Switch role to..." in the ".usermenu" "css_element"

  # Dependent on setting showsettingsincourse
  @javascript
  Scenario: Set "Switch role to..." location(s) to "Just in the course settings"
    Given the following config values are set as admin:
      | config                               | value | plugin             |
      | showsettingsincourse                 | yes   | theme_boost_campus |
      | incoursesettingsswitchtoroleposition | yes   | theme_boost_campus |
    # Purging caches is needed because the theme's SCSS must be rewritten based on the new settings
    And I log in as "admin"
    And I navigate to "Development > Purge caches" in site administration
    And I press "Purge all caches"
    And I log out
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    And I click on ".context-header-settings-menu [role=button]" "css_element"
    Then I should see "Switch role to" in the "#boost-campus-course-settings" "css_element"
    When I click on "Switch role to" "link" in the "#boost-campus-course-settings" "css_element"
    Then I should see "Student" in the "#course-settings-switchroletotab" "css_element"
    When I click on ".usermenu" "css_element"
    Then I should not see "Switch role to..." in the ".usermenu" "css_element"

  # Dependent on setting showsettingsincourse
  @javascript
  Scenario: Set "Switch role to..." location(s) to "In both places: in the user menu and in the course settings"
    Given the following config values are set as admin:
      | config                               | value | plugin             |
      | showsettingsincourse                 | yes   | theme_boost_campus |
      | incoursesettingsswitchtoroleposition | both  | theme_boost_campus |
    # Purging caches is needed because the theme's SCSS must be rewritten based on the new settings
    And I log in as "admin"
    And I navigate to "Development > Purge caches" in site administration
    And I press "Purge all caches"
    And I log out
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    And I click on ".context-header-settings-menu [role=button]" "css_element"
    Then I should see "Switch role to" in the "#boost-campus-course-settings" "css_element"
    When I click on "Switch role to" "link" in the "#boost-campus-course-settings" "css_element"
    Then I should see "Student" in the "#course-settings-switchroletotab" "css_element"
    When I click on ".usermenu" "css_element"
    Then I should see "Switch role to..." in the ".usermenu" "css_element"
