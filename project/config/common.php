<?php

use yii\helpers\ArrayHelper;

$params = ArrayHelper::merge(require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php'));

return [
    'language' => 'ru',
    'name' => 'Matt',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'modules' => [
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
        'main' => [
        	'class' => 'app\modules\main\Module',
        ],
    ],
	'components' => [
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'forceTranslation' => true,
                ],
            ],
        ],
		'db' => [
			'class' => 'yii\db\Connection',
			'charset' => 'utf8',
		],
		'urlManager' => [
			'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'main/default/index',
                'contact' => 'main/contact/index',
                '<_a:error>' => 'main/default/<_a>',
                '<_a:(login|logout|signup|email-confirm|request-password-reset|password-reset)>' => 'user/default/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
                '<_m:[\w\-]+>' => '<_m>/default/index',
                '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
            ],
        ],
        'mailer' => ['class' => 'yii\swiftmailer\Mailer',],
        'cache' => ['class' => 'yii\caching\DummyCacher',],
        'log' => ['class' => 'yii\log\Dispatcher',],
	],
	'params' => $params,
];