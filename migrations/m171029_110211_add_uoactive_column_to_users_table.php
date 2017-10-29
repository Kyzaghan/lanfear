<?php

use yii\db\Migration;

/**
 * Handles adding uoactive to table `users`.
 */
class m171029_110211_add_uoactive_column_to_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('users', 'uo_active', $this->boolean());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('users', 'uo_active');
    }
}
