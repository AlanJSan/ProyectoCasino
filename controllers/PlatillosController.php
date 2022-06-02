<?php

namespace app\controllers;

use app\models\Platillos;
use app\models\PlatillosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlatillosController implements the CRUD actions for Platillos model.
 */
class PlatillosController extends Controller
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
     * Lists all Platillos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PlatillosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Platillos model.
     * @param string $id_platillo Id Platillo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_platillo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_platillo),
        ]);
    }

    /**
     * Creates a new Platillos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Platillos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_platillo' => $model->id_platillo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Platillos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_platillo Id Platillo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_platillo)
    {
        $model = $this->findModel($id_platillo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_platillo' => $model->id_platillo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Platillos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_platillo Id Platillo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_platillo)
    {
        $this->findModel($id_platillo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Platillos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_platillo Id Platillo
     * @return Platillos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_platillo)
    {
        if (($model = Platillos::findOne(['id_platillo' => $id_platillo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
