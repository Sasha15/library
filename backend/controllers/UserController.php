<?php

namespace backend\controllers;
use backend\models\User;
use Yii;

class UserController extends \yii\web\Controller
{
    public function actionSearch()
    {
        return $this->render('search');
    }

}
