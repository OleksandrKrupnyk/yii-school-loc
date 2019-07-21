<?php
/**
 * Project: school
 * Date: 17.07.2019
 * Time: 1:12
 */

use app\models\UserRecord;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

echo Html::beginTag('div', ['class' => 'panel panel-info']);
echo Html::beginTag('div', ['class' => 'panel-heading']);
echo Html::tag('h1', 'Log in');
echo Html::endTag('div');
echo Html::beginTag('div', ['class' => 'panel-body']);
$form = ActiveForm::begin(['id' => 'user-login-form', 'layout' => 'horizontal']);
/**
 * @var UserRecord $model
 */
echo $form->field($model, 'email')
    ->input('email')
    ->label(Yii::t('app', 'E-mail'));
echo $form->field($model, 'password')
    ->passwordInput()
    ->label(Yii::t('app', 'Password'));
echo $form->field($model, 'remember')
    ->checkbox([
        'template' => '<div class="control-label col-sm-3">{label}</div><div class="col-md-6">{input}</div><p class="help-block help-block-error ">{error}</p>'
    ])
    ->label(Yii::t('app', 'Remember me'));
echo Html::submitButton('[' . Yii::t('app', 'Enter') . ']', ['class' => 'btn btn-primary']);
ActiveForm::end();
echo Html::endTag('div');

echo Html::endTag('div');
