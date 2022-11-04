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
									Dilihat: <?= hit($arsip['hit']); ?><br/>
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

<script>
	var firstTabEl = document.querySelector('#myTab li:last-child a')
	var firstTab = new bootstrap.Tab(firstTabEl)

	firstTab.show()
</script>

<!--
<div class="single_bottom_rightbar">
	<ul role="tablist" class="nav nav-tabs custom-tabs">
		<li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="home" href="#terkini">Terbaru</a></li>
		<li role="presentation"><a data-toggle="tab" role="tab" aria-controls="messages" href="#populer">Populer</a></li>
		<li role="presentation"><a data-toggle="tab" role="tab" aria-controls="messages" href="#acak">Acak</a></li>
	</ul>
	<div class="tab-content">
		<?php foreach (array('terkini' => 'arsip_terkini', 'populer' => 'arsip_populer', 'acak' => 'arsip_acak') as $jenis => $jenis_arsip) : ?>
			<div id="<?= $jenis ?>" class="tab-pane fade in <?php ($jenis == 'terkini') and print('active') ?>" role="tabpanel">
				<table id="ul-menu">
					<?php foreach ($$jenis_arsip as $arsip) : ?>
						<tr>
							<td colspan="2">
								<span class="meta_date"><?= tgl_indo($arsip['tgl_upload']); ?> | <i class="fa fa-eye"></i> <?= hit($arsip['hit']); ?></span>
							</td>
						</tr>
						<tr>
							<td valign="top" align="justify">
								<a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>">
									<?php if (is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $arsip[gambar])) : ?>
										<img width="25%" style="float:left; margin:0 8px 4px 0;" class="img-fluid img-thumbnail" src="<?= base_url(LOKASI_FOTO_ARTIKEL . 'sedang_' . $arsip[gambar]) ?>" />
									<?php else : ?>
										<img width="25%" style="float:left; margin:0 8px 4px 0;" class="img-fluid img-thumbnail" src="<?= base_url('assets/images/404-image-not-found.jpg') ?>" />
									<?php endif; ?>
									<small>
										<font color="green"><?= $arsip['judul'] ?></font>
									</small>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		<?php endforeach ?>
	</div>
</div>-->