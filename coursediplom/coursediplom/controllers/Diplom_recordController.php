<?php
/**
 * Created by PhpStorm.
 * User: Kiryl
 * Date: 18.12.2019
 * Time: 0:43
 */

namespace app\controllers;
use Yii;
use app\models\Diplom;
use app\models\DiplomSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class Diplom_recordController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Diplom models.
     * @return mixed
     */
    public function actionIndex()
    {

        if (!\Yii::$app->user->can('diplom_record/index')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $searchModel = new DiplomSearch();
        $dataProvider = $searchModel->search1(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Diplom model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        if (!\Yii::$app->user->can('diplom_record/view')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewComment($id)
    {
        if (!\Yii::$app->user->can('diplom_record/view')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $rows = (new \yii\db\Query())
            ->select(['left(parsename(replace(FIO,\' \',\'.\'),2),1)+\'.\' +
                     left(parsename(replace(FIO,\' \',\'.\'),1),1)+\'. \'+
                     parsename(replace(FIO,\' \',\'.\'),3)+\' \''])
            ->from('[User], Diplom')
            ->Where(['Diplom.id'=>$id])->andWhere('Diplom.id_teacher=[User].id')->one();
        return $this->render('view-comment', [
            'model' => $this->findModel($id),
            'rows'=>$rows,
        ]);
    }

    /**
     * Updates an existing Diplom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        if (!\Yii::$app->user->can('diplom_record/update')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->saveDiplomForStudent()) {
            if($model->id_student!=null) {
                Yii::$app->session->setFlash('success', "Вы успешно записались на дипломной.");
            } else Yii::$app->session->setFlash('success', "Вы успешно отписались от дипломной.");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Finds the Diplom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Diplom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Diplom::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
