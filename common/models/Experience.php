<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "experience".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $company_name
 * @property string $position
 * @property string $start_date
 * @property string $end_date
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property User $user
 */
class Experience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'experience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'company_name', 'position'], 'required'],
            [['user_id', 'created_by', 'updated_by'], 'integer'],
            [['position', 'start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['description'], 'string'],
            [['company_name'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'company_name' => 'Company Name',
            'position' => 'Position',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
