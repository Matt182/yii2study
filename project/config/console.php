<?php
use yii\helpers\ArrayHelper;

Yii::setAlias('@tests', dirname(__DIR__) . '/tests/codeception');

$params = ArrayHelper::merge(require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php'));

$config = [
    'id' => 'basic-console',
    'bootstrap' => ['gii'],
    'controllerNamespace' => 'app\commands',
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
