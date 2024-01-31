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
        $history = History::find()->all();

        return $this->render('index', [
            'history' => $history,
        ]);
    }

    public function actionDeleteAll()
    {
        History::deleteAll();

        Yii::$app->session->setFlash('success', 'All history records have been deleted.');
        return $this->redirect(['index']);
    }

    public function actionDelete($id)
    {
        $history = $this->findModel($id);
        $history->delete();

        Yii::$app->session->setFlash('success', 'History record has been deleted.');
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = History::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested history record does not exist.');
    }
}
