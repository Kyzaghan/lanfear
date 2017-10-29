<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users_characters`.
 */
class m171029_203643_create_userscharacters_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users_characters', [
            'serial' => $this->string(50),
            'create' => $this->integer()->notNull(),
            'name' => $this->string(100)->notNull(),
            'color' => $this->string(10)->notNull(),
            'resphysical' => $this->string(50),
            'events' => $this->string(800),
            'account' => $this->string(35)->notNull(),
            'p' => $this->string(20),
            'speechcolor' => $this->string(10),
            'oskin' => $this->string(20),
            'flags' => $this->string(500),
            'dam' => $this->double(2),
            'home' => $this->string(20),
            'ostr' => $this->integer(),
            'oint' => $this->integer(),
            'odex' => $this->integer(),
            'ofood' => $this->integer(),
            'hits' => $this->integer(),
            'stam' => $this->integer(),
            'mana' => $this->integer(),
            'food' => $this->integer(),
            'anatomy' => $this->integer(),
            'AnimalLore' => $this->integer(),
            'ItemID' => $this->integer(),
            'ArmsLore' => $this->integer(),
            'Parrying' => $this->integer(),
            'Begging' => $this->integer(),
            'Blacksmithing' => $this->integer(),
            'Bowcraft' => $this->integer(),
            'Peacemaking' => $this->integer(),
            'Camping' => $this->integer(),
            'Carpentry' => $this->integer(),
            'Cartography' => $this->integer(),
            'Cooking' => $this->integer(),
            'DetectingHidden' => $this->integer(),
            'Enticement' => $this->integer(),
            'EvaluatingIntel' => $this->integer(),
            'Healing' => $this->integer(),
            'Fishing' => $this->integer(),
            'Forensics' => $this->integer(),
            'Herding' => $this->integer(),
            'Hiding' => $this->integer(),
            'Provocation' => $this->integer(),
            'Inscription' => $this->integer(),
            'Lockpicking' => $this->integer(),
            'Magery' => $this->integer(),
            'MagicResistance' => $this->integer(),
            'Tactics' => $this->integer(),
            'Snooping' => $this->integer(),
            'Musicianship' => $this->integer(),
            'Poisoning' => $this->integer(),
            'Archery' => $this->integer(),
            'SpiritSpeak' => $this->integer(),
            'Stealing' => $this->integer(),
            'Tailoring' => $this->integer(),
            'Taming' => $this->integer(),
            'TasteID' => $this->integer(),
            'Tinkering' => $this->integer(),
            'Tracking' => $this->integer(),
            'Veterinary' => $this->integer(),
            'Swordsmanship' => $this->integer(),
            'Macefighting' => $this->integer(),
            'Fencing' => $this->integer(),
            'Wrestling' => $this->integer(),
            'Lumberjacking' => $this->integer(),
            'Mining' => $this->integer(),
            'Meditation' => $this->integer(),
            'Stealth' => $this->integer(),
            'RemoveTrap' => $this->integer(),
            'Necromancy' => $this->integer(),
            'Focus' => $this->integer(),
            'Chivalry' => $this->integer(),
            'Bushido' => $this->integer(),
            'Ninjitsu' => $this->integer(),
            'Spellweaving' => $this->integer(),
            'Mysticism' => $this->integer(),
            'Imbuing' => $this->integer(),
            'Throwing' => $this->integer()
        ]);
        $this->addPrimaryKey('userscharacters-serial_pk', 'users_characters', ['serial']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('userscharacters');
    }
}
