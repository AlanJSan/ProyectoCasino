<?php

namespace app\controllers;

use app\models\Recetas;
use app\models\RecetasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecetasController implements the CRUD actions for Recetas model.
 */
class RecetasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Recetas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RecetasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recetas model.
     * @param int $id_receta Id Receta
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_receta)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_receta),
        ]);
    }

    /**
     * Creates a new Recetas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Recetas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_receta' => $model->id_receta]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Recetas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_receta Id Receta
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_receta)
    {
        $model = $this->findModel($id_receta);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_receta' => $model->id_receta]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Recetas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_receta Id Receta
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_receta)
    {
        $this->findModel($id_receta)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recetas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_receta Id Receta
     * @return Recetas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_receta)
    {
        if (($model = Recetas::findOne(['id_receta' => $id_receta])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
