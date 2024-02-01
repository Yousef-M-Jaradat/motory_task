<?php

namespace app\controllers;

use Yii;
use app\models\History;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class HistoryController extends Controller
{
    public function actionIndex()
    {
        try {
            $history = History::find()->all();
            return $this->render('index', [
                'history' => $history,
            ]);
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\HistoryController');
            Yii::$app->session->setFlash('error', 'An unexpected error occurred.');
            return $this->redirect(['index']);
        }
    }

    public function actionDeleteAll()
    {
        try {
            History::deleteAll();
            Yii::$app->session->setFlash('success', 'All history records have been deleted.');
            return $this->redirect(['index']);
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\HistoryController');
            Yii::$app->session->setFlash('error', 'An unexpected error occurred.');
            return $this->redirect(['index']);
        }
    }

    public function actionDelete($id)
    {
        try {
            $history = $this->findModel($id);
            $history->delete();
            Yii::$app->session->setFlash('success', 'History record has been deleted.');
            return $this->redirect(['index']);
        } catch (NotFoundHttpException $e) {
            Yii::error($e->getMessage(), 'app\controllers\HistoryController');
            Yii::$app->session->setFlash('error', 'History record not found.');
            return $this->redirect(['index']);
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\HistoryController');
            Yii::$app->session->setFlash('error', 'An unexpected error occurred.');
            return $this->redirect(['index']);
        }
    }

    protected function findModel($id)
    {
        try {
            if (($model = History::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested history record does not exist.');
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\HistoryController');
            throw $e;
        }
    }
}
