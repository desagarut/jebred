<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php if ($artikel) : ?>

  <?php $this->load->view($folder_themes . '/partials/slider_artikel') ?>
  <!-- Artikel Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row g-3">
            <div class="text-center mx-auto mb-1 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="bg-dark text-center text-danger px-2 py-1">Baca review film terlengkap di Jebred</h6>
            </div>
          </div>
          <?php $this->load->view($folder_themes . '/partials/teks_berjalan.php') ?>
          <div class="row g-3">
            <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.1s" style="padding-bottom: 15px;">
              <script async src="https://cse.google.com/cse.js?cx=ce1ed54db28733f39"></script>
              <div class="gcse-search"></div>
            </div>
          </div>
          <div class="row g-3">
            <?php $this->load->view($folder_themes . '/partials/headlines') ?>
          </div>
          <div class="row g-3">
            <?php foreach ($artikel as $article) : ?>
              <?php $data['review'] = $article ?>
              <?php $url = site_url('artikel/' . buat_slug($article)) ?>
              <?php $url2 = site_url('film/' . buat_slug($article)) ?>
              <?php $image = ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $article['gambar'])) ?
                AmbilFotoArtikel($article['gambar'], 'sedang') :
                base_url($this->theme_folder . '/' . $this->theme . '/assets/img/placeholder.png'); ?>
              <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item text-center p-1"> <a href="<?= $url ?>"> <img class="img-fluid " style="width: 380px;" src="<?= $image ?>" alt="<?= $review['judul'] ?>"> </a>
                  <div class="team-text">
                    <h7 style="color: rgb(204, 204, 204)">
                      <small>Review Film: <?= $article['judul'] ?></small>
                    </h7>
                    <p>
                      <a class="btn btn-sm btn-danger" href="<?= $url ?>"><small>Baca</small></a>
                      <a class="btn btn-sm btn-warning" href="<?= $url2 ?>"><small>Movie</small></a>
                    </p>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
            <?php $this->load->view($folder_themes . '/partials/main/paging') ?>
          </div>
        </div>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847" crossorigin="anonymous"></script>
        <?php $this->load->view($folder_themes . '/widgets/arsip_film') ?>
      </div>
    </div>
  </div>
<?php endif ?>

<!-- Artikel End -->