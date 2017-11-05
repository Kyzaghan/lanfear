<?php

use yii\db\Migration;

/**
 * Handles adding last_login to table `users_characters`.
 */
class m171105_151826_add_last_login_column_to_userscharacters_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('users_characters', 'last_login', $this->timestamp());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('users_characters', 'last_login');
    }
}
