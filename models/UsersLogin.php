<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users_login".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $login_time
 * @property string $user_agent
 * @property string $ip
 *
 * @property Users $user
 */
class UsersLogin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users_login';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['login_time'], 'safe'],
            [['user_agent'], 'string', 'max' => 150],
            [['ip'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'login_time' => 'Login Time',
            'user_agent' => 'User Agent',
            'ip' => 'Ip',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
