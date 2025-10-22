<?php

use app\models\Peliculas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PeliculasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Peliculas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peliculas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Peliculas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_peliculas',
            'titulo',
            'sinipsis:ntext',
            'anio_lanzamiento',
            'duracion_min',
            //'actores_id_actores',
            //'generos_id_generos',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Peliculas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_peliculas' => $model->id_peliculas, 'actores_id_actores' => $model->actores_id_actores, 'generos_id_generos' => $model->generos_id_generos]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
