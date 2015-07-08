<?php

use yii\db\Schema;
use yii\db\Migration;

class m150708_011507_change_position_type_experience extends Migration
{
    public function up()
    {
        $this->dropColumn('{{%experience}}', 'position');
        $this->addColumn('{{%experience}}', 'position', Schema::TYPE_STRING . '(200) NOT NULL');
    }

    public function down()
    {
        echo "m150708_011507_change_position_type_experience cannot be reverted.\n";

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
