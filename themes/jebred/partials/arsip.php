<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Service Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
      <h6 class="section-title bg-white text-center text-primary px-3">Arsip Movies</h6>
    </div>
    <div class="row g-4">
      <div class="col-md-12 wow fadeInUp" data-wow-delay="0.1s">
        <script async src="https://cse.google.com/cse.js?cx=2fdd71c38cbf39a25"></script>
        <div class="gcse-search"></div>
      </div>
      <!-- Start Single Product -->
      <?php if (count($farsip) > 0) : ?>
        <?php foreach ($farsip as $data) : ?>


          <div class="col-lg-2 col-md-6 col-sm-2 col-xs-2 wow fadeInUp" data-wow-delay="0.1s">
            <a class="service-item d-block rounded text-center h-100 p-4" href="<?= site_url('film/' . buat_slug($data)) ?>">
              <img class="img-fluid rounded mb-4" src="<?= AmbilFotoArtikel($data['gambar' . $i], 'sedang') ?>" alt="">
              <h7 class="mb-0" style="color: grey;"><?= $data['judul'] ?></h7><br/>
                <small><?= $data['kategori'] ?>|<?= $data['thn'] ?></small>

            </a>
          </div>

        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<!-- Service End -->