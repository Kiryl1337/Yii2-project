<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SourceSearch represents the model behind the search form of `app\models\Source`.
 */
class SourceSearch extends Source
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_section','source_name','id_teacher'], 'safe'],
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
        $query = Source::find()->joinWith('teacher')->joinWith('section')->andWhere(['Source.id_teacher'=>$query1]);

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
            'source.id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'section.section_name', $this->id_section])
              ->andFilterWhere(['like', 'source.source_name', $this->source_name])
              ->andFilterWhere(['like', 'user.FIO', $this->id_teacher]);

        return $dataProvider;
    }
}
