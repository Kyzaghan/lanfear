<?php

use yii\db\Migration;

/**
 * Class m171104_095616_add_column_gsm_to_users_table
 */
class m171104_095616_add_column_gsm_to_users_table extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $this->addColumn('users', 'gsm', $this->string(50));
    }

    public function down()
    {
        $this->dropColumn('users', 'gsm');
    }
}
