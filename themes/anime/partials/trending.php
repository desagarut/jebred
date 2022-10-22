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
      <?php if($film) : ?>
      <?php foreach($film as $article) : ?>
      <?php $data['article'] = $article ?>
      <?php $url = site_url('film/'.buat_slug($article)) ?>
      <?php $abstract = potong_teks(strip_tags($article['isi']), 200) ?>
      <?php $image = ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$article['gambar'])) ? 
                            AmbilFotoArtikel($article['gambar'],'sedang') : 
                            base_url($this->theme_folder.'/'.$this->theme .'/assets/img/placeholder.png');?>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="product__item">
          <div class="product__item__pic set-bg" data-setbg="<?= $image ?>" alt="<?= $article['judul'] ?>">
            <div class="ep"><?= $article['rating'] ?></div>
            <div class="comment"><i class="fa fa-comments"></i> <?= $article['komentar'] ?></div>
            <div class="view"><i class="fa fa-eye"></i>
              <?= $article['hit'] ?>
            </div>
          </div>
          <div class="product__item__text">
            <ul>
              <li><a class="btn btn-sm btn-danger" href="<?= $url ?>">Trailer</a></li>
              <li><a class="btn btn-sm btn-warning" href="<?= $url ?>">Movie</a></li>
            </ul>
            <h5><a href="#">
              <?= $article['judul'] ?>
              </a></h5>
          </div>
        </div>
      </div>
      <?php endforeach ?>
      <?php endif ?>
    </div>
  </div>
