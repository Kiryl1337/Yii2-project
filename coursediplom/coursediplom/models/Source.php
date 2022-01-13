<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Source".
 *
 * @property int $id
 * @property string id_section
 * @property string source_name
 * @property int $id_teacher

 */
class Source extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Source';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_teacher'], 'required'],
            [['id_teacher','id_section'], 'integer'],
            [['source_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'id_section' => 'Название раздела',
            'source_name' => 'Название источника',
            'id_teacher' => 'Преподаватель',
            'teacherFIO'=>'ФИО преподавателя',
            'courseworkTitle'=>'Курсовая',
            'diplomTitle'=>'Дипломная',
            'sectionName'=>'Название раздела',
        ];
    }

    public function getTeacher()
    {
        return $this->hasOne(User::className(),['id'=>'id_teacher'])->AndWhere('is_teacher=1');
    }

    public function getCourseworkSource()
    {
        return $this->hasMany(CourseworkSource::className(),['id_source'=>'id']);
    }

    public function getCourseworks()
    {
        return $this->hasMany(Coursework::className(),['id'=>'id_coursework'])->via('courseworkSource');
    }

	public function getSection()
    {
        return $this->hasOne(Section::className(),['id'=>'id_section']);
    }

    public function getCourseworkTitle()
    {
        return (isset($this->coursework))? $this->coursework->title: 'Не задана';
    }

    public function getDiplomTitle()
    {
        return (isset($this->diplom))? $this->diplom->title: 'Не задана';
    }

    public function getTeacherFIO()
    {
        return (isset($this->teacher))? $this->teacher->FIO: 'Нет преподавателя';
    }

    public static function getListSources()
    {
        $query=Yii::$app->user->identity->id;
        return ArrayHelper::map(self::find()->Where(['id_teacher'=>$query])->all(),'id','source_name');
    }

    public function getSectionName()
    {
        return (isset($this->section))? $this->section->section_name: 'Нет раздела';
    }
    public function saveSourceForTeacher()
    {
        $this->id_teacher=Yii::$app->user->id;
        return $this->save();
    }
}
