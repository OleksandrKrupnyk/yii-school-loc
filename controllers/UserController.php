<?php
/**
 * Project: school
 * Date: 19.07.2019
 * Time: 0:24
 */

namespace app\controllers;

use app\models\UserIdentity;
use app\models\UserJoinForm;
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
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }


        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->validate()){

        }
//        $user = new UserRecord();
//        $user->setTestUser();
//        $user->save();
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
     * @return string
     */
    public function actionLogin(): string
    {
        //$uid = UserIdentity::findIdentity(1);
        //Yii::$app->user->login($uid);
        return $this->render('login');
    }

}