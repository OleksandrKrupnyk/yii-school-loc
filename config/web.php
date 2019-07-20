<?php
return [
    'id'         => 'school',
    'name'       => 'School Dev',
    'basePath'   => dirname(__DIR__, 1),
    // Компоненты
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,

        ],
        'request'    => [
            'cookieValidationKey' => 'someinterestingstringonmymindIamHappy',
        ],
        'db'         => require __DIR__ . '/db.php',
        'user'       => [
            'identityClass' => 'app\models\UserIdentity',
            //            'enableSession'=>false
        ]
    ],
    'bootstrap'  => ['debug'],
    'modules'    => [
        'debug' => [
            'class' => 'yii\debug\Module',
        ]
    ]
];