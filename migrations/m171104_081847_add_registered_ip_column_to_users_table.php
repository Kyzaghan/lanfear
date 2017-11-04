<?php

use yii\db\Migration;

/**
 * Handles adding registered_ip to table `users`.
 */
class m171104_081847_add_registered_ip_column_to_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {

        $this->addColumn('users', 'registered_ip', $this->string(50));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('users', 'registered_ip');
    }
}
