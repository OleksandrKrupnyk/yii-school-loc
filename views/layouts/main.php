<?php

use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/**
 * @var string $content
 */
$this->beginPage()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
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
$menu = [
    ['label' => 'Join', 'url' => ['/site/join']],
    ['label' => 'Login', 'url' => ['/site/login']]

];
echo Nav::widget([
    'options' => [
        'class' => 'navbar-nav navbar-right'
    ],
    'items'   => $menu
]);
NavBar::end();
echo Html::tag('div', $content, ['class' => 'container-fluid']);
$this->endBody();
?>

</body>
</html>
<?php
$this->endPage();
?>

