<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CourseworkSearch represents the model behind the search form of `common\models\Coursework`.
 */
class CourseworkSearch extends Coursework
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','id_group'], 'integer'],
            [['title','id_teacher', ], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query1=\Yii::$app->user->identity->id;
        $query = Coursework::find()->joinWith('group')->joinWith('teacher')->andWhere(['Coursework.id_teacher'=>$query1]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>13,
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'coursework.id' => $this->id,
            'coursework.id_group' => $this->id_group,
        ]);

        $query->andFilterWhere(['like', 'coursework.title', $this->title])
              ->andFilterWhere(['like', 'user.FIO', $this->id_teacher]);

        return $dataProvider;
    }

    public function search1($params)
    {
        $query1=\Yii::$app->user->identity->id_group;
        $query = Coursework::find()->joinWith('group')->joinWith('teacher')->andWhere(['Coursework.id_group'=>$query1]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>13,
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'coursework.id' => $this->id,
            'coursework.id_group' => $this->id_group,
        ]);

        $query->andFilterWhere(['like', 'coursework.title', $this->title])
              ->andFilterWhere(['like', 'user.FIO', $this->id_teacher]);

        return $dataProvider;
    }

}
