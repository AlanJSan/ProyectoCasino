<?php

namespace app\controllers;

use app\models\Unidadesmedida;
use app\models\UnidadesmedidaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UnidadesmedidaController implements the CRUD actions for Unidadesmedida model.
 */
class UnidadesmedidaController extends Controller
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
     * Lists all Unidadesmedida models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UnidadesmedidaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Unidadesmedida model.
     * @param string $id_uni_medida Id Uni Medida
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_uni_medida)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_uni_medida),
        ]);
    }

    /**
     * Creates a new Unidadesmedida model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Unidadesmedida();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_uni_medida' => $model->id_uni_medida]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Unidadesmedida model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_uni_medida Id Uni Medida
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_uni_medida)
    {
        $model = $this->findModel($id_uni_medida);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_uni_medida' => $model->id_uni_medida]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Unidadesmedida model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_uni_medida Id Uni Medida
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_uni_medida)
    {
        $this->findModel($id_uni_medida)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Unidadesmedida model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_uni_medida Id Uni Medida
     * @return Unidadesmedida the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_uni_medida)
    {
        if (($model = Unidadesmedida::findOne(['id_uni_medida' => $id_uni_medida])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
