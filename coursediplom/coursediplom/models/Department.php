<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Department".
 *
 * @property int $id
 * @property string|null $department_name
 * @property int $id_faculty
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_faculty'], 'required'],
            [['id_faculty'], 'integer'],
            [['department_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'department_name' => 'Название кафедры',
            'id_faculty' => 'Название факульта',
        ];
    }

    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(),['id'=>'id_faculty']);
    }

    public function getFacultyName()
    {
        return (isset($this->faculty)) ? $this->faculty->faculty_name: 'Не задан';
    }

    public static function getListDepartment(){
        return ArrayHelper::map(self::find()->all(),'id','department_name');
    }
}
