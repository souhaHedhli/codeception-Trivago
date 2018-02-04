<?php

use \Codeception\Util\Locator;
class LoginCest
{
    public $email;
    public $password;
    public function __construct() {
      $this->email = time().'@gmail.com';
      $this->password = 'password';
    }
    public function _before(AcceptanceTester $I)
    {
      $I->amOnPage('/oauth-signup');
      $I->see('social network');
      $I->submitForm('#auth_form', [
        'sEmail' => $this->email,
        'sPassword' => $this->password
      ]);
      $I->wait(3);
      $I->see('Thanks for signing up!');
      $I->click('#authentication-enhance-account .login-btn--submit');
      $I->wait(3);
      $I->click(['xpath' => '//header//button[contains(@tabindex, "-1")]']);
      $I->wait(3);
      $I->click('.js_logOut');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
      $I->wantTo('Login successfully');
      $I->amOnPage('/oauth-login');
      $I->see('social network');
      $I->submitForm('#authentication-login', [
        '_username' => $this->email,
        '_password' => $this->password
      ]);
      $I->wait(3);
      $I->see('Search');
    }
}
