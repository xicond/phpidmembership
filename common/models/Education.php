<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "education".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $institution_name
 * @property integer $institution_type
 * @property string $institution_location
 * @property string $from_date
 * @property string $to_date
 * @property integer $graduated_status
 * @property string $gpa
 * @property string $gpa_max
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property User $user
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'institution_name'], 'required'],
            [['user_id', 'institution_type', 'graduated_status', 'created_by', 'updated_by'], 'integer'],
            [['institution_location', 'description'], 'string'],
            [['from_date', 'to_date', 'created_at', 'updated_at'], 'safe'],
            [['gpa', 'gpa_max'], 'number'],
            [['institution_name'], 'string', 'max' => 250]
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
            'institution_name' => 'Institution Name',
            'institution_type' => 'Institution Type',
            'institution_location' => 'Institution Location',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'graduated_status' => 'Graduated Status',
            'gpa' => 'Gpa',
            'gpa_max' => 'Gpa Max',
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
    
    public static function getListGraduateStatus()
    {
    	return [
    			1 => 'Lulus',
    			2 => 'Belum Lulus',
    			3 => 'Drop Out'
    	];
    }
    
    public static function getGraduateStatusName($id)
    {
    	$data = self::getListGraduateStatus();
    	return $data[$id];
    }
}
