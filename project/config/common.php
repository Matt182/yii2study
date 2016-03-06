<?php

use yii\helpers\ArrayHelper;

$params = ArrayHelper::merge(require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php'));

return [
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'components' => [
		'db' => [
			'class' => 'yii\db\Connection',
			'charset' => 'utf8',
		],
		'urlManager' => [
			'class' => 'yii\web\UrlManager'
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'mailer' => ['class' => 'yii\swiftmailer\Mailer',],
        'cache' => ['class' => 'yii\caching\DummyCacher',],
        'log' => ['class' => 'yii\log\Dispatcher',],
	],
	'params' => $params,
];