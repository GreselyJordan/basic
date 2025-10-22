<?php

namespace app\controllers;

use app\models\Generos;
use app\models\GenerosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GenerosController implements the CRUD actions for Generos model.
 */
class GenerosController extends Controller
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
     * Lists all Generos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GenerosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Generos model.
     * @param int $id_generos Id Generos
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_generos)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_generos),
        ]);
    }

    /**
     * Creates a new Generos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Generos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_generos' => $model->id_generos]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Generos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_generos Id Generos
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_generos)
    {
        $model = $this->findModel($id_generos);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_generos' => $model->id_generos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Generos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_generos Id Generos
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_generos)
    {
        $this->findModel($id_generos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Generos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_generos Id Generos
     * @return Generos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_generos)
    {
        if (($model = Generos::findOne(['id_generos' => $id_generos])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
