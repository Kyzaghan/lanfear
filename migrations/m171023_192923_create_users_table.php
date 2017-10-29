<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m171023_192923_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users', [
                'id'=> $this->primaryKey(),
                'username'=> $this->string()->notNull()->unique(),
                'password'=> $this->string()->notNull(),
                'email'=>$this->string()->notNull(),
                'is_active' => $this->boolean()->notNull()->defaultValue(false),
                'register_date' => $this->timestamp()->notNull(),
                'last_login' => $this->timestamp(),
                'auth_key' => $this->string(32),
                'access_token' => $this->string(32),
                'rememberMe' => $this->boolean(),
                'tcno' => $this->string(11)

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
