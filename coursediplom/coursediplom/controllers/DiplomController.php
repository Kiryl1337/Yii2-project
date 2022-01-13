<?php


namespace app\controllers;


use app\models\Diplom;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class DiplomController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->can('diplom/index')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }

        $diploms=Diplom::find()->with('teacher');
        $dataProvider = new ActiveDataProvider([
            'query' => $diploms,
            'pagination'=>[
                'pageSize'=>10,
            ]
        ]);
        return $this->render('all',['dataProvider'=>$dataProvider]);
    }

    public function actionOne($id)
    {
        $diplom=Diplom::find()->andWhere(['id'=>$id])->one();
        return $this->render('one',['diplom'=>$diplom]);
    }
}