<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%complaint}}".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $status
 * @property string|null $date_added
 */
class Complaint extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%complaint}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id' , 'title','body'], 'required'],
            [['user_id'], 'integer'],
            [['description', 'status'], 'string'],
            [['date_added'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',
            'date_added' => 'Date Added',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ComplaintQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ComplaintQuery(get_called_class());
    }
}
