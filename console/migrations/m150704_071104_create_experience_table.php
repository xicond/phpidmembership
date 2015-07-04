<?php

use yii\db\Schema;
use yii\db\Migration;

class m150704_071104_create_experience_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        $this->createTable('experience', 
            [
                'id' => Schema::TYPE_PK,
                'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                'company_name' => Schema::TYPE_STRING . '(250) NOT NULL',
                'position' => Schema::TYPE_DATE. ' NOT NULL',
                'start_date' => Schema::TYPE_DATE. ' NULL',
                'end_date' => Schema::TYPE_DATE. ' NULL',
                'description' => Schema::TYPE_TEXT. ' NULL',
                'created_at' => Schema::TYPE_DATETIME . ' NULL',
                'updated_at' => Schema::TYPE_DATETIME . ' NULL',
                'created_by' => Schema::TYPE_INTEGER . ' NULL',
                'updated_by' => Schema::TYPE_INTEGER . ' NULL',
            ], $tableOptions
        );
        $this->addForeignKey('exp_to_user', 'experience', 'user_id', '{{%user}}', 'id');
    }

    public function down()
    {
        $this->dropTable('experience');
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
