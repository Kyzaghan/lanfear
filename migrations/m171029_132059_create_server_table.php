<?php

use yii\db\Migration;

/**
 * Handles the creation of table `server`.
 */
class m171029_132059_create_server_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('server', [
            'id' => $this->primaryKey(),
            'capacity' => $this->integer()->notNull(),
            'currentOnline' => $this->integer()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('server');
    }
}
