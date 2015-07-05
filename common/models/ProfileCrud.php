<?php

namespace common\models;

use yii\db\Expression;
use common\models\Profile;

class ProfileCrud extends Profile
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
            'fullname' => 'Fullname',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'province' => 'Province',
            'city' => 'City',
            'district' => 'District',
            'subdistrict' => 'Subdistrict',
            'postcode' => 'Postcode',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By'
        ];
    }
}
