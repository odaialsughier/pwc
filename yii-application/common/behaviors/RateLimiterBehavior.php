<?php

namespace common\behaviors;

use common\models\Country;
use Yii;
use common\components\Helper;
use ethercreative\ratelimiter\RateLimiter as RequestsRateLimiter;

class RateLimiterBehavior extends RequestsRateLimiter
{

    /***
     * @var Array of excluded IPs.
     */
    public $exceptIps;


    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        $ip = Helper::getUserIP();

        if (Helper::getCurrentCountryId() == Country::EGYPT){
            return true;
        }

        if((!empty($this->exceptIps) AND is_array($this->exceptIps) AND in_array($ip,$this->exceptIps)) || YII_ENV != 'prod'){
            return true;
        }
        return parent::beforeAction($action);
    }
}
