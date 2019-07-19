<?php
/**
 * Project: school
 * Date: 19.07.2019
 * Time: 0:24
 */

namespace app\controllers;


use yii\web\Controller;

class UserController extends Controller
{
    public function actionJoin()
    {
        return $this->render('join');
    }

    public function actionLogin()
    {
        return $this->render('login');
    }

}