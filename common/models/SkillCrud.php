<?php

namespace common\models;

use yii\db\Expression;
use common\models\Skill;

class SkillCrud extends Skill
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
            'skill' => 'Skill',
            'rate' => 'Rate',
            'desc' => 'Desc',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
