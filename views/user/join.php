<?php
/**
 * Project: school
 * Date: 17.07.2019
 * Time: 1:12
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

echo Html::beginTag('div', ['class' => 'panel panel-warning']);
echo Html::beginTag('div', ['class' => 'panel-heading']);
echo Html::tag('h1', 'Join as');
echo Html::endTag('div');
echo Html::beginTag('div', ['class' => 'panel-body']);

echo Html::tag('label',Yii::t('app', 'Name'),[]);

echo Html::tag('label',Yii::t('app', 'Email'),[]);

echo Html::tag('label',Yii::t('app', 'Password'),[]);
echo '[Create]';
echo Html::endTag('div');

echo Html::endTag('div');
