<?php

namespace app\modules\admin\controllers;

use Mpdf\MpdfException;
use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Mpdf\Mpdf;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->can('admin/user/index')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!\Yii::$app->user->can('admin/user/view')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionGeneratePdf($id)
    {
        if (!\Yii::$app->user->can('admin/user/view')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $pdf_content= $this->renderPartial('view-pdf', [
            'model' => $this->findModel($id),
        ]);
        $mpdf = new Mpdf();
        try {
            $mpdf->writeHtml($pdf_content);
            $mpdf->output();
        } catch (MpdfException $e) {
        }
        exit;
    }


    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('admin/user/update')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!\Yii::$app->user->can('admin/user/delete')) {
            throw new \yii\web\ForbiddenHttpException('Доступ закрыт.');
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Запрошенная страница не существует.');
    }

}
