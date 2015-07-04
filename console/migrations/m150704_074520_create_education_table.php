<?php

use yii\db\Schema;
use yii\db\Migration;

class m150704_074520_create_education_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        $this->createTable('education', 
            [
                'id' => Schema::TYPE_PK,
                'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                'institution_name' => Schema::TYPE_STRING . '(250) NOT NULL',
                'institution_type' => Schema::TYPE_SMALLINT. ' NOT NULL DEFAULT 0',
                'institution_location' => Schema::TYPE_TEXT. ' NULL',
                'from_date' => Schema::TYPE_DATE. ' NULL',
                'to_date' => Schema::TYPE_DATE. ' NULL',
                'graduated_status' => Schema::TYPE_SMALLINT. ' NOT NULL DEFAULT 0',
                'gpa' => Schema::TYPE_DECIMAL. '(4,2) NULL DEFAULT 0',
                'gpa_max' => Schema::TYPE_DECIMAL. '(4,2) NULL DEFAULT 0',
                'description' => Schema::TYPE_TEXT. ' NULL',
                'created_at' => Schema::TYPE_DATETIME . ' NULL',
                'updated_at' => Schema::TYPE_DATETIME . ' NULL',
                'created_by' => Schema::TYPE_INTEGER . ' NULL',
                'updated_by' => Schema::TYPE_INTEGER . ' NULL',
            ], $tableOptions
        );
        $this->addForeignKey('edu_to_user', 'education', 'user_id', '{{%user}}', 'id');
    }

    public function down()
    {
        $this->dropTable('education');
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
