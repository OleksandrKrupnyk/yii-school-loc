<?php

use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;

/**
 * @var string $content
 */
$this->beginPage()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=Yii::$app->name?></title>
    <?=$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Url::to(['/favicon.ico'])]);?>
    <?php $this->head(); ?>
</head>
<body>
<?php
$this->beginBody();
NavBar::begin([
    'brandLabel' => 'VideoSchool',
    'brandUrl'   => Yii::$app->homeUrl,
    'options'    => [
        'class' => 'navbar navbar-dark bg-info sticky-top'
    ]
]);

if(Yii::$app->user->isGuest){

$menu = [
    ['label' => 'Join', 'url' => ['/user/join']],
    ['label' => 'Login', 'url' => ['/user/login']]

];
}else{
    $name = Yii::$app->user->getIdentity()->name;
    $menu = [
        ['label' => "Log out ({$name})", 'url' => ['/user/logout']]
    ];
}



echo Nav::widget([
    'options' => [
        'class' => 'navbar-nav navbar-right'
    ],
    'items'   => $menu
]);
NavBar::end();
echo Html::tag('div', $content, ['class' => 'container']);
$this->endBody();
?>

</body>
</html>
<?php
$this->endPage();