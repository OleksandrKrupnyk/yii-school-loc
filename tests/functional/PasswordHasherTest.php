<?php

use app\models\UserRecord;
use yii\base\Security;

class PasswordHasherTest extends \Codeception\Test\Unit
{
    /**
     * @var \FunctionalTester
     */
    protected $tester;

    protected function _before()
    {

    }

    protected function _after()
    {
    }

    //tests
    public function testPasswordIsHash()
    {
        $my_password      = '123456';
        $userRecord_local = new UserRecord();
        $userRecord_local->setTestUser();
        $userRecord_local->setPassword($my_password);
        $userRecord_local->save();

        $userRecord_found = UserRecord::findOne($userRecord_local->id);
        $this->assertInstanceOf(get_class($userRecord_local), $userRecord_found);

        $security = new Security();
        $this->assertTrue($security->validatePassword($my_password, $userRecord_found->passhash));

        $userRecord_local->delete();


    }

    public function testPasswordIsNotRehashed()
    {
        $my_password      = '123456';
        $userRecord_local = new UserRecord();
        $userRecord_local->setTestUser();
        $userRecord_local->setPassword($my_password);
        $userRecord_local->save();
        $fist_hash              = $userRecord_local->passhash;
        $userRecord_local->name .= (string)random_int(1, 9);
        $userRecord_local->save();

        $this->assertEquals($fist_hash, $userRecord_local->passhash);
        $userRecord_found = UserRecord::findOne($userRecord_local->id);
        $this->assertInstanceOf(get_class($userRecord_local), $userRecord_found);
        $this->assertEquals($fist_hash, $userRecord_found->passhash);
        $userRecord_local->delete();
    }
}