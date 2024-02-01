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
        try {
            $services = Services::find()->all();
            return $this->render('index', [
                'services' => $services,
            ]);
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\ServicesController');
            Yii::$app->session->setFlash('error', 'An unexpected error occurred.');
            return $this->redirect(['index']);
        }
    }

    public function actionView($id)
    {
        try {
            $service = $this->findModel($id);
            return $this->render('view', [
                'service' => $service,
            ]);
        } catch (NotFoundHttpException $e) {
            Yii::error($e->getMessage(), 'app\controllers\ServicesController');
            Yii::$app->session->setFlash('error', 'Service not found.');
            return $this->redirect(['index']);
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\ServicesController');
            Yii::$app->session->setFlash('error', 'An unexpected error occurred.');
            return $this->redirect(['index']);
        }
    }


    public function actionCreate()
    {
        try {
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
                    $creationTime = date('Y-m-d H:i:s');
                    $details = $model->name . " created at " . $creationTime;
                    $this->logHistory('create service', $details);

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

            return $this->render('create', [
                'service' => $model,
                'categories' => $categories,
                'enumValues' => $enumValues,
            ]);
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\ServicesController');
            Yii::$app->session->setFlash('error', 'An unexpected error occurred.');
            return $this->redirect(['index']);
        }
    }


    public function actionUpdate($id)
    {
        try {
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
                    $creationTime = date('Y-m-d H:i:s');
                    $details = $model->name . " updated at " . $creationTime;
                    $this->logHistory('update service', $details);

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

            return $this->render('update', [
                'service' => $model,
                'categories' => $categories,
                'enumValues' => $enumValues,
            ]);
        } catch (NotFoundHttpException $e) {
            Yii::error($e->getMessage(), 'app\controllers\ServicesController');
            Yii::$app->session->setFlash('error', 'Service not found.');
            return $this->redirect(['index']);
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\ServicesController');
            Yii::$app->session->setFlash('error', 'An unexpected error occurred.');
            return $this->redirect(['index']);
        }
    }



    public function actionDelete($id)
    {
        try {
            $this->findModel($id)->delete();
            $creationTime = date('Y-m-d H:i:s');
            $details = "service with Id =" . $id . " deleted at " . $creationTime;
            $this->logHistory('delete service', $details);

            return $this->redirect(['index']);
        } catch (NotFoundHttpException $e) {
            Yii::error($e->getMessage(), 'app\controllers\ServicesController');
            Yii::$app->session->setFlash('error', 'Service not found.');
            return $this->redirect(['index']);
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\ServicesController');
            Yii::$app->session->setFlash('error', 'An unexpected error occurred.');
            return $this->redirect(['index']);
        }
    }

    protected function findModel($id)
    {
        try {
            if (($model = Services::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\ServicesController');
            throw $e;
        }
    }

    protected function logHistory($action, $details)
    {
        try {
            $history = new History();
            $history->action = $action;
            $history->details = $details;
            $history->save();
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\ServicesController');
        }
    }
}
