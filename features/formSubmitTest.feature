Feature:
  In order to submit a form
  As a user
  I should be able to fill the form

  Scenario:
    Given I am on "/"
    When I select "1992" from "select-year"
    When I select "may" from "select-month"
    When I select "15" from "select-day"
    When I press "submit-btn"
    Then I should see "Monkey"