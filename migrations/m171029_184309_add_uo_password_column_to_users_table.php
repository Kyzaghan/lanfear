<?php

use yii\db\Migration;

/**
 * Handles adding uo_password to table `users`.
 */
class m171029_184309_add_uo_password_column_to_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('users', 'uo_password', $this->string(25));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('users', 'uo_password');
    }
}
