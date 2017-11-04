<?php

namespace app\models\database;

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
 * @property integer $fame
 * @property integer $karma
 * @property string $title
 * @property double $Alchemy
 * @property double $Anatomy
 * @property double $AnimalLore
 * @property double $ItemID
 * @property double $ArmsLore
 * @property double $Parrying
 * @property double $Begging
 * @property double $Blacksmithing
 * @property double $Bowcraft
 * @property double $Peacemaking
 * @property double $Camping
 * @property double $Carpentry
 * @property double $Cartography
 * @property double $Cooking
 * @property double $DetectingHidden
 * @property double $Enticement
 * @property double $EvaluatingIntel
 * @property double $Healing
 * @property double $Fishing
 * @property double $Forensics
 * @property double $Herding
 * @property double $Hiding
 * @property double $Provocation
 * @property double $Inscription
 * @property double $Lockpicking
 * @property double $Magery
 * @property double $MagicResistance
 * @property double $Tactics
 * @property double $Snooping
 * @property double $Musicianship
 * @property double $Poisoning
 * @property double $Archery
 * @property double $SpiritSpeak
 * @property double $Stealing
 * @property double $Tailoring
 * @property double $Taming
 * @property double $TasteID
 * @property double $Tinkering
 * @property double $Tracking
 * @property double $Veterinary
 * @property double $Swordsmanship
 * @property double $Macefighting
 * @property double $Fencing
 * @property double $Wrestling
 * @property double $Lumberjacking
 * @property double $Mining
 * @property double $Meditation
 * @property double $Stealth
 * @property double $RemoveTrap
 * @property double $Necromancy
 * @property double $Focus
 * @property double $Chivalry
 * @property double $Bushido
 * @property double $Ninjitsu
 * @property double $Spellweaving
 * @property double $Mysticism
 * @property double $Imbuing
 * @property double $Throwing
 * @property integer $gold
 * @property boolean $is_online
 * @property double $Discordance
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
            [['create', 'ostr', 'oint', 'odex', 'ofood', 'hits', 'stam', 'mana', 'food', 'fame', 'karma', 'Alchemy', 'Anatomy', 'AnimalLore', 'ItemID', 'ArmsLore', 'Parrying', 'Begging', 'Blacksmithing', 'Bowcraft', 'Peacemaking', 'Camping', 'Carpentry', 'Cartography', 'Cooking', 'DetectingHidden', 'Enticement', 'EvaluatingIntel', 'Healing', 'Fishing', 'Forensics', 'Herding', 'Hiding', 'Provocation', 'Inscription', 'Lockpicking', 'Magery', 'MagicResistance', 'Tactics', 'Snooping', 'Musicianship', 'Poisoning', 'Archery', 'SpiritSpeak', 'Stealing', 'Tailoring', 'Taming', 'TasteID', 'Tinkering', 'Tracking', 'Veterinary', 'Swordsmanship', 'Macefighting', 'Fencing', 'Wrestling', 'Lumberjacking', 'Mining', 'Meditation', 'Stealth', 'RemoveTrap', 'Necromancy', 'Focus', 'Chivalry', 'Bushido', 'Ninjitsu', 'Spellweaving', 'Mysticism', 'Imbuing', 'Throwing', 'gold', 'Discordance'], 'integer'],
            [['serial', 'resphysical'], 'string', 'max' => 50],
            [['name', 'title'], 'string', 'max' => 100],
            [['color', 'speechcolor'], 'string', 'max' => 10],
            [['events'], 'string', 'max' => 800],
            [['account'], 'string', 'max' => 35],
            [['p', 'oskin', 'home'], 'string', 'max' => 20],
            [['flags'], 'string', 'max' => 500],
            [['dam'], 'string', 'max' => 15],
            [['serial'], 'unique'],
            [['is_online'], 'boolean'],
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
            'account' => 'Hesap',
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
            'Anatomy' => 'Anatomy',
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
            'gold' => 'Gold',
            'is_online' => 'Oyunda mı?'
        ];
    }
}
