<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Film Start -->
<?php if ($film) : ?>
  <?php $this->load->view($folder_themes . '/partials/slider') ?>
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row g-3">
            <div class="text-start mx-auto mb-1 wow fadeInUp" data-wow-delay="0.1s">
              <h6 class="section-title bg-white text-start text-danger px-3 py-1">Jebred Movie Upload Terbaru</h6>
              <!--<h1 class="display-9 mb-4 text-danger">Jebred Movie Film Terbaru</h1>-->
            </div>
          </div>

          <div class="row g-3">
            <div class="col-md-2 col-sm-2 wow fadeInUp" data-wow-delay="0.1s">
              <div class="team-item text-center p-1">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847" crossorigin="anonymous"></script>
                <ins class="adsbygoogle" style="display:block" data-ad-format="fluid" data-ad-layout-key="-x+s8-19-44+c7" data-ad-client="ca-pub-1823410826720847" data-ad-slot="9571148667"></ins>
                <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
              </div>
            </div>
            <?php foreach ($film as $movie) : ?>
              <?php $data['movie'] = $movie ?>
              <?php $url = site_url('film/' . buat_slug($movie)) ?>
              <?php $url2 = site_url('trailer/' . buat_slug($movie)) ?>

              <?php $abstract = potong_teks(strip_tags($movie['isi']), 200) ?>
              <?php $image = ($movie['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $movie['gambar'])) ?
                AmbilFotoArtikel($movie['gambar'], 'sedang') :
                base_url($this->theme_folder . '/' . $this->theme . '/assets/img/placeholder.png'); ?>
              <div class="col-md-2 col-sm-2 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item text-center p-1"> <a href="<?= $url2 ?>"> <img class="img-fluid " style="width: 380px;" src="<?= $image ?>" alt="<?= $movie['judul'] ?>"> </a>
                  <div class="team-text">
                    <div class="team-title">
                      <h7 style="color: rgb(204, 204, 204)">
                        <small><?= $movie['judul'] ?> (<?= $movie['tahun'] ?>)</small>
                      </h7>
                    </div>
                    <div class="team-social" style="background-color: transparent;">
                      <a class="btn btn-sm btn-danger" href="<?= $url ?>"><small>Trailer</small></a>
                      <a class="btn btn-sm btn-warning" href="<?= $url2 ?>"><small>Movie</small></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
            <?php $this->load->view($folder_themes . '/partials/main/paging') ?>
          </div>
          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847" crossorigin="anonymous"></script>
        </div>
        <?php $this->load->view($folder_themes . '/widgets/sisi_kanan_populer') ?>
      </div>
    </div>
  </div>
<?php endif ?>