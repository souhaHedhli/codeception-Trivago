<?php


class SignupCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
      $email = time().'@gmail.com';
      $password = 'password';
      $I->wantTo('Signup successfully');
      $I->amOnPage('/oauth-signup');
      $I->see('social network');
      $I->submitForm('#auth_form', [
        'sEmail' => $email,
        'sPassword' => $password
      ]);
      $I->wait(3);
      $I->see('Thanks for signing up!');
    }
}
