<?php

namespace app\controllers;

use Attribute;
use Yii;
use app\models\Services;
use app\models\Categories;
use app\models\History;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


class ServicesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function actionIndex()
    {
        $services = Services::find()->all();
        return $this->render('index', [
            'services' => $services,
        ]);
    }

    public function actionView($id)
    {
        $service = $this->findModel($id);

        return $this->render('view', [
            'service' => $service,
        ]);
    }


    public function actionCreate()
    {
        $model = new Services();
        $categories = Categories::find()->all();
        $enumValues = ['new', 'used', 'both'];


        if ($this->request->isPost) {
            $model->load($this->request->post());

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->imageFile) {
                $model->upload();  
            }

            if ($model->save()) {
                $this->logHistory($model->id, 'create');

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'service' => $model,
            'categories' => $categories,
            'enumValues' => $enumValues,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categories = Categories::find()->all();
        $enumValues = ['new', 'used', 'both'];


        if ($this->request->isPost) {
            $model->load($this->request->post());

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->imageFile) {
                $model->upload(); 
            }

            if ($model->save()) {
                $this->logHistory($model->id, 'update');

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'service' => $model,
            'categories' => $categories,
            'enumValues' => $enumValues,

        ]);
    }



    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $this->logHistory($id, 'delete');

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Services::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function logHistory($serviceId, $action)
    {
        $history = new History();
        $history->service_id = $serviceId;
        $history->action = $action;
        $history->save();
    }
}
