<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=db_service;dbname=salon_db',
//    'dsn' => 'mysql:host=127.0.0.1;dbname=salon_db',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
