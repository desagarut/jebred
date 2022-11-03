<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container">
	<?php foreach ($teks_berjalan AS $teks): ?>
	<marquee style="">
		<?= $teks['teks']?>
		<?php if ($teks['tautan']): ?>
			<a href="<?= $teks['tautan'] ?>" title="Baca Selengkapnya"><?= $teks['judul_tautan']?></a>
		<?php endif; ?>
	</marquee>
	</div>
<?php endforeach; ?>
