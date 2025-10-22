<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peliculas".
 *
 * @property int $id_peliculas
 * @property string $titulo
 * @property string|null $sinipsis
 * @property string|null $anio_lanzamiento
 * @property int|null $duracion_min
 * @property string|null $portada
 * @property int $actores_id_actores
 * @property int $generos_id_generos
 *
 * @property Actores $actoresIdActores
 * @property DirectoresHasPeliculas[] $directoresHasPeliculas
 * @property Directores[] $directoresIdDirectores
 * @property Generos $generosIdGeneros
 */
class Peliculas extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peliculas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sinipsis', 'anio_lanzamiento', 'duracion_min', 'portada'], 'default', 'value' => null],
            [['titulo', 'actores_id_actores', 'generos_id_generos'], 'required'],
            [['sinipsis'], 'string'],
            [['anio_lanzamiento'], 'safe'],
            [['duracion_min', 'actores_id_actores', 'generos_id_generos'], 'integer'],
            [['titulo'], 'string', 'max' => 255],
            [['portada'], 'string', 'max' => 45],
            [['actores_id_actores'], 'exist', 'skipOnError' => true, 'targetClass' => Actores::class, 'targetAttribute' => ['actores_id_actores' => 'id_actores']],
            [['generos_id_generos'], 'exist', 'skipOnError' => true, 'targetClass' => Generos::class, 'targetAttribute' => ['generos_id_generos' => 'id_generos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_peliculas' => Yii::t('app', 'Id Peliculas'),
            'titulo' => Yii::t('app', 'Titulo'),
            'sinipsis' => Yii::t('app', 'Sinipsis'),
            'anio_lanzamiento' => Yii::t('app', 'Anio Lanzamiento'),
            'duracion_min' => Yii::t('app', 'Duracion Min'),
            'portada' => Yii::t('app', 'Portada'),
            'actores_id_actores' => Yii::t('app', 'Actores Id Actores'),
            'generos_id_generos' => Yii::t('app', 'Generos Id Generos'),
        ];
    }

    /**
     * Gets query for [[ActoresIdActores]].
     *
     * @return \yii\db\ActiveQuery|ActoresQuery
     */
    public function getActoresIdActores()
    {
        return $this->hasOne(Actores::class, ['id_actores' => 'actores_id_actores']);
    }

    /**
     * Gets query for [[DirectoresHasPeliculas]].
     *
     * @return \yii\db\ActiveQuery|DirectoresHasPeliculasQuery
     */
    public function getDirectoresHasPeliculas()
    {
        return $this->hasMany(DirectoresHasPeliculas::class, ['peliculas_id_peliculas' => 'id_peliculas', 'peliculas_actores_id_actores' => 'actores_id_actores']);
    }

    /**
     * Gets query for [[DirectoresIdDirectores]].
     *
     * @return \yii\db\ActiveQuery|DirectoresQuery
     */
    public function getDirectoresIdDirectores()
    {
        return $this->hasMany(Directores::class, ['id_directores' => 'directores_id_directores'])->viaTable('directores_has_peliculas', ['peliculas_id_peliculas' => 'id_peliculas', 'peliculas_actores_id_actores' => 'actores_id_actores']);
    }

    /**
     * Gets query for [[GenerosIdGeneros]].
     *
     * @return \yii\db\ActiveQuery|GenerosQuery
     */
    public function getGenerosIdGeneros()
    {
        return $this->hasOne(Generos::class, ['id_generos' => 'generos_id_generos']);
    }

    /**
     * {@inheritdoc}
     * @return PeliculasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PeliculasQuery(get_called_class());
    }

}
