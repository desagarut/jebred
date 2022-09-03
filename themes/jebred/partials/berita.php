<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

    <!-- Project Start -->

    
    <div class="container-xxl py-2 data-wow-delay="0.1s"">
        <div class="container">
            <!--<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="section-title bg-white text-center text-danger px-3">Terbaru</h6>
            </div>-->
            <div class="col-md-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row">
            
			  <?php if($artikel) : ?>
              <?php foreach($artikel as $article) : ?>
              <?php $data['article'] = $article ?>
              <?php $url = site_url('artikel/'.buat_slug($article)) ?>
              <?php $abstract = potong_teks(strip_tags($article['isi']), 200) ?>
              <?php $image = ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$article['gambar'])) ? 
                                AmbilFotoArtikel($article['gambar'],'sedang') : 
                                base_url($this->theme_folder.'/'.$this->theme .'/assets/img/placeholder.png');?>
                <div class="col-sm-2 project-item rounded h-100 p-2 sm-2" data-dot="">
                    <div class="position-relative mb-4">
                        <img class="img-fluid rounded" src="<?= $image ?>" alt="">
                        <a href="<?= $image ?>" data-lightbox="project"><i class="fa fa-play fa-2x"></i></a>
                    </div>
                    <h6><?= $article['judul'] ?> <?= $article['tahun']; ?></h6>
                    <span>
                    	<small>
						<?= tgl_indo($article['tgl_upload']) ?><br/>
                        Ditonton: <?= hit($article['hit']) ?><br/>
                    	<?= $article['negara'] ?><br/><?= $article['owner'] ?><br/>
                        <?= $article['kategori'] ?>
                        </small><br/>
                        <button onClick="trailer();" class="button btn btn-sm btn-success">TRAILER</button>
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

<script>
function trailer(url){
    var x = window.open('<?='artikel/'.buat_slug($gambar); ?>','_blank');
    x.focus();
}
function movies(url){
    var x = window.open('http://www.dumetschool.com','_blank');
    x.focus();
}

</script>