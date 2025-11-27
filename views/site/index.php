<?php

/** @var yii\web\View $this */
/** @var app\models\Peliculas[] $featured */
/** @var app\models\Peliculas[] $peliculas */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Películas - Streaming Platform';
?>

<div class="site-index">
    
    <?php if (!empty($featured)): 
        $heroMovie = $featured[0];
        $heroImg = $heroMovie->portada ? Yii::getAlias('@web') . '/portadas/' . $heroMovie->portada : Yii::getAlias('@web') . '/assets/default-movie.jpg';
    ?>
    <!-- Hero Section -->
    <section class="hero-section">
        <img src="<?= $heroImg ?>" alt="<?= Html::encode($heroMovie->titulo) ?>" class="hero-background">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="hero-title"><?= Html::encode($heroMovie->titulo) ?></h1>
                        <p class="hero-description">
                            <?= Html::encode($heroMovie->sinipsis) ?>
                        </p>
                        <div class="hero-meta">
                            <span class="hero-meta-item">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/>
                                </svg>
                                <?= Html::encode($heroMovie->duracion ?? '120') ?> min
                            </span>
                            <span class="hero-meta-item">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <?= Html::encode($heroMovie->generosIdGeneros->nombre ?? 'Acción') ?>
                            </span>
                            <span class="hero-meta-item">
                                <svg fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"/>
                                </svg>
                                <?= Html::encode($heroMovie->anio ?? '2024') ?>
                            </span>
                        </div>
                        <div class="d-flex gap-3">
                            <button class="btn btn-play">
                                <svg style="width: 20px; height: 20px; display: inline-block; margin-right: 8px;" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/>
                                </svg>
                                Reproducir
                            </button>
                            <button class="btn btn-info">
                                <svg style="width: 20px; height: 20px; display: inline-block; margin-right: 8px;" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>
                                </svg>
                                Más información
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Trending Movies Carousel -->
    <?php if (!empty($featured) && count($featured) > 1): ?>
    <section class="movies-carousel-section">
        <div class="container">
            <h2 class="section-title">Películas Destacadas</h2>
            <div class="movies-carousel">
                <?php foreach (array_slice($featured, 1) as $movie): 
                    $img = $movie->portada ? Yii::getAlias('@web') . '/portadas/' . $movie->portada : Yii::getAlias('@web') . '/assets/default-movie.jpg';
                ?>
                <div class="carousel-movie-card">
                    <img src="<?= $img ?>" alt="<?= Html::encode($movie->titulo) ?>">
                    <p class="movie-title"><?= Html::encode($movie->titulo) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Info Section -->
    <section class="info-section">
        <div class="container">
            <h2>Disfruta en cualquier momento, en cualquier lugar</h2>
            <p>Transmite películas ilimitadas en tu teléfono, tablet, laptop y TV sin costo adicional.</p>
            
            <div class="info-features">
                <div class="info-feature">
                    <div class="info-feature-icon">
                        <svg fill="currentColor" viewBox="0 0 20 20" style="width: 32px; height: 32px;">
                            <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                        </svg>
                    </div>
                    <h3>HD de alta calidad</h3>
                    <p>Disfruta de películas en calidad HD y 4K con sonido envolvente</p>
                </div>
                
                <div class="info-feature">
                    <div class="info-feature-icon">
                        <svg fill="currentColor" viewBox="0 0 20 20" style="width: 32px; height: 32px;">
                            <path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z"/>
                        </svg>
                    </div>
                    <h3>Ver en cualquier dispositivo</h3>
                    <p>Transmite en tu TV, computadora, móvil y más</p>
                </div>
                
                <div class="info-feature">
                    <div class="info-feature-icon">
                        <svg fill="currentColor" viewBox="0 0 20 20" style="width: 32px; height: 32px;">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"/>
                        </svg>
                    </div>
                    <h3>Descarga para ver offline</h3>
                    <p>Guarda tus favoritas y míralas en cualquier momento</p>
                </div>
            </div>
        </div>
    </section>

    <!-- All Movies Grid -->
    <section class="movies-grid-section">
        <div class="container">
            <h2 class="section-title">Todas las Películas</h2>
            
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <?php foreach ($peliculas as $p): 
                    $img = $p->portada ? Yii::getAlias('@web') . '/portadas/' . $p->portada : Yii::getAlias('@web') . '/assets/default-movie.jpg';
                ?>
                <div class="col">
                    <div class="card h-100 movie-card shadow-lg border-0 position-relative overflow-hidden">
                        <img src="<?= $img ?>" class="card-img-top movie-card-img" alt="<?= Html::encode($p->titulo) ?>">
                        <div class="movie-card-overlay">
                            <h5 class="card-title">
                                <?= Html::encode($p->titulo) ?>
                            </h5>
                            <span class="badge">
                                <?= Html::encode($p->generosIdGeneros->nombre ?? 'General') ?>
                            </span>
                            <p class="card-text">
                                <?= Html::encode(\yii\helpers\StringHelper::truncate($p->sinipsis, 100)) ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</div>