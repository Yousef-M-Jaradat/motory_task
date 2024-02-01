<?php

namespace app\controllers;

use Yii;
use app\models\History;
use app\models\Categories;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoriesController extends Controller
{
    public function actionIndex()
    {
        try {
            $categories = Categories::find()->all();
            return $this->render('index', [
                'Categories' => $categories, // Fix the variable name to match the view
            ]);
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\CategoriesController');
            Yii::$app->session->setFlash('error', 'An unexpected error occurred.');
            return $this->redirect(['index']);
        }
    }

    public function actionView($id)
    {
        try {
            $category = $this->findModel($id); // Fix the variable name
            return $this->render('view', [
                'categories' => $category, // Pass the model to the view with the correct variable name
            ]);
        } catch (NotFoundHttpException $e) {
            Yii::error($e->getMessage(), 'app\controllers\CategoriesController');
            Yii::$app->session->setFlash('error', 'Category not found.');
            return $this->redirect(['index']);
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\CategoriesController');
            Yii::$app->session->setFlash('error', 'An unexpected error occurred.');
            return $this->redirect(['index']);
        }
    }

    public function actionCreate()
    {
        try {
            $category = new Categories(); // Fix the variable name

            if ($this->request->isPost) {
                $category->load($this->request->post());

                if ($category->save()) {
                    $creationTime = date('Y-m-d H:i:s');
                    $details = $category->name . " created at " . $creationTime;
                    $this->logHistory('create category', $details);
                    return $this->redirect(['view', 'id' => $category->id]);
                }
            }

            return $this->render('create', [
                'categories' => $category, // Pass the model to the view with the correct variable name
            ]);
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\CategoriesController');
            Yii::$app->session->setFlash('error', 'An unexpected error occurred.');
            return $this->redirect(['index']);
        }
    }

    public function actionUpdate($id)
    {
        try {
            $category = $this->findModel($id); // Fix the variable name

            if ($this->request->isPost) {
                $category->load($this->request->post());

                if ($category->save()) {
                    $creationTime = date('Y-m-d H:i:s');
                    $details = $category->name . " updated at " . $creationTime;
                    $this->logHistory('update category', $details);
                    return $this->redirect(['view', 'id' => $category->id]);
                }
            }

            return $this->render('update', [
                'categories' => $category, // Pass the model to the view with the correct variable name
            ]);
        } catch (NotFoundHttpException $e) {
            Yii::error($e->getMessage(), 'app\controllers\CategoriesController');
            Yii::$app->session->setFlash('error', 'Category not found.');
            return $this->redirect(['index']);
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\CategoriesController');
            Yii::$app->session->setFlash('error', 'An unexpected error occurred.');
            return $this->redirect(['index']);
        }
    }

    public function actionDelete($id)
    {
        try {
            $this->findModel($id)->delete();
            $creationTime = date('Y-m-d H:i:s');
            $details = "category with Id =" . $id . " deleted at " . $creationTime;
            $this->logHistory('delete category', $details);
            return $this->redirect(['index']);
        } catch (NotFoundHttpException $e) {
            Yii::error($e->getMessage(), 'app\controllers\CategoriesController');
            Yii::$app->session->setFlash('error', 'Category not found.');
            return $this->redirect(['index']);
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\CategoriesController');
            Yii::$app->session->setFlash('error', 'An unexpected error occurred.');
            return $this->redirect(['index']);
        }
    }

    protected function findModel($id)
    {
        try {
            $model = Categories::findOne($id);
            if ($model !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        } catch (\Exception $e) {
            Yii::error($e->getMessage(), 'app\controllers\CategoriesController');
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
