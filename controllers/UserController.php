<?php
/**
 * Project: school
 * Date: 19.07.2019
 * Time: 0:24
 */

namespace app\controllers;

use app\models\UserIdentity;
use app\models\UserJoinForm;
use app\models\UserLoginForm;
use yii\helpers\Url;
use yii;
use app\models\UserRecord;
use yii\bootstrap\ActiveForm;
use yii\web\Controller;use yii\web\Response;

/**
 * Class UserController
 *
 * @package app\controllers
 */
class UserController extends Controller
{
    /**
     * @return array|string
     */
    public function actionJoin()
    {
        $model = new UserJoinForm();
        $user = new UserRecord();
        $user->setTestUser();
        $model->setUserRecord($user);
        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->validate()){
            $userRecord = new UserRecord();
            $userRecord->setUserJoinForm($model);
//            var_dump($userRecord);die();
            $userRecord->save();
            return $this->redirect(Url::to(['user/login']));
        }
        return $this->render('join', compact('model'));
    }



    /**
     * @return Response
     */
    public function actionLogout() :Response
    {
        Yii::$app->user->logout();
        return $this->redirect(Url::home());
    }


    /**
     * @return string|Response
     */
    public function actionLogin()
    {
        $model = new UserLoginForm();
        if (Yii::$app->request->isPost
            && $model->load(Yii::$app->request->post())
            && $model->validate()

        ) {
            $model->login();
            return $this->redirect(Url::home());
        }
        return $this->render('login', compact('model'));
    }



}