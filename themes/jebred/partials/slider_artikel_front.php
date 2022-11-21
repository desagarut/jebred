<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Slider Artikel -->
<div class="container-xxl py-5">
  <div class="container" style="border-bottom: 1px red;">
    <div class="row g-3">
      <div class="text-center mx-auto mb-1 wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-danger px-5 py-1">Jebred Review Film Terbaru <a href="<?= site_url('artikel') ?>" class="btn btn-sm btn-primary text-end"> Semua</a></h6>
        <!--<h1 class="display-9 mb-4 text-danger">Jebred Movie Film Terbaru</h1>-->
      </div>
    </div>

    <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
      <?php foreach ($review as $article) : ?>
        <?php $data['review'] = $article ?>
        <?php $url = site_url('artikel/' . buat_slug($article)) ?>
        <?php $url2 = site_url('film/' . buat_slug($article)) ?>
        <div class="project-item border rounded h-100 p-1" data-dot="" style="background-color: white;">
          <?php $image = ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $article['gambar'])) ?
            AmbilFotoArtikel($article['gambar'], 'sedang') :
            base_url($this->theme_folder . '/' . $this->theme . '/assets/img/project-10.jpg'); ?>
          <div class="position-relative mb-3">
            <a href="<?= $image ?>" data-lightbox="project"><img class="img-fluid rounded" src="<?= $image ?>" alt="<?= $article['judul'] ?>"></a>
          </div>
          <h6><a href="<?= site_url('artikel/' . buat_slug($article)) ?>"><?= $article['judul'] ?></a></h6>
          <span><?= $article['owner'] ?></span>
        </div>
      <?php endforeach ?>
    </div>

  </div>
</div>
<!-- Slider Artikel -->