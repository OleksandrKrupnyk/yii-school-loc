<?php
return [
    'id'         => 'school-console',
    'basePath'   => dirname(__DIR__, 1),
    'components'=>[
        'db'=> require __DIR__.'/db.php'
    ],
];