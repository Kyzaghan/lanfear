<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='. $params['dbHost'] .';dbname='. $params['dbName'],
    'username' => $params['dbUser'],
    'password' => $params['dbPassword'],
    'charset' => 'utf8',
];
