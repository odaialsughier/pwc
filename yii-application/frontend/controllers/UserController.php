<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/5/21
 * Time: 5:24 PM
 */

namespace frontend\controllers;

use common\models\LoginForm;
use \common\models\User;
use frontend\models\SignupForm;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\ServerErrorHttpException;

class UserController extends ActiveController
{

    public $modelClass = User::class;

    protected function verbs()
    {
        return ArrayHelper::merge(parent::verbs(), [
            'login' => ['POST'],
            'register' => ['POST']
        ]);
    }


    public function authExcept()
    {
        return ['login','register'];
    }
    /**
     * Logs user in.
     *
     * @return mixed
     */
    public function actionLogin(){
        $model = new LoginForm();
        $model->load(Yii::$app->request->bodyParams, '');
        if ($model->validate()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(200);
        } else if (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to login for unknown reason.');
        }
        return $model;

    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionRegister()
    {
        $model = new SignupForm();
        $model->load(Yii::$app->request->bodyParams, '');
        if ($model->signup()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(200);
        } else if (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to login for unknown reason.');
        }
        return $model;
    }

}
