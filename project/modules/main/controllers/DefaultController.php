<?php

namespace app\modules\main\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function action()
    {
    	return [
    		'error' => [
    			'class' => 'yii\web\ErrorAction',
    		],
    	];
    }
}
