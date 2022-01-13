<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * DiplomSearch represents the model behind the search form of `common\models\Diplom`.
 */
class DiplomSearch extends Diplom
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'text','id_student', 'id_teacher', 'id_group'], 'safe'],
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


    public function search1($params)
    {
        $query1=\Yii::$app->user->identity->id_group;
        $query = Diplom::find()->joinWith('group')->joinWith('teacher')->andWhere(['Diplom.id_group'=>$query1]);

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
            'diplom.id' => $this->id,

        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            //       ->andFilterWhere(['like', 'user_.FIO', $this->id_student])
            ->andFilterWhere(['like', 'user.FIO', $this->id_teacher])
            ->andFilterWhere(['like', 'group.name', $this->id_group]);

        return $dataProvider;
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
        $query = Diplom::find()->joinWith('group')->joinWith('teacher')->andWhere(['Diplom.id_teacher'=>$query1]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'diplom.id' => $this->id,

        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            //       ->andFilterWhere(['like', 'user_.FIO', $this->id_student])
            ->andFilterWhere(['like', 'user.FIO', $this->id_teacher])
            ->andFilterWhere(['like', 'group.name', $this->id_group]);

        return $dataProvider;
    }
}
