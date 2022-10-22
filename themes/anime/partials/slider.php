<!-- Hero Section Begin -->

<section class="hero">
  <div class="container">
    <div class="hero__slider owl-carousel">
      <?php $active = true; ?>
      <?php foreach ($slider_gambar['gambar'] as $gambar) : ?>
      <?php $file_gambar = $slider_gambar['lokasi'] . 'sedang_' . $gambar['gambar']; ?>
      <?php if(is_file($file_gambar)) : ?>
      <div class="hero__items set-bg" data-setbg="<?php echo base_url().$slider_gambar['lokasi'].'sedang_'.$gambar['gambar']?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <div class="label"><?= $gambar['kategori'] ?></div>
                                <h2><?= $gambar['judul'] ?></h2>
                                <p><?= $gambar['abstract'] ?></p>
                                <a href="<?= site_url('film/').buat_slug($gambar) ?>"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
      <?php endif; ?>
      <?php endforeach; ?>
      <?php $active = false; ?>
    </div>
  </div>
</section>
<!-- Hero Section End --> 
