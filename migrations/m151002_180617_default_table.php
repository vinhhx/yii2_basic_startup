<?php

use yii\db\Migration;
use yii\db\Schema;

class m151002_180617_default_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB AUTO_INCREMENT 1000000';
        }
        //Bảng tài khoản hệ thống
        $this->createTable('{{%sys_user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . '(50) NOT NULL',
            'phone' => Schema::TYPE_STRING . '(11) NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 1',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'UNIQUE KEY `username` (username)',
        ], $tableOptions);
        //B?ng langugage h? th�ng
        $this->createTable('{{%sys_language}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'language' => Schema::TYPE_STRING." NOT NULL UNIQUE",
            'icon' => Schema::TYPE_STRING,
            'status' => Schema::TYPE_SMALLINT . "(2) NOT NULL DEFAULT 1",
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $tableOptions);
    }

    public function down()
    {
        echo "m151002_180617_default_table cannot be reverted.\n";

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
