<?php

namespace app\models\database;


/**
 * This is the model class for table "server".
 *
 * @property integer $id
 * @property integer $capacity
 * @property integer $currentOnline
 */
class Server extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'server';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['capacity', 'currentOnline'], 'required'],
            [['capacity', 'currentOnline'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'capacity' => 'Kapasite',
            'currentOnline' => 'Çevrimiçi Kullanıcı',
        ];
    }
}
