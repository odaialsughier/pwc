<?php
/**
 * Created by PhpStorm.
 * User: bahaaodeh
 * Date: 4/5/18
 * Time: 8:39 PM
 */
namespace common\behaviors;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

class AltibbiBehavior extends \yii\base\Behavior
{

    /**
     * @var string the attribute that will receive timestamp value
     */
    public $createdAtAttribute = 'date_added';
    /**
     * @var string the attribute that will receive timestamp value.
     */
    public $updatedAtAttribute = 'date_modified';
    /**
     * @var string the attribute that will receive user id value
     */
    public $createdByAttribute = 'user_id';
    /**
     * @var string the attribute that will receive user id value.
     */
    public $updatedByAttribute = 'last_modified_by_user_id';
    /**
     * @var string the attribute that will receive member id value
     */
    public $createdByMemberAttribute = 'member_id';
    /**
     * @var string the attribute that will receive member id value.
     */
    public $updatedByMemberAttribute = 'last_modified_by_member_id';

    public $platformIdAttribute = 'platform_id';

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
        ];
    }
    public function beforeUpdate($event)
    {
        /** @var ActiveRecord $model */
        $model = $this->owner;
        $this->setUpdatedAt($model);
        if(Yii::$app->id == 'app-backend'){
            $this->setUpdatedBy($model);
            $this->setUpdatedByMember($model,null);
        }else{
            $this->setUpdatedByMember($model);
            $this->setUpdatedBy($model,null);
        }

        //$this->setIpAddress($model);
        //$this->setUserAgent($model);


    }
    public function beforeInsert($event)
    {
        /** @var ActiveRecord $model */
        $model = $this->owner;
        $this->setCreatedAt($model);
        //Make updatedAtAttribute value = Now() because for some cases we need this value to sync the data Ex. ICD10
        $this->setUpdatedAt($model);
        if(Yii::$app->id == 'app-backend'){
            $this->setCreatedBy($model);
            $this->setCreatedByMember($model,null);
        }else{
            $this->setCreatedByMember($model, empty($model->{$this->createdByMemberAttribute}) ? false : $model->{$this->createdByMemberAttribute} );
            $this->setCreatedBy($model,null);
        }
        $this->setIpAddress($model);
        $this->setUserAgent($model);

        $this->setPlatForm($model);
    }

    /**
     * @param $model ActiveRecord
     */
    private function  setCreatedAt($model){
        if( ! $model->hasAttribute($this->createdAtAttribute) ){
            return;
        }
        $model->{$this->createdAtAttribute} =  new Expression('NOW()');
    }
    /**
     * @param $model ActiveRecord
     */
    private function  setUpdatedAt($model){
        if( ! $model->hasAttribute($this->updatedAtAttribute) ){
            return;
        }
        $model->{$this->updatedAtAttribute} =  new Expression('NOW()');
    }

    /**
     * @param $model ActiveRecord
     * @param mixed $value
     */
    private function  setCreatedBy($model,$value = false){
        if( ! $model->hasAttribute($this->createdByAttribute) || empty(Yii::$app->user) || Yii::$app->user->isGuest){
            return;
        }
        if($value !== false){
            if(empty($model->{$this->createdByAttribute})) {
                $model->{$this->createdByAttribute} = $value;
            }
        }else{
            $model->{$this->createdByAttribute} =  Yii::$app->user->id;
        }

    }

    /**
     * @param $model ActiveRecord
     * @param mixed $value
     */
    private function  setCreatedByMember($model,$value = false){
        if( ! $model->hasAttribute($this->createdByMemberAttribute) || empty(Yii::$app->user) ||  Yii::$app->user->isGuest){
            return;
        }
        if($value !== false){
            if(empty($model->{$this->createdByMemberAttribute})) {
                $model->{$this->createdByMemberAttribute} = $value;
            }
        }else{
            $model->{$this->createdByMemberAttribute} =  Yii::$app->user->id;
        }

    }

    /**
     * @param $model ActiveRecord
     * @param mixed $value
     */
    private function  setUpdatedBy($model,$value = false){
        if( ! $model->hasAttribute($this->updatedByAttribute) || empty(Yii::$app->user) ||  Yii::$app->user->isGuest){
            return;
        }

        if($value !== false){
            $model->{$this->updatedByAttribute} =  $value;
        }else{
            $model->{$this->updatedByAttribute} =  Yii::$app->user->id;
        }
    }

    /**
     * @param $model ActiveRecord
     * @param mixed $value
     */
    private function  setUpdatedByMember($model,$value = false){
        if( ! $model->hasAttribute($this->updatedByMemberAttribute) || empty(Yii::$app->user) ||  Yii::$app->user->isGuest){
            return;
        }
        if($value !== false){
            $model->{$this->updatedByMemberAttribute} =  $value;
        }else{
            $model->{$this->updatedByMemberAttribute} =  Yii::$app->user->id;
        }
    }


    /**
     * @param $model ActiveRecord
     * @param mixed $value
     */
    private function setIpAddress($model){
        if( ! $model->hasAttribute('ip_address') ){
            return;
        }
        if(!empty(Yii::$app->request) && !empty(Yii::$app->request->userIP)){
            $model->ip_address = Yii::$app->request->userIP;
        }
    }


    /**
     * @TODO remove it as fast as we can only work around !!! to fix empty platform
     * @param $model ActiveRecord
     */
    private function setPlatForm($model){
        if( ! $model->hasAttribute($this->platformIdAttribute) ){
            return;
        }
        if(empty($model->{$this->platformIdAttribute}) && in_array(Yii::$app->id,['app-api','app-frontend'])) {
            try {
                $model->{$this->platformIdAttribute} = GetPlatformBehavior::getPlatform();
            }catch (\Exception $e){

            }
        }
    }

    /**
     * @param $model ActiveRecord
     * @param mixed $value
     */
    private function setUserAgent($model)
    {
        if (!$model->hasAttribute('user_agent')) {
            return;
        }
        if (!empty(Yii::$app->request->userAgent)) {
            $model->user_agent = Yii::$app->request->userAgent;
        }
    }

}