<?php

namespace common\models;

use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use common\models\Portofolio;

class PortofolioCrud extends Portofolio
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
            'portofolio_name' => 'Portofolio Name',
            'screenshot' => 'Screenshot',
            'link_url' => 'Link Url',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
