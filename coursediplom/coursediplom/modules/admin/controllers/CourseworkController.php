<?php

namespace app\modules\admin\controllers;

use app\models\Coursework;
use app\models\CourseworkSearch;
use app\models\CourseworkSource;
use app\models\Source;
use app\models\Section;
use app\models\User;
use kartik\mpdf\Pdf;
use Yii;


use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CourseworkController implements the CRUD actions for Coursework model.
 */
class CourseworkController extends Controller
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
        if (!\Yii::$app->user->can('admin/coursework/index')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $searchModel = new CourseworkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
        if (!\Yii::$app->user->can('admin/coursework/view')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewComment($id)
    {
        if (!\Yii::$app->user->can('admin/coursework/view')) {
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
        if (!\Yii::$app->user->can('admin/coursework/view')) {
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
     * Creates a new Coursework model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!\Yii::$app->user->can('admin/coursework/create')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $model = new Coursework();

        if ($model->load(Yii::$app->request->post()) && $model->saveCourseworkForTeacher()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
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
        if (!\Yii::$app->user->can('admin/coursework/update')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $model = $this->findModel($id);

        $coursework_sources=$model->getSources()->all();
        $sources=Source::find()->indexBy('id')->all();

        foreach (array_diff_key($sources,$coursework_sources) as $source){
            $coursework_sources[]=new Source(['id'=>$source->id]);
        }

        $post = Yii::$app->request->post();
        if (Model::loadMultiple($coursework_sources,$post) ) {
            foreach ($coursework_sources as $coursework_source){
                if($coursework_source->validate()){
                    if(!empty($coursework_source->source_name)){
                        $coursework_source->save();
                    }else {
                        $coursework_source->delete();
                    }
                }
            }

        }
        if($model->load($post) && $model->saveCourseworkForTeacher()){
            return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->render('update', [
                'model' => $model,
                'coursework_sources' => $coursework_sources,
            ]);

    }

    public function actionEditSources($id)
    {
        if (!\Yii::$app->user->can('admin/coursework/update')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('edit-sources', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Coursework model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!\Yii::$app->user->can('admin/coursework/delete')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
        if (($model = Coursework::find()->with('sources')->andWhere(['id'=>$id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLists($id)
    {
        $countUsers=User::find()->where(['id_group'=>$id])->andWhere('is_teacher=0')->count();
        $users=User::find()->where(['id_group'=>$id])->andWhere('is_teacher=0')->all();

        if($countUsers>0)
        {
            echo "<option> </option>";
            foreach ($users as $user){
                echo "<option value='".$user->id."'>".$user->FIO."</option>";
            }
        }
        else{
            echo "<option> </option>";
        }

    }

    public function actionLists1($id)
    {
        $query=Yii::$app->user->identity->id;
        $countSources=Source::find()->where(['id_section'=>$id])->andWhere(['id_teacher'=>$query])->count();
        $sources=Source::find()->where(['id_section'=>$id])->andWhere(['id_teacher'=>$query])->all();

        if($countSources>0)
        {
            echo "<option> </option>";
            foreach ($sources as $source){
                echo "<option value='".$source->id."'>".$source->source_name."</option>";
            }
        }
        else{
            echo "<option> </option>";
        }

    }
}
