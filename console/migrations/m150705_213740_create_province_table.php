<?php

use yii\db\Schema;
use yii\db\Migration;

class m150705_213740_create_province_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        $this->createTable(
            'ref_province', 
            [
                'id' => Schema::TYPE_PK,
                'name' => Schema::TYPE_STRING . '(200) NOT NULL',
                'description' => Schema::TYPE_TEXT. ' NULL',
                'created_at' => Schema::TYPE_DATETIME . ' NULL',
                'updated_at' => Schema::TYPE_DATETIME . ' NULL',
                'created_by' => Schema::TYPE_INTEGER . ' NULL',
                'updated_by' => Schema::TYPE_INTEGER . ' NULL',
            ], $tableOptions
        );

        $this->insert('ref_province', ['id'=>11,'name'=>'Aceh']);
        $this->insert('ref_province', ['id'=>12,'name'=>'Sumatera Utara']);
        $this->insert('ref_province', ['id'=>13,'name'=>'Sumatera Barat']);
        $this->insert('ref_province', ['id'=>14,'name'=>'Riau']);
        $this->insert('ref_province', ['id'=>15,'name'=>'Jambi']);
        $this->insert('ref_province', ['id'=>16,'name'=>'Sumatera Selatan']);
        $this->insert('ref_province', ['id'=>17,'name'=>'Bengkulu']);
        $this->insert('ref_province', ['id'=>18,'name'=>'Lampung']);
        $this->insert('ref_province', ['id'=>19,'name'=>'Kepulauan Bangka Belitung']);
        $this->insert('ref_province', ['id'=>21,'name'=>'Kepulauan Riau']);
        $this->insert('ref_province', ['id'=>31,'name'=>'Dki Jakarta']);
        $this->insert('ref_province', ['id'=>32,'name'=>'Jawa Barat']);
        $this->insert('ref_province', ['id'=>33,'name'=>'Jawa Tengah']);
        $this->insert('ref_province', ['id'=>34,'name'=>'Di Yogyakarta']);
        $this->insert('ref_province', ['id'=>35,'name'=>'Jawa Timur']);
        $this->insert('ref_province', ['id'=>36,'name'=>'Banten']);
        $this->insert('ref_province', ['id'=>51,'name'=>'Bali']);
        $this->insert('ref_province', ['id'=>52,'name'=>'Nusa Tenggara Barat']);
        $this->insert('ref_province', ['id'=>53,'name'=>'Nusa Tenggara Timur']);
        $this->insert('ref_province', ['id'=>61,'name'=>'Kalimantan Barat']);
        $this->insert('ref_province', ['id'=>62,'name'=>'Kalimantan Tengah']);
        $this->insert('ref_province', ['id'=>63,'name'=>'Kalimantan Selatan']);
        $this->insert('ref_province', ['id'=>64,'name'=>'Kalimantan Timur']);
        $this->insert('ref_province', ['id'=>65,'name'=>'Kalimantan Utara']);
        $this->insert('ref_province', ['id'=>71,'name'=>'Sulawesi Utara']);
        $this->insert('ref_province', ['id'=>72,'name'=>'Sulawesi Tengah']);
        $this->insert('ref_province', ['id'=>73,'name'=>'Sulawesi Selatan']);
        $this->insert('ref_province', ['id'=>74,'name'=>'Sulawesi Tenggara']);
        $this->insert('ref_province', ['id'=>75,'name'=>'Gorontalo']);
        $this->insert('ref_province', ['id'=>76,'name'=>'Sulawesi Barat']);
        $this->insert('ref_province', ['id'=>81,'name'=>'Maluku']);
        $this->insert('ref_province', ['id'=>82,'name'=>'Maluku Utara']);
        $this->insert('ref_province', ['id'=>91,'name'=>'Papua Barat']);
        $this->insert('ref_province', ['id'=>94,'name'=>'Papua']);
    }

    public function down()
    {
        $this->dropTable('ref');
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
