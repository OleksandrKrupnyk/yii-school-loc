<?php
/**
 * Project: school
 * Date: 17.07.2019
 * Time: 1:12
 */

use app\models\UserJoinForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

echo Html::beginTag('div', ['class' => 'panel panel-warning']);
echo Html::beginTag('div', ['class' => 'panel-heading']);
echo Html::tag('h1', 'Join us');
echo Html::endTag('div');
echo Html::beginTag('div', ['class' => 'panel-body']);

$form = ActiveForm::begin(['id' => 'user-join-form', 'layout' => 'horizontal']);

/**
 * @var UserJoinForm $model
 */
echo $form->field($model, 'name')
    ->textInput(['placeholder' => Yii::t('app','Name')])
    ->label(Yii::t('app', 'Name'));
echo $form->field($model, 'email')
    ->input('email')
    ->textInput(['placeholder' => Yii::t('app','Email')])
    ->label(Yii::t('app', 'Email'));
echo $form->field($model, 'password')
    ->passwordInput(['placeholder' => Yii::t('app','Password')])
    ->label(Yii::t('app', 'Password'));

echo $form->field($model, 'password2')
    ->passwordInput(['placeholder' => Yii::t('app','Re-type password')])
    ->label(Yii::t('app', 'Re-type password'));
echo Html::submitButton('[' . Yii::t('app', 'Create') . ']', ['class' => 'btn btn-primary']);
ActiveForm::end();

echo Html::endTag('div');

echo Html::endTag('div');
