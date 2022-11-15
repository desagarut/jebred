<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Slider Artikel Isi 4 Start -->

<?php if ($artikel) : ?>

  <!-- Project Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <!--<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
        <h6 class="section-title bg-white text-center text-primary px-3">Review Film</h6>
        <h1 class="display-6 mb-4 text-primary">Review Film</h1>
      </div>-->
 <!--     <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
        <?php foreach ($artikel as $article) : ?>
          <?php $data['review'] = $article ?>
          <?php $url = site_url('artikel/' . buat_slug($article)) ?>
          <?php $url2 = site_url('film/' . buat_slug($article)) ?>
          <div class="project-item border rounded h-100 p-1" data-dot="" style="background-color: white;">
            <?php $image = ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $article['gambar'])) ?
              AmbilFotoArtikel($article['gambar'], 'sedang') :
              base_url($this->theme_folder . '/' . $this->theme . '/assets/img/project-10.jpg'); ?>
            <div class="position-relative mb-4">
              <a href="<?= $image ?>" data-lightbox="project"><img class="img-fluid rounded" src="<?= $image ?>" alt="<?= $article['judul'] ?>">
              <i class="fa fa-eye fa-2x"></i></a>
            </div>
            <h6><a href="<?= site_url('artikel/'.buat_slug($article))?>" ><?= $article['judul'] ?></a></h6>
            <span><?= $article['owner'] ?></span>
          </div>
        <?php endforeach ?>

      </div>
    </div>
  </div>
  <!-- Slider Artikel Isi 4 End -->
  <?php endif ?>

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                </button>
                <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                    <img class="img-fluid" src="img/carousel-3.jpg" alt="Image">
                </button>
            </div>
            <div class="carousel-inner">
            <?php $active = true; ?>
            <?php foreach ($slider_gambar['gambar'] as $gambar) : ?>
            <?php $file_gambar = $slider_gambar['lokasi'] . 'sedang_' . $gambar['gambar']; ?>
            <?php if(is_file($file_gambar)) : ?>

                <div class="carousel-item active">
                  <a href="<?='artikel/'.buat_slug($gambar); ?>">
                    <img class="w-100" src="<?php echo base_url().$slider_gambar['lokasi'].'sedang_'.$gambar['gambar']?>" alt="<?= $gambar['judul'] ?>">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4 animated zoomIn"><?= $gambar['judul'] ?></h4>
                            <h1 class="display-1 text-white mb-0 animated zoomIn"><?= $gambar['judul'] ?></h1>
                        </div>
                    </div>
                  </a>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php //$active = false; ?>

              </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
