<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link <?php ($jenis == 'terkini') and print('active') ?>" id="terkini-tab" data-bs-toggle="tab" data-bs-target="#terkini" type="button" role="tab" aria-controls="terkini" aria-selected="true">Terbaru</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="populer-tab" data-bs-toggle="tab" data-bs-target="#populer" type="button" role="tab" aria-controls="populer" aria-selected="false">Populer</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="acak-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="acak" aria-selected="false">Acak</button>
	</li>
</ul>

<div class="tab-content">
	<?php foreach (array('terkini' => 'arsip_terkini', 'populer' => 'arsip_populer', 'acak' => 'arsip_acak') as $jenis => $jenis_arsip) : ?>
		<div class="tab-pane <?php ($jenis == 'terkini') and print('active') ?>" id="<?= $jenis ?>" role="tabpanel" aria-labelledby="<?= $jenis ?>-tab">
			<table id="ul-menu">
				<?php foreach ($$jenis_arsip as $arsip) : ?>
					<tr>
						<td valign="top" align="justify">
							<a href="<?= site_url('film/' . buat_slug($arsip)) ?>">
								<?php if (is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $arsip[gambar])) : ?>
									<img width="15%" style="float:left; margin:0 8px 4px 0;" class="img-fluid img-thumbnail" src="<?= base_url(LOKASI_FOTO_ARTIKEL . 'sedang_' . $arsip[gambar]) ?>" />
								<?php else : ?>
									<img width="15%" style="float:left; margin:0 8px 4px 0;" class="img-fluid img-thumbnail" src="<?= base_url('assets/images/404-image-not-found.jpg') ?>" />
								<?php endif; ?>
								<small>
									<font color="yellow"><?= $arsip['judul'] ?></font><br/>
									Ditonton: <?= hit($arsip['hit']); ?><br/>
									<!--Tanggal Upload: <?= tgl_indo($arsip['tgl_upload']); ?><br/>
									Kategori:  <?= $arsip['kategori']; ?>
									Genre:  <?= $arsip['kategori']; ?>
									Negara:  <?= $arsip['kategori']; ?>-->

								</small>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	<?php endforeach ?>
</div>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:inline-block;width:360px;height:800px"
     data-ad-client="ca-pub-1823410826720847"
     data-ad-slot="2492499723"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

<script>
	var firstTabEl = document.querySelector('#myTab li:last-child a')
	var firstTab = new bootstrap.Tab(firstTabEl)

	firstTab.show()
</script>
