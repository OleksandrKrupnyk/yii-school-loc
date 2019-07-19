<?php
return [
    'id'         => 'school-console',
    'basePath'   => dirname(__DIR__, 1),
    'components'=>[
        'db'=>[
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=videoschool',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'vs_'
        ]
    ],
];