<?php

use yii\db\Migration;

/**
 * Class m171104_161952_add_items_table
 */
class m171104_161952_add_items_table extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('items', [
            'serial' => $this->string(50),
            'base_id' => $this->string(32),
            'name' => $this->string(30),
            'color' => $this->string(32),
            'timer' => $this->integer(),
            'amount' => $this->integer(),
            'type' => $this->string(32),
            'more1' => $this->string(32),
            'more2' => $this->string(32),
            'attr' => $this->string(8),
            'weight' => $this->integer(),
            'layer' => $this->integer(),
            'instances' => $this->integer(),
            'armor' => $this->string(50),
            'value' => $this->integer(),
            'dye' => $this->integer(),
            'more_p' => $this->double(),
            'link' => $this->string(8),
            'disp_id' => $this->string(50),
            'cont' => $this->string(50)
        ]);
        $this->addPrimaryKey('items-serial_pk', 'items', ['serial']);
    }

    public function down()
    {
        echo "m171104_161952_add_items_table cannot be reverted.\n";

        return false;
    }
}
