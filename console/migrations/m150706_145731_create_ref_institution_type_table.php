<?php

use yii\db\Schema;
use yii\db\Migration;

class m150706_145731_create_ref_institution_type_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        $this->createTable(
            'ref_education_level', 
            [
                'id' => Schema::TYPE_PK,
                'level_name' => Schema::TYPE_STRING . '(200) NOT NULL',
                'description' => Schema::TYPE_TEXT. ' NULL',
                'created_at' => Schema::TYPE_DATETIME . ' NULL',
                'updated_at' => Schema::TYPE_DATETIME . ' NULL',
                'created_by' => Schema::TYPE_INTEGER . ' NULL',
                'updated_by' => Schema::TYPE_INTEGER . ' NULL',
            ], $tableOptions
        );
        $this->insert('ref_education_level', ['level_name'=>'SD','description'=>'Sekolah Dasar']);
        $this->insert('ref_education_level', ['level_name'=>'SLTP / Sederajat','description'=>'Sekolah Lanjutan Tingkat Pertama']);
        $this->insert('ref_education_level', ['level_name'=>'SLTA / Sederajat','description'=>'Sekolah Lanjutan Tingkat Atas']);
        $this->insert('ref_education_level', ['level_name'=>'Diploma / Perguruan Tinggi']);
    }

    public function down()
    {
        $this->dropTable('ref_education_level');
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
