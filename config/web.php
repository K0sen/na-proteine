<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\Admin',
            'layout' => 'admin'
        ],
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'app*' => [
                    'sourceLanguage' => 'en-US',
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'V7UjAacIlFRoe9dMadEYf9feBwlz6ef1',
            'baseUrl' => ''
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/<page:\d+>' => 'product/index',
                '/' => 'product/index',
                'contact' => 'site/contact',
                'captcha' => 'site/captcha',
                'categories/<type:[a-z_]+>' => 'product/type',
//                [proteins|gainers|vitamins|amino|energy|accessories] [a-z0-9_-]+>
                'categories/<type:[a-z_]+>/<brand:[a-z_]+>' => 'product/type-brand',
                'brand/<brand:[a-z_]+>' => 'product/brand',
                'brand' => 'product/brand-list',
                'categories' => 'product/categories-list',
                'product/<id:\d+>' => 'product/product',
                'article' => 'article/index',
                'article/<id:\d+>' => 'article/show',
                'cart' => 'cart/show',
                'admin/comment' => 'admin/comment/index',
                'admin/show' => 'admin/product/index',
                'admin/user' => 'admin/user/index',
                'admin/user/<id:\d+>' => 'admin/user/show',
                '<_a:(login|logout|signup|email-confirm|password-reset-request|password-reset|about|contact)>' => 'site/<_a>',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
// categories -> syntax/optimum
// brand