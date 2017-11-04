<?php

use yii\db\Migration;

/**
 * Handles adding isonline to table `usercharactrs`.
 */
class m171104_074018_add_isonline_column_to_usercharactrs_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('users_characters', 'is_online', $this->boolean());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('users_characters', 'is_online');
    }
}
