<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users_characters".
 *
 * @property string $serial
 * @property integer $create
 * @property string $name
 * @property string $color
 * @property string $resphysical
 * @property string $events
 * @property string $account
 * @property string $p
 * @property string $speechcolor
 * @property string $oskin
 * @property string $flags
 * @property string $dam
 * @property string $home
 * @property integer $ostr
 * @property integer $oint
 * @property integer $odex
 * @property integer $ofood
 * @property integer $hits
 * @property integer $stam
 * @property integer $mana
 * @property integer $food
 * @property integer $anatomy
 * @property integer $AnimalLore
 * @property integer $ItemID
 * @property integer $ArmsLore
 * @property integer $Parrying
 * @property integer $Begging
 * @property integer $Blacksmithing
 * @property integer $Bowcraft
 * @property integer $Peacemaking
 * @property integer $Camping
 * @property integer $Carpentry
 * @property integer $Cartography
 * @property integer $Cooking
 * @property integer $DetectingHidden
 * @property integer $Enticement
 * @property integer $EvaluatingIntel
 * @property integer $Healing
 * @property integer $Fishing
 * @property integer $Forensics
 * @property integer $Herding
 * @property integer $Hiding
 * @property integer $Provocation
 * @property integer $Inscription
 * @property integer $Lockpicking
 * @property integer $Magery
 * @property integer $MagicResistance
 * @property integer $Tactics
 * @property integer $Snooping
 * @property integer $Musicianship
 * @property integer $Poisoning
 * @property integer $Archery
 * @property integer $SpiritSpeak
 * @property integer $Stealing
 * @property integer $Tailoring
 * @property integer $Taming
 * @property integer $TasteID
 * @property integer $Tinkering
 * @property integer $Tracking
 * @property integer $Veterinary
 * @property integer $Swordsmanship
 * @property integer $Macefighting
 * @property integer $Fencing
 * @property integer $Wrestling
 * @property integer $Lumberjacking
 * @property integer $Mining
 * @property integer $Meditation
 * @property integer $Stealth
 * @property integer $RemoveTrap
 * @property integer $Necromancy
 * @property integer $Focus
 * @property integer $Chivalry
 * @property integer $Bushido
 * @property integer $Ninjitsu
 * @property integer $Spellweaving
 * @property integer $Mysticism
 * @property integer $Imbuing
 * @property integer $Throwing
 */
class UsersCharacters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users_characters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial', 'create', 'name', 'color', 'account'], 'required'],
            [['create', 'ostr', 'oint', 'odex', 'ofood', 'hits', 'stam', 'mana', 'food', 'anatomy', 'AnimalLore', 'ItemID', 'ArmsLore', 'Parrying', 'Begging', 'Blacksmithing', 'Bowcraft', 'Peacemaking', 'Camping', 'Carpentry', 'Cartography', 'Cooking', 'DetectingHidden', 'Enticement', 'EvaluatingIntel', 'Healing', 'Fishing', 'Forensics', 'Herding', 'Hiding', 'Provocation', 'Inscription', 'Lockpicking', 'Magery', 'MagicResistance', 'Tactics', 'Snooping', 'Musicianship', 'Poisoning', 'Archery', 'SpiritSpeak', 'Stealing', 'Tailoring', 'Taming', 'TasteID', 'Tinkering', 'Tracking', 'Veterinary', 'Swordsmanship', 'Macefighting', 'Fencing', 'Wrestling', 'Lumberjacking', 'Mining', 'Meditation', 'Stealth', 'RemoveTrap', 'Necromancy', 'Focus', 'Chivalry', 'Bushido', 'Ninjitsu', 'Spellweaving', 'Mysticism', 'Imbuing', 'Throwing'], 'integer'],
            [['serial', 'resphysical'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 100],
            [['color', 'speechcolor'], 'string', 'max' => 10],
            [['events'], 'string', 'max' => 800],
            [['account'], 'string', 'max' => 35],
            [['p', 'oskin', 'home'], 'string', 'max' => 20],
            [['flags'], 'string', 'max' => 500],
            [['dam'], 'string', 'max' => 15],
            [['serial'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'serial' => 'Serial',
            'create' => 'Create',
            'name' => 'Karakter Adı',
            'color' => 'Color',
            'resphysical' => 'Resphysical',
            'events' => 'Events',
            'account' => 'Account',
            'p' => 'P',
            'speechcolor' => 'Speechcolor',
            'oskin' => 'Oskin',
            'flags' => 'Flags',
            'dam' => 'Damage',
            'home' => 'Home',
            'ostr' => 'STR',
            'oint' => 'INT',
            'odex' => 'DEX',
            'ofood' => 'Ofood',
            'hits' => 'HITS',
            'stam' => 'STAM',
            'mana' => 'MANA',
            'food' => 'Food',
            'anatomy' => 'Anatomy',
            'AnimalLore' => 'Animal Lore',
            'ItemID' => 'Item ID',
            'ArmsLore' => 'Arms Lore',
            'Parrying' => 'Parrying',
            'Begging' => 'Begging',
            'Blacksmithing' => 'Blacksmithing',
            'Bowcraft' => 'Bowcraft',
            'Peacemaking' => 'Peacemaking',
            'Camping' => 'Camping',
            'Carpentry' => 'Carpentry',
            'Cartography' => 'Cartography',
            'Cooking' => 'Cooking',
            'DetectingHidden' => 'Detecting Hidden',
            'Enticement' => 'Enticement',
            'EvaluatingIntel' => 'Evaluating Intel',
            'Healing' => 'Healing',
            'Fishing' => 'Fishing',
            'Forensics' => 'Forensics',
            'Herding' => 'Herding',
            'Hiding' => 'Hiding',
            'Provocation' => 'Provocation',
            'Inscription' => 'Inscription',
            'Lockpicking' => 'Lockpicking',
            'Magery' => 'Magery',
            'MagicResistance' => 'Magic Resistance',
            'Tactics' => 'Tactics',
            'Snooping' => 'Snooping',
            'Musicianship' => 'Musicianship',
            'Poisoning' => 'Poisoning',
            'Archery' => 'Archery',
            'SpiritSpeak' => 'Spirit Speak',
            'Stealing' => 'Stealing',
            'Tailoring' => 'Tailoring',
            'Taming' => 'Taming',
            'TasteID' => 'Taste ID',
            'Tinkering' => 'Tinkering',
            'Tracking' => 'Tracking',
            'Veterinary' => 'Veterinary',
            'Swordsmanship' => 'Swordsmanship',
            'Macefighting' => 'Macefighting',
            'Fencing' => 'Fencing',
            'Wrestling' => 'Wrestling',
            'Lumberjacking' => 'Lumberjacking',
            'Mining' => 'Mining',
            'Meditation' => 'Meditation',
            'Stealth' => 'Stealth',
            'RemoveTrap' => 'Remove Trap',
            'Necromancy' => 'Necromancy',
            'Focus' => 'Focus',
            'Chivalry' => 'Chivalry',
            'Bushido' => 'Bushido',
            'Ninjitsu' => 'Ninjitsu',
            'Spellweaving' => 'Spellweaving',
            'Mysticism' => 'Mysticism',
            'Imbuing' => 'Imbuing',
            'Throwing' => 'Throwing',
        ];
    }
}
