<?php

use yii\db\Schema;
use yii\db\Migration;

class m150704_092024_create_portofolio_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        $this->createTable('portofolio', 
            [
                'id' => Schema::TYPE_PK,
                'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                'portofolio_name' => Schema::TYPE_STRING . '(250) NOT NULL',
                'screenshot' => Schema::TYPE_STRING. '(200) NULL',
                'link_url' => Schema::TYPE_STRING. '(250) NULL',
                'description' => Schema::TYPE_TEXT. ' NULL',
                'created_at' => Schema::TYPE_DATETIME . ' NULL',
                'updated_at' => Schema::TYPE_DATETIME . ' NULL',
                'created_by' => Schema::TYPE_INTEGER . ' NULL',
                'updated_by' => Schema::TYPE_INTEGER . ' NULL',
            ], $tableOptions
        );
        $this->addForeignKey('pfolio_to_user', 'portofolio', 'user_id', '{{%user}}', 'id');
    }

    public function down()
    {
        $this->dropTable('portofolio');
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
