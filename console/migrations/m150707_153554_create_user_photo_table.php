<?php

use yii\db\Schema;
use yii\db\Migration;

class m150707_153554_create_user_photo_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        $this->createTable('{{%photo}}', 
            [
                'id' => Schema::TYPE_PK,
                'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                'title' => Schema::TYPE_STRING . '(200) NOT NULL',
                'description' => Schema::TYPE_TEXT. ' NULL',
                'created_at' => Schema::TYPE_DATETIME . ' NULL',
                'updated_at' => Schema::TYPE_DATETIME . ' NULL',
                'created_by' => Schema::TYPE_INTEGER . ' NULL',
                'updated_by' => Schema::TYPE_INTEGER . ' NULL',
            ], $tableOptions
        );
        $this->addForeignKey('photo_to_user', '{{%photo}}', 'user_id', '{{%user}}', 'id');
        
        //untuk sementara penambahan kolom baru biarlah ditempatkan dibawah, 
        //karena fitur untuk menyisipkan / after hanya untuk mysql
        //nanti sebelum release diperbaiki semua
        $this->addColumn('{{%profile}}', 'photo_id', Schema::TYPE_INTEGER . ' NULL');
    }

    public function down()
    {
        $this->dropTable('{{%photo}}');
        $this->dropColumn('{{%profile}}', 'photo_id');
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
