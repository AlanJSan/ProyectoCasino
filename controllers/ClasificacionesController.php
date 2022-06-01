<?php

namespace app\controllers;

use app\models\Clasificaciones;
use app\models\ClasificacionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClasificacionesController implements the CRUD actions for Clasificaciones model.
 */
class ClasificacionesController extends Controller
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
     * Lists all Clasificaciones models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ClasificacionesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clasificaciones model.
     * @param string $id_clasifplatillo Id Clasifplatillo
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_clasifplatillo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_clasifplatillo),
        ]);
    }

    /**
     * Creates a new Clasificaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Clasificaciones();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_clasifplatillo' => $model->id_clasifplatillo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Clasificaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_clasifplatillo Id Clasifplatillo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_clasifplatillo)
    {
        $model = $this->findModel($id_clasifplatillo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_clasifplatillo' => $model->id_clasifplatillo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Clasificaciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_clasifplatillo Id Clasifplatillo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_clasifplatillo)
    {
        $this->findModel($id_clasifplatillo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Clasificaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_clasifplatillo Id Clasifplatillo
     * @return Clasificaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_clasifplatillo)
    {
        if (($model = Clasificaciones::findOne(['id_clasifplatillo' => $id_clasifplatillo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
