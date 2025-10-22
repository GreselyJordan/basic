<?php

namespace app\controllers;

use app\models\Peliculas;
use app\models\PeliculasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeliculasController implements the CRUD actions for Peliculas model.
 */
class PeliculasController extends Controller
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
     * Lists all Peliculas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeliculasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Peliculas model.
     * @param int $id_peliculas Id Peliculas
     * @param int $actores_id_actores Actores Id Actores
     * @param int $generos_id_generos Generos Id Generos
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_peliculas, $actores_id_actores, $generos_id_generos)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_peliculas, $actores_id_actores, $generos_id_generos),
        ]);
    }

    /**
     * Creates a new Peliculas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Peliculas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_peliculas' => $model->id_peliculas, 'actores_id_actores' => $model->actores_id_actores, 'generos_id_generos' => $model->generos_id_generos]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Peliculas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_peliculas Id Peliculas
     * @param int $actores_id_actores Actores Id Actores
     * @param int $generos_id_generos Generos Id Generos
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_peliculas, $actores_id_actores, $generos_id_generos)
    {
        $model = $this->findModel($id_peliculas, $actores_id_actores, $generos_id_generos);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_peliculas' => $model->id_peliculas, 'actores_id_actores' => $model->actores_id_actores, 'generos_id_generos' => $model->generos_id_generos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Peliculas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_peliculas Id Peliculas
     * @param int $actores_id_actores Actores Id Actores
     * @param int $generos_id_generos Generos Id Generos
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_peliculas, $actores_id_actores, $generos_id_generos)
    {
        $this->findModel($id_peliculas, $actores_id_actores, $generos_id_generos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Peliculas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_peliculas Id Peliculas
     * @param int $actores_id_actores Actores Id Actores
     * @param int $generos_id_generos Generos Id Generos
     * @return Peliculas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_peliculas, $actores_id_actores, $generos_id_generos)
    {
        if (($model = Peliculas::findOne(['id_peliculas' => $id_peliculas, 'actores_id_actores' => $actores_id_actores, 'generos_id_generos' => $generos_id_generos])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
