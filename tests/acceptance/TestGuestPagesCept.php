<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Test pages');
$I->amOnPage('/');
$I->see('VideoSchool','h1');
$I->seeLink('Join','/user/join');
$I->seeLink('Login','/user/login');
$I->amOnPage('/user/join');
$I->see('Join as','h1');

$I->amOnPage('/user/login');
$I->see('Log in','h1');
