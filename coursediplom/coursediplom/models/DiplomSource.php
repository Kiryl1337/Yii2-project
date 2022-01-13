<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Diplom_Source".
 *
 * @property int $id
 * @property int|null $id_diplom
 * @property int|null $id_source
 */
class DiplomSource extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Diplom_Source';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_diplom', 'id_source'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_diplom' => 'Id Diplom',
            'id_source' => 'Id Source',
        ];
    }

    public function getSource()
    {
        return $this->hasOne(Source::className(),['id'=>'id_source']);
    }
}
