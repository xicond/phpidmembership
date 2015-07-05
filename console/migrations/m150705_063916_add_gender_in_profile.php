<?php

use yii\db\Schema;
use yii\db\Migration;

class m150705_063916_add_gender_in_profile extends Migration
{
    public function up()
    {
        $rows = $this->db->createCommand("SELECT * FROM profile")->queryAll();
        $this->dropTable('profile');
        $tableOptions = null;
        $this->createTable('profile', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL UNIQUE',
            'fullname' => Schema::TYPE_STRING . '(150) NOT NULL',
            'gender' => Schema::TYPE_STRING . ' NOT NULL DEFAULT 0',
            /*
             * email di tabel ini pada prinsipnya sama dengan di tabel user
             * setelah user signup dan pada proses insert record tabel profile, email disamakan dengan di table user
             * ketika user update profile dan merubah email, setelah email diverifikasi, email di tabel user disamakan dengan email ini
             */
            'email' => Schema::TYPE_STRING . '(150) NOT NULL',      
            'phone' => Schema::TYPE_STRING . '(150) NULL',
            'address' => Schema::TYPE_STRING . '(250) NULL',
            'province' => Schema::TYPE_SMALLINT . ' NULL',
            'city' => Schema::TYPE_SMALLINT . ' NULL',
            'district' => Schema::TYPE_INTEGER . ' NULL',
            'subdistrict' => Schema::TYPE_INTEGER . ' NULL',
            'postcode' => Schema::TYPE_STRING . '(6) NULL',
            'created_at' => Schema::TYPE_DATETIME . ' NULL',
            'updated_at' => Schema::TYPE_DATETIME . ' NULL',
            'created_by' => Schema::TYPE_INTEGER . ' NULL',
            'updated_by' => Schema::TYPE_INTEGER . ' NULL',
                ], $tableOptions
        );
        $this->addForeignKey('profile_to_user', 'profile', 'user_id', '{{%user}}', 'id');
        
        if($rows && sizeof($rows)){
            foreach($rows as $row){
                $this->insert('profile',$row );
            }
        }
    }

    public function down()
    {
        echo "m150705_063916_add_gender_in_profile cannot be reverted.\n";

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
