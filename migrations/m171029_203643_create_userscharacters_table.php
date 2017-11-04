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
            'dam' => $this->string(15),
            'home' => $this->string(20),
            'ostr' => $this->integer(),
            'oint' => $this->integer(),
            'odex' => $this->integer(),
            'ofood' => $this->integer(),
            'hits' => $this->integer(),
            'stam' => $this->integer(),
            'mana' => $this->integer(),
            'food' => $this->integer(),
            'fame' => $this->integer(),
            'karma' => $this->integer(),
            'title' => $this->string(100),
            'Alchemy' => $this->double(),
            'Anatomy' => $this->double(),
            'AnimalLore' => $this->double(),
            'ItemID' => $this->double(),
            'ArmsLore' => $this->double(),
            'Parrying' => $this->double(),
            'Begging' => $this->double(),
            'Blacksmithing' => $this->double(),
            'Bowcraft' => $this->double(),
            'Peacemaking' => $this->double(),
            'Camping' => $this->double(),
            'Carpentry' => $this->double(),
            'Cartography' => $this->double(),
            'Cooking' => $this->double(),
            'DetectingHidden' => $this->double(),
            'Enticement' => $this->double(),
            'EvaluatingIntel' => $this->double(),
            'Healing' => $this->double(),
            'Fishing' => $this->double(),
            'Forensics' => $this->double(),
            'Herding' => $this->double(),
            'Hiding' => $this->double(),
            'Provocation' => $this->double(),
            'Inscription' => $this->double(),
            'Lockpicking' => $this->double(),
            'Magery' => $this->double(),
            'MagicResistance' => $this->double(),
            'Tactics' => $this->double(),
            'Snooping' => $this->double(),
            'Musicianship' => $this->double(),
            'Poisoning' => $this->double(),
            'Archery' => $this->double(),
            'SpiritSpeak' => $this->double(),
            'Stealing' => $this->double(),
            'Tailoring' => $this->double(),
            'Taming' => $this->double(),
            'TasteID' => $this->double(),
            'Tinkering' => $this->double(),
            'Tracking' => $this->double(),
            'Veterinary' => $this->double(),
            'Swordsmanship' => $this->double(),
            'Macefighting' => $this->double(),
            'Fencing' => $this->double(),
            'Wrestling' => $this->double(),
            'Lumberjacking' => $this->double(),
            'Mining' => $this->double(),
            'Meditation' => $this->double(),
            'Stealth' => $this->double(),
            'RemoveTrap' => $this->double(),
            'Necromancy' => $this->double(),
            'Focus' => $this->double(),
            'Chivalry' => $this->double(),
            'Bushido' => $this->double(),
            'Ninjitsu' => $this->double(),
            'Spellweaving' => $this->double(),
            'Mysticism' => $this->double(),
            'Imbuing' => $this->double(),
            'Throwing' => $this->double(),
            'Discordance'=> $this->double(),
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
