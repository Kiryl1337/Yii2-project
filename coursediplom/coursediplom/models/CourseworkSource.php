<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Coursework_Source".
 *
 * @property int $id
 * @property int|null $id_coursework
 * @property int|null $id_source
 */
class CourseworkSource extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Coursework_Source';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_coursework', 'id_source'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_coursework' => 'Id Coursework',
            'id_source' => 'Id Source',
        ];
    }

    public function getSource()
    {
        return $this->hasOne(Source::className(),['id'=>'id_source']);
    }
}
