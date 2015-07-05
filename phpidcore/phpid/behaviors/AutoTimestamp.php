<?php

namespace phpid\behaviors;

use yii\db\Expression;
use yii\db\ActiveRecord;

/**
 * Behavior Timestamp for create_date,update_date.
 *
 * @author Henry <alvin_vna@yahoo.com>
 */
class AutoTimestamp extends \yii\behaviors\TimestampBehavior
{

    public $attributes = [
        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
    ];

    protected function getValue($event)
    {
        return new Expression('NOW()');
    }

}