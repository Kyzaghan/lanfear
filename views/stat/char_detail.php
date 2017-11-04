<?php
/* @var $this yii\web\View */

use kartik\icons\Icon;

$this->title = 'Karakter Detayı';
$this->params['breadcrumbs'][] = $this->title;
?>

<ul class="list-group" style="margin-bottom:0px; !important;">
    <h3>Character</h3>
    <div class="row">
        <div class="col-xs-12, col-sm-4, col-lg-3">
            <li class="list-group-item charDetailListPadding">
                Karakter Adı : <div class="pull-right"><?php echo $model->name; ?></div>
            </li>
            <li class="list-group-item charDetailListPadding">
                Str : <div class="pull-right"><?php echo $model->ostr; ?></div>
            </li>
            <li class="list-group-item charDetailListPadding">
                Dex : <div class="pull-right"><?php echo $model->odex; ?></div>
            </li>
            <li class="list-group-item charDetailListPadding">
                Int : <div class="pull-right"><?php echo $model->oint; ?></div>
            </li>
        </div>
        <div class="col-xs-12, col-sm-4, col-lg-3">
            <li class="list-group-item charDetailListPadding">
                Damage : <div class="pull-right"><?php echo $model->dam; ?></div>
            </li>
            <li class="list-group-item charDetailListPadding">
                Hits : <div class="pull-right"><?php echo $model->hits; ?></div>
            </li>
            <li class="list-group-item charDetailListPadding">
                Stam : <div class="pull-right"><?php echo $model->stam; ?></div>
            </li>
            <li class="list-group-item charDetailListPadding">
                Mana : <div class="pull-right"><?php echo $model->mana; ?></div>
            </li>
        </div>

        <div class="col-xs-12, col-sm-4, col-lg-3">

            <li class="list-group-item charDetailListPadding">
                Gold : <div class="pull-right"><?php echo $model->gold; ?></div>
            </li>
            <li class="list-group-item charDetailListPadding">
                Food : <div class="pull-right"><?php echo $model->food; ?></div>
            </li>
            <li class="list-group-item charDetailListPadding">
                Oyunda mı? : <div class="pull-right"><b style="color:<?php echo $model->is_online ? "green" : "red"; ?>;"><?php echo $model->is_online ? Icon::show('check', ['class'=>'fa-2x', 'style'=> 'text-align:right;margin-right:0px;']) : Icon::show('times', ['class'=>'fa-2x', 'style'=> 'text-align:right;margin-right:0px;']); ?></b></div>
            </li>
        </div>

        <div class="col-xs-12, col-sm-4, col-lg-3">
            <li class="list-group-item charDetailListPadding">
                Title : <div class="pull-right"><?php echo $model->title; ?></div>
            </li>
            <li class="list-group-item charDetailListPadding">
                Fame : <div class="pull-right"><?php echo $model->fame; ?></div>
            </li>
            <li class="list-group-item charDetailListPadding">
                Karma : <div class="pull-right"><?php echo $model->karma; ?></div>
            </li>
        </div>
    </div>
    <h3>Skills</h3>
    <div class="row">
        <div class="col-xs-12, col-sm-4, col-lg-3">
            <li class="list-group-item charDetailListPadding">Alchemy <div class="pull-right"><?php echo $model->Alchemy; ?></div></li>
            <li class="list-group-item charDetailListPadding">Anatomy <div class="pull-right"><?php echo $model->Anatomy; ?></div></li>
            <li class="list-group-item charDetailListPadding">Animal Lore <div class="pull-right"><?php echo $model->AnimalLore; ?></div></li>
            <li class="list-group-item charDetailListPadding">Animal Taming <div class="pull-right"><?php echo $model->Taming; ?></div></li>
            <li class="list-group-item charDetailListPadding">Archery <div class="pull-right"><?php echo $model->Archery; ?></div></li>
            <li class="list-group-item charDetailListPadding">Arms Lore <div class="pull-right"><?php echo $model->ArmsLore; ?></div></li>
            <li class="list-group-item charDetailListPadding">Begging <div class="pull-right"><?php echo $model->Begging; ?></div></li>
            <li class="list-group-item charDetailListPadding">Blacksmithy <div class="pull-right"><?php echo $model->Blacksmithing; ?></div></li>
            <li class="list-group-item charDetailListPadding">Bowcraft <div class="pull-right"><?php echo $model->Bowcraft; ?></div></li>
            <li class="list-group-item charDetailListPadding">Camping <div class="pull-right"><?php echo $model->Camping; ?></div></li>
            <li class="list-group-item charDetailListPadding">Carpentry <div class="pull-right"><?php echo $model->Carpentry; ?></div></li>
            <li class="list-group-item charDetailListPadding">Cartography <div class="pull-right"><?php echo $model->Cartography; ?></div></li>
            <li class="list-group-item charDetailListPadding">Cooking <div class="pull-right"><?php echo $model->Cooking; ?></div></li>
            <li class="list-group-item charDetailListPadding">Detecting Hidden <div class="pull-right"><?php echo $model->DetectingHidden; ?></div></li>
        </div>

        <div class="col-xs-12, col-sm-4, col-lg-3">
            <li class="list-group-item charDetailListPadding">Discordance <div class="pull-right"><?php echo $model->Discordance; ?></div></li>
            <li class="list-group-item charDetailListPadding">Evaluating Intelligence <div class="pull-right"><?php echo $model->EvaluatingIntel; ?></div></li>
            <li class="list-group-item charDetailListPadding">Fencing <div class="pull-right"><?php echo $model->Fencing; ?></div></li>
            <li class="list-group-item charDetailListPadding">Fishing <div class="pull-right"><?php echo $model->Fishing; ?></div></li>
            <li class="list-group-item charDetailListPadding">Forensic Evaluation <div class="pull-right"><?php echo $model->Forensics; ?></div></li>
            <li class="list-group-item charDetailListPadding">Healing <div class="pull-right"><?php echo $model->Healing; ?></div></li>
            <li class="list-group-item charDetailListPadding">Herding <div class="pull-right"><?php echo $model->Herding; ?></div></li>
            <li class="list-group-item charDetailListPadding">Hiding <div class="pull-right"><?php echo $model->Hiding; ?></div></li>
            <li class="list-group-item charDetailListPadding">Inscription <div class="pull-right"><?php echo $model->Inscription; ?></div></li>
            <li class="list-group-item charDetailListPadding">Item Identification <div class="pull-right"><?php echo $model->ItemID; ?></div></li>
            <li class="list-group-item charDetailListPadding">Lockpicking <div class="pull-right"><?php echo $model->Lockpicking; ?></div></li>
            <li class="list-group-item charDetailListPadding">Lumberjacking <div class="pull-right"><?php echo $model->Lumberjacking; ?></div></li>
            <li class="list-group-item charDetailListPadding">Mace Fighting <div class="pull-right"><?php echo $model->Macefighting; ?></div></li>
            <li class="list-group-item charDetailListPadding">Magery <div class="pull-right"><?php echo $model->Magery; ?></div></li>
        </div>

        <div class="col-xs-12, col-sm-4, col-lg-3">
            <li class="list-group-item charDetailListPadding">Meditation <div class="pull-right"><?php echo $model->Meditation; ?></div></li>
            <li class="list-group-item charDetailListPadding">Mining <div class="pull-right"><?php echo $model->Mining; ?></div></li>
            <li class="list-group-item charDetailListPadding">Musician Ship <div class="pull-right"><?php echo $model->Musicianship; ?></div></li>
            <li class="list-group-item charDetailListPadding">Parrying <div class="pull-right"><?php echo $model->Parrying; ?></div></li>
            <li class="list-group-item charDetailListPadding">Peacemaking <div class="pull-right"><?php echo $model->Peacemaking; ?></div></li>
            <li class="list-group-item charDetailListPadding">Poisoning <div class="pull-right"><?php echo $model->Poisoning; ?></div></li>
            <li class="list-group-item charDetailListPadding">Provocation <div class="pull-right"><?php echo $model->Provocation; ?></div></li>
            <li class="list-group-item charDetailListPadding">Remove Trap <div class="pull-right"><?php echo $model->RemoveTrap; ?></div></li>
            <li class="list-group-item charDetailListPadding">Resisting Spells <div class="pull-right"><?php echo $model->MagicResistance; ?></div></li>
            <li class="list-group-item charDetailListPadding">Snooping <div class="pull-right"><?php echo $model->Snooping; ?></div></li>
            <li class="list-group-item charDetailListPadding">Spellweaving <div class="pull-right"><?php echo $model->Spellweaving; ?></div></li>
            <li class="list-group-item charDetailListPadding">Spirit Speak <div class="pull-right"><?php echo $model->SpiritSpeak; ?></div></li>
            <li class="list-group-item charDetailListPadding">Stealing <div class="pull-right"><?php echo $model->Stealing; ?></div></li>
            <li class="list-group-item charDetailListPadding">Swordsmanship <div class="pull-right"><?php echo $model->Swordsmanship; ?></div></li>
        </div>

        <div class="col-xs-12, col-sm-4, col-lg-3">
            <li class="list-group-item charDetailListPadding">Tactics <div class="pull-right"><?php echo $model->Tactics; ?></div></li>
            <li class="list-group-item charDetailListPadding">Tailoring <div class="pull-right"><?php echo $model->Tailoring; ?></div></li>
            <li class="list-group-item charDetailListPadding">Taste Identification <div class="pull-right"><?php echo $model->TasteID; ?></div></li>
            <li class="list-group-item charDetailListPadding">Tinkering <div class="pull-right"><?php echo $model->Tinkering; ?></div></li>
            <li class="list-group-item charDetailListPadding">Tracking <div class="pull-right"><?php echo $model->Tracking; ?></div></li>
            <li class="list-group-item charDetailListPadding">Veterinary <div class="pull-right"><?php echo $model->Veterinary; ?></div></li>
            <li class="list-group-item charDetailListPadding">Wrestling <div class="pull-right"><?php echo $model->Wrestling; ?></div></li>
        </div>
    </div>
</ul>