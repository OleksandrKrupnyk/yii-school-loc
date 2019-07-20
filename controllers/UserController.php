<?php
/**
 * Project: school
 * Date: 19.07.2019
 * Time: 0:24
 */

namespace app\controllers;

use app\models\UserIdentity;
use yii;
use app\models\UserRecord;
use yii\web\Controller;

/**
 * Class UserController
 *
 * @package app\controllers
 */
class UserController extends Controller
{
    /**
     * @return string
     */
    public function actionJoin(): string
    {
//        $user = new UserRecord();
//        $user->setTestUser();
//        $user->save();

        return $this->render('join');
    }

    /**
     * @return string
     */
    public function actionLogin(): string
    {
        $uid = UserIdentity::findIdentity(1);
        Yii::$app->user->login($uid);
        return $this->render('login');
    }

}