<?php

use yii\db\Schema;
use yii\db\Migration;

class m150703_235400_create_skill_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        $this->createTable('skill', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'skill' => Schema::TYPE_STRING . '(200) NOT NULL',
            'rate' => Schema::TYPE_SMALLINT. ' NOT NULL DEFAULT 0',
            'desc' => Schema::TYPE_TEXT. ' NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NULL',
            'created_by' => Schema::TYPE_INTEGER . ' NULL',
            'updated_by' => Schema::TYPE_INTEGER . ' NULL',
                ], $tableOptions
        );
        $this->addForeignKey('skill_to_user', 'skill', 'user_id', '{{%user}}', 'id');
    }

    public function down()
    {
        $this->dropTable('skill');
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
