<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

    <!-- Slider Kecil Start -->
    <div class="container-sm py-4"  style="background-color:#333">
        <div class="container">
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
                
            <?php foreach ($slider_gambar['gambar'] as $gambar) : ?>
            <?php $file_gambar = $slider_gambar['lokasi'] . 'sedang_' . $gambar['gambar']; ?>
            <?php if(is_file($file_gambar)) : ?>
                <div class="testimonial-item bg-light rounded p-4" style="background-image: url(<?php echo base_url().$slider_gambar['lokasi'].'sedang_'.$gambar['gambar']?>); background-size: cover; background-position: center; background-repeat: no-repeat; height: 200px; position: relative;
">
                        <div class="text-center">
                            <p class="mb-0" style="padding-top:100px; color:#FFF; text-shadow: 4px 4px 4px #081828; -webkit-text-stroke: 0.25px #081828;"><?= $gambar['judul'] ?> (<?= $gambar['thn'] ?>)</p>
                            <span></span>
                            <div style="padding-top: 10px;">
                                <a href="<?='film/'.buat_slug($gambar); ?>" title="Trailer"><button class="button btn btn-sm btn-danger">TRAILER</button></a>
                                <a href="<?='film/'.buat_slug($gambar); ?>" title="Movie"><button class="button btn btn-sm btn-warning">MOVIE</button></a>
                            </div>
                        </div>
                </div>
			<?php $active = false; ?>
            <?php endif; ?>
            <?php endforeach; ?>
                
            </div>
        </div>
    </div>
    <!-- Slider Kecil End -->
