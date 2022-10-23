  <div class="trending__product">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="section-title">
          <h4>Trending Now</h4>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="btn__all"> <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a> </div>
      </div>
    </div>
    <div class="row">
      <?php if ($film) : ?>
        <?php foreach ($film as $data) : ?>
          <?php $data['article'] = $data ?>
          <?php $url = site_url('film/' . buat_slug($data)) ?>
          <?php $abstract = potong_teks(strip_tags($data['isi']), 200) ?>
          <?php $image = ($data['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $data['gambar'])) ?
            AmbilFotoArtikel($data['gambar'], 'sedang') :
            base_url($this->theme_folder . '/' . $this->theme . '/assets/img/placeholder.png'); ?>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="product__item">
            <a href="<?= $url ?>">
              <div class="product__item__pic set-bg" data-setbg="<?= $image ?>" alt="<?= $data['judul'] ?>">
              
                <div class="ep"><?= $data['rating'] ?></div>
                <div class="comment"><i class="fa fa-comments"></i> <?= $data['komentar'] ?></div>
                <div class="view"><i class="fa fa-eye"></i>
                  <?= $data['hit'] ?>
                </div>
              </div>
            </a>
              <div class="product__item__text text-center">
                <a href="<?= $url ?>" class="btn btn-sm btn-danger">Trailer</a>
                <a href="<?= $url ?>" class="btn btn-sm btn-warning">Movie</a>
                <h5><a href="#">
                    <?= $data['judul'] ?> - <?= $data['tahun'] ?>
                  </a></h5>
                <p>
                  <?= $data['genre1'] ?>, <?= $data['genre2'] ?>, <?= $data['genre3'] ?><br />
                  <?= $data['negara1'] ?>, <?= $data['negara2'] ?>,
                </p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      <?php endif ?>
    </div>
  </div>