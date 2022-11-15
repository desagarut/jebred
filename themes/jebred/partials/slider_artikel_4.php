<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Slider Artikel Isi 4 Start -->


  <!-- Project Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <!--<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
        <h6 class="section-title bg-white text-center text-primary px-3">Review Film</h6>
        <h1 class="display-6 mb-4 text-primary">Review Film</h1>
      </div>-->
      <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
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
