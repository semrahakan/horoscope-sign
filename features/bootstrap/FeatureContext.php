<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends \Behat\MinkExtension\Context\MinkContext implements Context, \Behat\Behat\Context\SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @When I select :arg1 in the :arg2 select
     */
    public function iSelectInTheSelect2($arg1, $arg2)
    {
        $page          = $this->getSession()->getPage();
        $selectElement = $page->find('xpath', '//select[@data-name = "' . $arg1 . '"]');

        $selectElement->selectOption($arg2);
    }
}
