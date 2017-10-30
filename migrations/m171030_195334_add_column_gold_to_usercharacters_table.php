<?php

use yii\db\Migration;

class m171030_195334_add_column_gold_to_usercharacters_table extends Migration
{


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $this->addColumn('users_characters', 'gold', $this->bigInteger());
    }

    public function down()
    {
        $this->dropColumn('users_characters', 'gold');
    }
}
