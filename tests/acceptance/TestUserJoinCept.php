<?php

use Step\Acceptance\TestUserJoin;

$I = new TestUserJoin($scenario);
$I->wantTo('New user join and login');
// Создание пользователей
$user1 = $I->imagingUser();
$user2 = $I->imagingUser();
// Логин пользователя
$I->loginUser($user1);
$I->see('This email does not register');
// Регистрация пользователей
$I->joinUser($user1);
$I->joinUser($user2);

$I->joinUser($user1);
$I->see('This email already exist');

$I->loginUser($user1);
$I->isUserLogged($user1);

$I->noUserLogged($user2);
$I->logoutUser();


$I->loginUser($user2);
$I->isUserLogged($user2);

$I->noUserLogged($user1);
$I->logoutUser();


$user1=['password'=>'wrong password'];
$I->loginUser($user1);
$I->see('Wrong password');

