<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php $active = true; ?>
            <?php $abstract = potong_teks($gambar['isi'], 250); ?>
            <?php foreach ($slider_gambar['gambar'] as $gambar) : ?>
                <?php $file_gambar = $slider_gambar['lokasi'] . 'sedang_' . $gambar['gambar']; ?>
                <?php if (is_file($file_gambar)) : ?>
                    <div class="carousel-item <?php echo ($active == true) ? "active" : "" ?>">
                        <!--<div class="row" style="background-image: url('<?php echo base_url() . $slider_gambar['lokasi'] . 'sedang_' . $gambar['gambar'] ?>;" alt="<?= $gambar['judul'] ?>');">-->
                        <img class="w-100" src="<?php echo base_url() . $slider_gambar['lokasi'] . 'sedang_' . $gambar['gambar1'] ?>" alt="<?= $gambar['judul'] ?>" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3" style="max-width: 900px; text-shadow: 4px 4px 4px #081828; -webkit-text-stroke: 0.25px #081828;">
                                <a href="<?= 'film/' . buat_slug($gambar); ?>">
                                    <h1 class="display-1 text-white mb-2 animated zoomIn"><?= $gambar['judul'] ?></h1>
                                </a>
                                <h6 class="text-primary text-uppercase mb-2 animated zoomIn"><?= $gambar['genre1'] ?> <?= $gambar['negara1'] ?></h6>
                                <p><?= potong_teks($gambar['isi'], 250) ?>... </p>
                                <a href="#" class="btn btn-lg btn-success">Sinopsis</a>&nbsp;<a href="<?= 'film/' . buat_slug($gambar); ?>" class="btn btn-lg btn-warning">Movie</a>
                            </div>
                        </div>
                    </div>
                    <?php $active = false; ?>

                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->