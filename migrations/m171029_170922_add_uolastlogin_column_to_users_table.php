<?php

use yii\db\Migration;

/**
 * Handles adding uolastlogin to table `users`.
 */
class m171029_170922_add_uolastlogin_column_to_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('users', 'uo_last_login', $this->timestamp());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('users', 'uo_last_login');
    }
}
