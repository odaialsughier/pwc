<?php
/**
 * Created by PhpStorm.
 * User: bahaaodeh
 * Date: 7/16/18
 * Time: 5:16 PM
 */

namespace common\behaviors;


use Yii;
use yii\filters\Cors;

class CorsCustom extends  Cors{


    public function beforeAction($action)
    {
        parent::beforeAction($action);
        if (Yii::$app->request->isOptions) {
            Yii::$app->end();
        }

        return true;
    }
}