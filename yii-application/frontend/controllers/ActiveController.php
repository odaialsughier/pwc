<?php
/**
 * Created by PhpStorm.
 * User: bahaaodeh
 * Date: 7/7/20
 * Time: 10:20 AM
 */

namespace frontend\controllers;

use common\behaviors\ApiResponseBehavior;
use common\behaviors\CorsCustom;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\filters\VerbFilter;
use yii\web\Response;

class ActiveController extends \yii\rest\ActiveController
{

    public function behaviors()
    {

        return [
            'corsFilter' => [
                'class' => CorsCustom::className(),
                'cors' => [
                    'Origin' => ['*'],
                    // restrict access to
                    'Access-Control-Allow-Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Headers' => ['*'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Allow-Credentials' => false,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 86400,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => [],
                ]
            ],

            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
//                    'application/xml' => Response::FORMAT_XML,
                ],
            ],
            'verbFilter' => [
                'class' => VerbFilter::className(),
                'actions' => $this->verbs(),
            ],
            'authenticator' => [
                'class' => CompositeAuth::className(),
                'optional' => array_merge(['error'], $this->authOptional()),
                'except' => $this->authExcept(),
                'authMethods' => [
                    HttpBasicAuth::className(),
                    HttpBearerAuth::className(),
                    QueryParamAuth::className(),
                ],
            ],
            'apiResponse' => [
                'class' => ApiResponseBehavior::className(),
            ],
        ];
    }

    public function authOptional()
    {
        return [];
    }

    public function authExcept()
    {
        return [];
    }


}
