<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container">
	<div class="col-md-12 wow fadeInUp" data-wow-delay="0.1s"">
	<?php foreach ($teks_berjalan as $teks) : ?>
		<marquee style="padding:10px 10px 10px 10px">
			<?= $teks['teks'] ?>
			<?php if ($teks['tautan']) : ?>
				<a href="<?= $teks['tautan'] ?>" title="Baca Selengkapnya"><?= $teks['judul_tautan'] ?></a>
			<?php endif; ?>
		</marquee>
	<?php endforeach; ?>
	</div>
</div>