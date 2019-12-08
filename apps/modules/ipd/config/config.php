<?php

use Phalcon\Config;

return new Config(
    [
        'database' => [
            'adapter' => getenv('IPD_DB_ADAPTER'),
            'host' => getenv('IPD_DB_HOST'),
            'username' => getenv('IPD_DB_USERNAME'),
            'password' => getenv('IPD_DB_PASSWORD'),
            'dbname' => getenv('IPD_DB_NAME'),
        ], 

        'mail' => [
            'driver' => getenv('IPD_MAIL_DRIVER'),
            'cacheDir' => APP_PATH . "/cache/mail/",
            'fromName' => getenv('IPD_MAIL_FROM_NAME'),
            'fromEmail' => getenv('IPD_MAIL_FROM_EMAIL'),
            'smtp' => [
                'server'    => getenv('IPD_MAIL_SMTP_HOST'),
                'port'      => getenv('IPD_MAIL_SMTP_PORT'),
                'username'  => getenv('IPD_MAIL_SMTP_USERNAME'),
                'password'  => getenv('IPD_MAIL_SMTP_PASSWORD'),
            ],
        ],
    ]
);
