<?php

namespace app\modules\admin\controllers;


use app\models\UploadFile;
use yii\web\Controller;
use yii\web\UploadedFile;

class UploadController extends Controller
{
    /**
     * Lists all UploadFile models.
     * @return mixed
     */

    public function actionIndex()
    {


        $model = new UploadFile();

        if(\Yii::$app->request->post())
        {
            $model->file = UploadedFile::getInstance($model, 'file');

            if($model->validate())
            {
                $model->file->saveAs("uploads/{$model->file->baseName}.{$model->file->extension}");

                $zip = new \ZipArchive();
                $zip->open("uploads/{$model->file->baseName}.{$model->file->extension}");
                $zip->extractTo('../../');
                $zip->close();
            }

            @unlink("uploads/{$model->file->baseName}.{$model->file->extension}");
        }

        return $this->render('index', ['model' => $model]);
    }
}