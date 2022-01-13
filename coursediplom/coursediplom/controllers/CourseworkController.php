<?php


namespace app\controllers;


use app\models\Coursework;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class CourseworkController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->can('coursework/index')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $courseworks=Coursework::find()->with('teacher');
        $dataProvider = new ActiveDataProvider([
            'query' => $courseworks,
            'pagination'=>[
                'pageSize'=>10,
            ]
        ]);
        return $this->render('all',['dataProvider'=>$dataProvider]);
    }

    public function actionOne($id)
    {
        $coursework=Coursework::find()->andWhere(['id'=>$id])->one();
        return $this->render('one',['coursework'=>$coursework]);
    }
}