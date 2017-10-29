<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users_login`.
 */
class m171029_171545_create_userslogin_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users_login', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'login_time' => $this->timestamp()->notNull(),
            'user_agent' => $this->string(150),
            'ip'=> $this->string(50)
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-post-user_id',
            'users_login',
            'user_id'
        );


        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-users_login-user_id',
            'users_login',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `users`
        $this->dropForeignKey(
            'fk-users_login-user_id',
            'post'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-users_login-user_id',
            'post'
        );

        $this->dropTable('userslogin');
    }
}
