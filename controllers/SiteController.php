<?php
/**
 * Project: school
 * Date: 17.07.2019
 * Time: 1:03
 */

namespace app\controllers;

use yii\web\Controller;

/**
 * Class SiteController
 *
 * @package app\controllers
 */
class SiteController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionJoin()
    {
        return $this->render('join');
    }

    public function actionLogin()
    {
        return $this->render('login');
    }

}