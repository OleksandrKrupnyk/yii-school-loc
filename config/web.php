<?php
return [
    'id'         => 'school',
    'basePath'   => dirname(__DIR__, 1),
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,

        ],
        'request' => [
            'cookieValidationKey' => 'someinterestingstringonmymindIamHappy',
        ]
    ],
    'bootstrap'  => ['debug'],
    'modules'    => [
        'debug' => [
            'class' => 'yii\debug\Module',
        ]
    ]
];