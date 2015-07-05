<?php

namespace common\models;

use yii\db\Expression;
use common\models\Education;

class EducationCrud extends Education
{
    public function behaviors()
    {
         return [
            [
                'class' => 'yii\behaviors\TimestampBehavior',
                'value' => new Expression('NOW()'),
            ],
            'yii\behaviors\BlameableBehavior'
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
}
