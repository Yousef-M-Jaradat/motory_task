<?php

namespace app\controllers;

use Attribute;
use Yii;
use app\models\Categories;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


class CategoriesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function actionIndex()
    {
        $Categories = Categories::find()->all();
        return $this->render('index', [
            'Categories' => $Categories,
        ]);
    }

    public function actionView($id)
    {
        $categories = $this->findModel($id);

        return $this->render('view', [
            'categories' => $categories,
        ]);
    }


    public function actionCreate()
    {
        $categories = new Categories();

        if ($this->request->isPost) {
            $categories->load($this->request->post());

            if ($categories->save()) {
                return $this->redirect(['view', 'id' => $categories->id]);
            }
        }

        return $this->render('create', [
            'categories' => $categories,
        ]);
    }


    public function actionUpdate($id)
    {
        $categories = $this->findModel($id);


        if ($this->request->isPost) {
            $categories->load($this->request->post());



            // Save the categories
            if ($categories->save()) {
                return $this->redirect(['view', 'id' => $categories->id]);
            }
        }

        return $this->render('update', [
            'categories' => $categories,
        ]);
    }



    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
