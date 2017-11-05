<?php
/**
 * Created by PhpStorm.
 * User: kyzaghan
 * Date: 04.11.2017
 * Time: 09:21
 */

namespace app\models\search;
use app\models\database\UsersCharacters;
use yii\data\ActiveDataProvider;

/**
 * Arama işlemleri için yaratılmış yardımcı sınıf
 * Class UsersCharactersSearch
 */
class UsersCharactersSearch extends UsersCharacters
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'account'], 'safe'],
            [['ostr', 'odex', 'oint', 'hits', 'stam', 'mana'], 'integer'],
            [['is_online'], 'boolean'],
        ];
    }

    public function search($params)
    {
        $query = UsersCharacters::find();

        $this->load($params);



        if(!empty($this->name)){
            $query->andFilterWhere(['like','name',"%{$this->name}%"]);
        }

        if(!empty($this->account)){
            $query->andFilterWhere(['=', 'account',$this->account]);
        }


        $query->andFilterWhere(['=','is_online',$this->is_online]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $dataProvider->sort->attributes['name'] = [
            'asc' => ['name' => SORT_ASC],
            'desc' => ['name' => SORT_DESC]
        ];

        return $dataProvider;
    }
}