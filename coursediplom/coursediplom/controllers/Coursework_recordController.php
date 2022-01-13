<?php


namespace app\controllers;

use app\models\Coursework;
use app\models\CourseworkSearch;
use app\models\User;
use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class Coursework_recordController extends Controller
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
     * Lists all Coursework models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->can('coursework_record/index')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }

        $searchModel = new CourseworkSearch();
        $dataProvider = $searchModel->search1(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }



    /**
     * Displays a single Coursework model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!\Yii::$app->user->can('coursework_record/view')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewComment($id)
    {
        if (!\Yii::$app->user->can('coursework_record/view')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $rows = (new \yii\db\Query())
            ->select(['left(parsename(replace(FIO,\' \',\'.\'),2),1)+\'.\' +
                     left(parsename(replace(FIO,\' \',\'.\'),1),1)+\'. \'+
                     parsename(replace(FIO,\' \',\'.\'),3)+\' \''])
            ->from('[User], Coursework')
            ->Where(['Coursework.id'=>$id])->andWhere('Coursework.id_teacher=[User].id')->one();
        return $this->render('view-comment', [
            'model' => $this->findModel($id),
            'rows'=>$rows,
        ]);
    }



    public function actionViewTask($id)
    {
        if (!\Yii::$app->user->can('coursework_record/view')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $rowsForStudent = (new \yii\db\Query())
            ->select(['left(parsename(replace(FIO,\' \',\'.\'),2),1)+\'.\' +
                     left(parsename(replace(FIO,\' \',\'.\'),1),1)+\'. \'+
                     parsename(replace(FIO,\' \',\'.\'),3)+\' \''])
            ->from('[User], Coursework')
            ->Where(['Coursework.id'=>$id])->andWhere('Coursework.id_student=[User].id')->one();

        $rowsForTeacher = (new \yii\db\Query())
            ->select(['left(parsename(replace(FIO,\' \',\'.\'),2),1)+\'.\' +
                     left(parsename(replace(FIO,\' \',\'.\'),1),1)+\'. \'+
                     parsename(replace(FIO,\' \',\'.\'),3)+\' \''])
            ->from('[User], Coursework')
            ->Where(['Coursework.id'=>$id])->andWhere('Coursework.id_teacher=[User].id')->one();
        return $this->render('view-task', [
            'model' => $this->findModel($id),
            'rowsForStudent'=>$rowsForStudent,
            'rowsForTeacher'=>$rowsForTeacher,
        ]);
    }

    /**
     * Updates an existing Coursework model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('coursework_record/update')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->saveCourseworkForStudent()) {
            if($model->id_student!=null) {
                Yii::$app->session->setFlash('success', "Вы успешно записались на курсовую.");
            } else Yii::$app->session->setFlash('success', "Вы успешно отписались от курсовой.");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }



    /**
     * Finds the Coursework model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Coursework the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Coursework::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}