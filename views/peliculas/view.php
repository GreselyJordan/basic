<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Peliculas $model */

$this->title = $model->id_peliculas;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Peliculas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="peliculas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_peliculas' => $model->id_peliculas, 'actores_id_actores' => $model->actores_id_actores, 'generos_id_generos' => $model->generos_id_generos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_peliculas' => $model->id_peliculas, 'actores_id_actores' => $model->actores_id_actores, 'generos_id_generos' => $model->generos_id_generos], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_peliculas',
            'titulo',
            'sinipsis:ntext',
            'anio_lanzamiento',
            'duracion_min',
            'actores_id_actores',
            'generos_id_generos',
        ],
    ]) ?>

</div>
