<?php


class HotelDetailsCest
{
    public $term = 'The Langham London';
    public function __construct() {
    }
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
      $I->amOnPage('/');
      $I->fillField("//input[@type='search']", $this->term);
      $I->click("//button[@ref='searchButton']");
      $I->wait(3);
      $I->seeElement("//h3[text()=".$this->term."]");
    }
}
