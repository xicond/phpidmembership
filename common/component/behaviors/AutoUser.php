<?php

namespace common\component\behaviors;

use yii\db\ActiveRecord;

/**
 * Auto User automatically fills the specified attributes with the current user ID.
 *
 * @author Henry <alvin_vna@yahoo.com>
 */
class AutoUser extends \yii\behaviors\BlameableBehavior
{

    
    public $attributes = [
        ActiveRecord::EVENT_BEFORE_INSERT => ['created_by', 'updated_by'],
        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by'],
    ];

}
