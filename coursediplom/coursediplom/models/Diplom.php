<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Diplom".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $url
 * @property int $id_student
 * @property int $id_teacher
 * @property int $id_group
 */
class Diplom extends \yii\db\ActiveRecord
{
    public $new_sources;
    public $section_name;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Diplom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'id_teacher', 'id_group'], 'required'],
            [['text'], 'string'],
            [['id_student', 'id_teacher', 'id_group'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['new_sources'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'title' => 'Название темы',
            'text' => 'Краткое описание',
            'id_student' => 'Студент',
            'id_teacher' => 'Преподаватель',
            'id_group' => 'Группа',
            'studentFIO' => 'Студент',
            'teacherFIO' => 'Преподаватель',
            'groupName' => 'Группа',
            'new_sources'=>'Название источника(ов)',
            'sourcesAsString'=>'Название источника(ов)',
            'section_name'=>'Название раздела',
        ];
    }

    public function getTeacher()
    {
        return $this->hasOne(User::className(),['id'=>'id_teacher'])->AndWhere('is_teacher=1');
    }

    public function getStudent()
    {
        return $this->hasOne(User::className(),['id'=>'id_student'])->AndWhere('is_teacher=0');
    }

    public function getGroup()
    {
        return $this->hasOne(Group::className(),['id'=>'id_group']);
    }

    public function getDiplomSource()
    {
        return $this->hasMany(DiplomSource::className(),['id_diplom'=>'id']);
    }

    public function getSources()
    {
        return $this->hasMany(Source::className(),['id'=>'id_source'])->via('diplomSource');
    }

    public function getGroupName()
    {
        return (isset($this->group))? $this->group->name: 'Не задана';
    }

    public function getTeacherFIO()
    {
        return (isset($this->teacher))? $this->teacher->FIO: 'Нет преподавателя';
    }

    public function getStudentFIO()
    {
        return (isset($this->student))? $this->student->FIO: 'Нет студента';
    }

    public static function getListDiplom(){
        $query=Yii::$app->user->identity->id;
        return ArrayHelper::map(self::find()->where(['Diplom.id_teacher'=>$query])->all(),'id','title');
    }

    public function getSourcesAsString()
    {
        $array=ArrayHelper::map($this->sources,'id','source_name');
        return implode(', ', $array);
    }

    public function saveDiplomForStudent()
    {
        if($this->id_student==null) {
            $this->id_student = Yii::$app->user->id;
        }else $this->id_student = null;
        return $this->save();
    }

    public function saveDiplomForTeacher()
    {
        $this->id_teacher=Yii::$app->user->id;
        return $this->save();
    }

    public function beforeDelete()
    {
        if(parent::beforeDelete()){
            DiplomSource::deleteAll(['id_diplom'=>$this->id]);
            return true;
        }else{
            return false;
        }
    }

    public function afterFind()
    {
        $this->new_sources=ArrayHelper::map($this->sources,'id','id');
    }

    public function afterSave($insert,$changeAttributes)
    {
        parent::afterSave($insert,$changeAttributes);

        if(is_array($this->new_sources)){
            $old_sources=ArrayHelper::map($this->sources,'id','id');
            foreach ($this->new_sources as $one_new_source){
                if(isset($old_sources[$one_new_source])){
                    unset($old_sources[$one_new_source]);
                }else{
                    $model = new DiplomSource();
                    $model->id_diplom = $this->id;
                    $model->id_source = $one_new_source;
                    $model->save();
                }
            }
            DiplomSource::deleteAll(['and',['id_diplom'=>$this->id],['id_source'=>$old_sources]]);
        }else{
            DiplomSource::deleteAll(['id_diplom'=>$this->id]);
        }

    }
}
