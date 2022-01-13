<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Group".
 *
 * @property int $id
 * @property string $name
 * @property string $full_name
 * @property string $cipher
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name','full_name','cipher'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'name' => 'Название',
            'full_name' => 'Полное название',
            'cipher' => 'Шифр',
        ];
    }

    public function getCoursework()
    {
        return $this->hasMany(Coursework::className(),['id_group'=>'id']);
    }

    public static function getListGroup(){
        return ArrayHelper::map(self::find()->all(),'id','name');
    }
}
