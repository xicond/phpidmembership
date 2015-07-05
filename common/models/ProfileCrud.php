<?php

namespace common\models;

use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use common\models\Profile;

class ProfileCrud extends Profile
{
    public function behaviors()
    {
         return [
            [
                'class' => TimestampBehavior::className(),
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
            'fullname' => 'Nama Lengkap',
            'gender' => 'Jenis Kelamin',
            'email' => 'Email',
            'phone' => 'Telepon',
            'address' => 'Alamat',
            'province' => 'Propinsi',
            'city' => 'Kota',
            'district' => 'Kelurahan',
            'subdistrict' => 'Kecamatan',
            'postcode' => 'Kode Pos',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By'
        ];
    }
}
