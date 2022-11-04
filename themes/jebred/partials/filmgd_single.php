<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script type="text/javascript" src="//cdn.jsdelivr.net/afterglow/latest/afterglow.min.js"></script>

<?php $article = $single_film ?>

<div class="container-xxl py-5">
	<div id="SC_TBlock_876982"></div>
	<div class="container">
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847" crossorigin="anonymous"></script>
		<!-- Jebred H1 -->
		<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1823410826720847" data-ad-slot="9420735733" data-ad-format="auto" data-full-width-responsive="true"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		<div class="row g-5">
			<div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
				<div class="img">
					<?php if ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'kecil_' . $article['gambar'])) : ?>
						<iframe src="https://drive.google.com/file/d/<?= $article['link_gdiframe'] ?>/preview" width="100%" height="550px" allow="autoplay"></iframe>
					<?php endif ?>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<a class="btn btn-sm btn-info" href="<?= site_url('filmhxfile/' . buat_slug($article)) ?>">Server 1</a>
				<a class="btn btn-sm btn-info" href="<?= site_url('filmgd/' . buat_slug($article)) ?>">Server 2</a>
				<a class="btn btn-sm btn-info" href="<?= site_url('filmlk21/' . buat_slug($article)) ?>">Server 3</a>
				<a class="btn btn-sm btn-info" href="<?= site_url('filmacefile/' . buat_slug($article)) ?>">Server 4</a>
				<a class="btn btn-sm btn-info" href="<?= site_url('film/' . buat_slug($article)) ?>">Server 5</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				Jika Server 1 tidak bisa diputar silakan pilih Server lain.
			</div>
		</div>
		<div class="row" style="padding-top: 20px;">
			<div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
				<div class="h-100">
					<h6 class="section-title bg-white text-start text-danger pe-3">FILM <?= strtoupper($article['genre1']) ?> GRATIS</h6>
					<h1 class="display-6 mb-4"><span class="text-primary"><?= $article['judul'] ?> (<?= $article['tahun'] ?>)</span></h1>
					<h5 style="color: rgb(204, 204, 204);">Sinopsis:</h5>
					<p><?= $article['isi'] ?></p>
					<?php for ($i = 1; $i <= 3; $i++) : ?>
						<?php if ($article['gambar' . $i] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $article['gambar' . $i])) : ?>
							<p></p>
						<?php endif ?>
					<?php endfor ?>

					<div class="d-flex align-items-center mb-4 pb-2">

						<div>
							<img class="img-fluid border w-75 p-2 mb-4" src="<?php echo base_url() . $slider_gambar['lokasi'] . 'sedang_' . $article['gambar'] ?>" alt="<?= $article['judul'] ?>" width="100px">
						</div>

						<div class="ps-0">
							<h6 style="color: rgb(204, 204, 204);">Judul: <?= $article['judul'] ?> - <?= $article['tahun'] ?></h6>
							<small>
								Sutradara: <?= $article['sutradara'] ?><br />
								Pemain: <?= $article['artis1'] ?>, <?= $article['artis2'] ?>, <?= $article['artis3'] ?> <br />
								Tahun: <?= $article['tahun'] ?><br />
								Rilis: <?= tgl_indo($article['rilis']) ?><br />
								Ditonton: <?= hit($article['hit']) ?><br />
								Durasi: <?= $article['durasi'] ?><br />
								Negara: <?= $article['negara1'] ?>, <?= $article['negara2'] ?>, <?= $article['negara3'] ?><br />
								Genre: <?= $article['genre1'] ?>, <?= $article['genre2'] ?>, <?= $article['genre3'] ?><br />
								Rating: <?= $article['rating'] ?><br />
								Publish: <?= tgl_indo($article['tgl_upload']) ?><br />
							</small>
							<?php if ($article['kategori']) : ?>
								<small>Kategori: <?= $article['kategori'] ?></small>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row g-5">
			<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
				<h6 class="section-title bg-white text-start text-danger pe-3">KOMENTAR ANDA</h6>
				<ul class="--mt-4 content__list">
					<?php foreach ($komentar as $comment) : ?>
						<li class="--mt-2 --mb-2">
							<span><i class="fa fa-user --mx-2"></i> <?= $comment['owner'] ?></span>
							<p><i class="fa fa-comment-o --mx-2"></i> <?= $comment['komentar'] ?></p>
							<span><i class="fa fa-calendar --mx-2"></i> <?= $comment['tgl_upload'] ?></span>
						</li>
						<hr />
					<?php endforeach ?>
				</ul>


				<?php if (is_array($komentar)) : ?>
					<?php
					$k = array();
					foreach ($komentar as $data) {
						if ($data['is_archived'] != 1) {
							array_push($k, $data);
						}
					}
					?>
					<?php if (count($k) > 0) : ?>
						<div class="py-2 pl-4 bg-light align-middle d-flex align-items-center" style="border-left: 3px solid orange">
							<h4 class="h5 font-weight-bold m-0"><?= count($k) ?> Komentar atas film <?= $single_film["judul"] ?></h4>
						</div>
						<ul class="comment-section">
							<?php foreach ($k as $data) : ?>
								<li class="comment user-comment">
									<div class="info">
										<a href="#!" title="<?= $data['owner'] ?>"><?= $data['owner'] ?></a>
										<span><?= tgl_indo($data['tgl_upload']); ?></span>
									</div>
									<span class="avatar">
										<i class="fa fa-user fa-lg p-2 rounded-circle bg-light"></i>
									</span>
									<p><?= $data['komentar'] ?></p>
								</li>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
				<?php endif ?>

				<div class="form-group group-komentar" id="kolom-komentar">
					<?php if ($single_film['boleh_komentar']) : ?>
						<div class="mb-3 font-weight-bold h6" style="color: rgb(204, 204, 204);"> Silakan tulis komentar, gunakan bahasa yang santun.</div>
						<div class="box box-default shadow-sm border border-info">
							<div class="box-header bg-info text-light py-2 px-3 mb-2">
								<div class="h6 font-weight-bold m-0 py-2"><i class="fa fa-comments"></i> <span class="font-weight-normal">Komentar akan terbit setelah disetujui Admin</span></div>
							</div>

							<!-- Tampilkan hanya jika 'flash_message' ada -->
							<?php $label = !empty($_SESSION['validation_error']) ? 'alert-danger' : 'alert-success'; ?>
							<?php if ($flash_message) : ?>
								<div class="box-header alert <?= $label ?> mx-2 rounded-0"><?= $flash_message ?></div>
								<?php unset($_SESSION['validation_error']); ?>
							<?php endif; ?>
							<div class="box-body py-3 px-3">
								<form id="form-komentar" name="form" action="<?= site_url('first/add_comment/' . $single_film['id']) ?>" method="POST" onSubmit="return validasi(this);">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Nama<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input class="form-control input-sm" type="text" required name="owner" maxlength="30" value="<?= !empty($_SESSION['post']['owner']) ? $_SESSION['post']['owner'] : $_SESSION['nama'] ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">No. HP<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<input class="form-control input-sm" type="text" required placeholder="" name="no_hp" maxlength="30" value="<?= $_SESSION['post']['no_hp']; ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Alamat email</label>
										<div class="col-lg-9">
											<input class="form-control input-sm" type="text" placeholder="" name="email" maxlength="30" value="<?= $_SESSION['post']['email']; ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Komentar<span class="text-danger">*</span></label>
										<div class="col-lg-9">
											<textarea class="form-control input-sm" required name="komentar"><?= $_SESSION['post']['komentar'] ?></textarea>
										</div>
									</div>
									<div class="row">
										<div class="offset-lg-3 col-lg-9">
											<img id="captcha" src="<?= base_url('securimage/securimage_show.php') ?>" alt="CAPTCHA Image" / class="img-fluid border border-black">
										</div>
									</div>
									<div class="row mb-2">
										<div class="offset-lg-3 col-lg-9">
											<a href="#!" onclick="document.getElementById('captcha').src = '<?= base_url("securimage/securimage_show.php?") ?>'+Math.random(); return false"><small>[ Ganti Gambar ]</small></a>
										</div>
									</div>
									<div class="row">
										<div class="offset-lg-3 col-lg-9">
											<input class="form-control input-sm" type="text" required name="captcha_code" maxlength="6" value="<?= $_SESSION['post']['captcha_code'] ?>" />
											<span class="d-block">
												Isikan kode di gambar
											</span>
										</div>
									</div>
									<div class="row">
										<div class="offset-lg-3 mt-3 col-lg-10">
											<button class="btn btn-info btn-md" type="submit"><i class="fa fa-paper-plane"></i> KIRIM KOMENTAR</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					<?php else : ?>
						<span class="d-block alert alert-warning px-2 py-3"><i class="fa fa-exclamation-triangle pl-1 pr-2"></i> Komentar untuk film ini telah ditutup.</span>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
				<div class="h-100">
					<h6 class="section-title bg-white text-start text-danger pe-3">REKOMENDASI FILM SEJENIS</h6>
					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847" crossorigin="anonymous"></script>
					<ins class="adsbygoogle" style="display:block" data-ad-format="autorelaxed" data-ad-client="ca-pub-1823410826720847" data-ad-slot="1153031774"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
					<?php $this->load->view($folder_themes . '/widgets/arsip_film') ?>

				</div>
			</div>
		</div>
	</div>
</div>