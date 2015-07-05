<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use common\models\Profile;
use yii\db\Query;

class ProfileCrud extends Profile
{
    public function behaviors()
    {
         return [
            'common\component\behaviors\AutoTimestamp',
            'common\component\behaviors\AutoUser',
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
