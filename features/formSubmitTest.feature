Feature:
  In order to submit a form
  As a user
  I should be able to fill the form

  Scenario:
    Given I am on the homepage
    When I select "15" in the "select-day" select
    When I select "1992" from "select-year"
    When I select "may" from "select-month"