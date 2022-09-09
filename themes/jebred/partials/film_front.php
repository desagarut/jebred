<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

    <!-- Project Start -->

    
    <div class="container-xxl py-2" data-wow-delay="0.1s">
        <div class="container">
            <!--<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-danger px-3">Terbaru</h6>
            </div>-->
            <div class="col-md-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row">
            
			  <?php if($film) : ?>
              <?php foreach($film as $article) : ?>
              <?php $data['article'] = $article ?>
              <?php $url = site_url('film/'.buat_slug($article)) ?>
              <?php $abstract = potong_teks(strip_tags($article['isi']), 200) ?>
              <?php $image = ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$article['gambar'])) ? 
                                AmbilFotoArtikel($article['gambar'],'sedang') : 
                                base_url($this->theme_folder.'/'.$this->theme .'/assets/img/placeholder.png');?>
                
                <div class="col-sm-2 h-100 p-2 sm-2">
                    <div class="position-relative mb-4">
                    <a href="<?= $url ?>">
                        <img class="img-fluid border w-75 p-2 mb-4" src="<?= $image ?>" alt="<?= $article['judul'] ?>">
                    </a>
                        <div style="padding-top: -100px;">
                            <a class="btn btn-sm btn-danger" href="<?= $url ?>">Trailer</a>
                            <a class="btn btn-sm btn-warning" href="<?= $url ?>">Movie</a>
                        </div>
                    </div>
                    <h5 style="color: rgb(204, 204, 204);">
                        <a href="<?= $url ?>"><?= $article['judul'] ?> (<?= $article['tahun']; ?>)</a>
                    </h5>
                    <span>
                    	<small>
						<?= tgl_indo($article['tgl_upload']) ?><br/>
                        Ditonton: <?= hit($article['hit']) ?><br/>
                    	Negara: <?= $article['negara1'] ?>, <?= $article['negara2'] ?><br/>
                    	Genre: <?= $article['genre1'] ?>, <?= $article['genre2'] ?>, <?= $article['genre3'] ?><br/>
                        Kategori: <?= $article['kategori'] ?>
                        </small><br/>
					</span>
                </div>
                
			  <?php endforeach ?>
              <?php endif ?>
              <?php //$this->load->view($folder_themes .'/main/paging') ?>
                
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->

