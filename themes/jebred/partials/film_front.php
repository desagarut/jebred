<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- Team Start -->

<div class="container-xxl py-2">
  <div class="container">
    <div id="SC_TBlock_876982"></div>
    <div class="text-center mx-auto mb-1 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
      <h6 class="section-title bg-white text-center text-danger px-3">FILM TERBARU</h6>
    </div>
    <div class="row g-4">
      <div class="col-lg-2 col-md-2 col-sm-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="team-item text-center p-1"> 
          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847"
                    crossorigin="anonymous"></script> 
          <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-format="fluid"
                    data-ad-layout-key="-x+s8-19-44+c7"
                    data-ad-client="ca-pub-1823410826720847"
                    data-ad-slot="9571148667"></ins> 
          <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script> 
        </div>
      </div>
      <?php if($film) : ?>
      <?php foreach($film as $article) : ?>
      <?php $data['article'] = $article ?>
      <?php $url = site_url('film/'.buat_slug($article)) ?>
      <?php $abstract = potong_teks(strip_tags($article['isi']), 200) ?>
      <?php $image = ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$article['gambar'])) ? 
                            AmbilFotoArtikel($article['gambar'],'sedang') : 
                            base_url($this->theme_folder.'/'.$this->theme .'/assets/img/placeholder.png');?>
      <div class="col-md-2 col-sm-2 wow fadeInUp" data-wow-delay="0.1s">
        <div class="team-item text-center p-1"> <a href="<?= $url ?>"> <img class="img-fluid " src="<?= $image ?>" alt="<?= $article['judul'] ?>"> </a>
          <div class="team-text">
            <div class="team-title">
              <h7 style="color: rgb(204, 204, 204)">
                <?= $article['judul'] ?>
              </h7>
              <span>
              <?= $article['tahun'] ?>
              </span> </div>
            <div class="team-social" style="background-color: transparent;">
              <a class="btn btn-sm btn-danger" href="<?= $url ?>">Trailer</a> 
              <a class="btn btn-sm btn-warning" href="<?= $url ?>">Movie</a> </div>
          </div>
        </div>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847"
                    crossorigin="anonymous"></script> 
        <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-format="fluid"
                    data-ad-layout-key="-x+s8-19-44+c7"
                    data-ad-client="ca-pub-1823410826720847"
                    data-ad-slot="9571148667"></ins> 
        <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script> 
      </div>
      <?php endforeach ?>
      <?php endif ?>
    </div>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847"
     crossorigin="anonymous"></script> 
  </div>
</div>
