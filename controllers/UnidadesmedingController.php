<?php

namespace app\controllers;

use app\models\Unidadesmeding;
use app\models\UnidadesmedingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UnidadesmedingController implements the CRUD actions for Unidadesmeding model.
 */
class UnidadesmedingController extends Controller
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
     * Lists all Unidadesmeding models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UnidadesmedingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Unidadesmeding model.
     * @param string $id_unid_med_ing Id Unid Med Ing
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_unid_med_ing)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_unid_med_ing),
        ]);
    }

    /**
     * Creates a new Unidadesmeding model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Unidadesmeding();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_unid_med_ing' => $model->id_unid_med_ing]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Unidadesmeding model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_unid_med_ing Id Unid Med Ing
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_unid_med_ing)
    {
        $model = $this->findModel($id_unid_med_ing);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_unid_med_ing' => $model->id_unid_med_ing]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Unidadesmeding model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_unid_med_ing Id Unid Med Ing
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_unid_med_ing)
    {
        $this->findModel($id_unid_med_ing)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Unidadesmeding model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_unid_med_ing Id Unid Med Ing
     * @return Unidadesmeding the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_unid_med_ing)
    {
        if (($model = Unidadesmeding::findOne(['id_unid_med_ing' => $id_unid_med_ing])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
