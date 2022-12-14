<script>
	$(function() {
		var keyword = <?= $keyword ?>;
		$("#cari").autocomplete({
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h3>Blog :
						<?= $kategori['kategori']; ?>
					</h3>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
						<li class="breadcrumb-item"><a href="#!">Web Blog</a></li>
						<li class="breadcrumb-item active">Artikel</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<?php $this->load->view('web_blog/artikel/menu'); ?>
				</div>
				<div class="col-md-9">
					<form id="mainform" name="mainform" action="" method="post">
						<div class="card">

							<div class="box box-info">
								<div class="box-header with-border">
									<?php if ($this->CI->cek_hak_akses('h')) : ?>
										<?php if ($cat > 0) : ?>
											<a href="<?= site_url("web_blog/form") ?>" class="btn btn-social btn-box btn-success btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Artikel">
												<i class="fa fa-plus"></i>Tambah
												<?php if ($kategori) : ?>
													<?= $kategori['kategori']; ?>
												<?php elseif ($cat == 1000) : ?>
													Agenda
												<?php elseif ($cat == 1001) : ?>
													Artikel Keuangan
												<?php else : ?>
													Artikel Statis
												<?php endif; ?> Baru
											</a>
										<?php endif; ?>

										<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("web_blog/delete_all") ?>')" class="btn btn-social btn-box btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i class='fa fa-trash-o'></i> Hapus Data Terpilih</a>

										<?php if ($cat > 0 and $cat < 999) : ?>
											<a href="#confirm-delete" title="Hapus Kategori <?= $kategori['kategori'] ?>" onclick="deleteAllBox('mainform', '<?= site_url("web_blog/hapus") ?>')" class="btn btn-social btn-box btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class='fa fa-trash-o'></i> Hapus Kategori <?= $kategori['kategori'] ?></a>
										<?php endif; ?>
										<?php if ($cat == 999) : ?>
											<a href="<?= site_url("web_blog/reset") ?>" class="btn btn-social btn-box bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Reset Hit" data-toggle="modal" data-target="#reset-hit" data-remote="false"><i class="fa fa-spinner"></i> Reset Hit</a>
										<?php endif; ?>
									<?php endif; ?>
								</div>
								<div class="box-body">
									<div class="row">
										<div class="col-sm-12">
											<div class="dataTables_wrapper form-inline dt-bootstrap ">
												<form id="mainform" name="mainform" action="" method="post">
													<div class="card">
														<div class="card-header">
															<div class="row">
																<div class="col-sm-3">
																	<select class="form-control input-sm " name="status" onchange="formAction('mainform', '<?= site_url("web_blog/filter/status/$cat") ?>')">
																		<option value="">Semua Artikel</option>
																		<option value="1" <?php selected($status, 1); ?>>Aktif</option>
																		<option value="2" <?php selected($status, 2); ?>>Tidak Aktif</option>
																	</select>
																</div>
																<div class="col-sm-6">
																	<div class="box-tools">
																		<div class="input-group input-group-sm pull-right">
																			<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?= html_escape($cari) ?>" onkeypress="if (event.keyCode == 13):$('#'+'mainform').attr('action', '<?= site_url('web_blog/filter/cari/$cat') ?>');$('#'+'mainform').submit();endif">
																			<div class="input-group-btn">
																				<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("web_blog/filter/cari/$cat") ?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="card-body table-responsive p-0">
															<table class="table table-hover text-nowrap">
																<thead>
																	<tr>
																		<th><input type="checkbox" id="checkall" /></th>
																		<th>No</th>
																		<th>Aksi</th>
																		<?php if ($o == 2) : ?>
																			<th width="50%"><a href="<?= site_url("web_blog/index/$p/1") ?>">Judul <i class='fa fa-sort-asc fa-sm'></i></a></th>
																		<?php elseif ($o == 1) : ?>
																			<th width="50%"><a href="<?= site_url("web_blog/index/$p/2") ?>">Judul <i class='fa fa-sort-desc fa-sm'></i></a></th>
																		<?php else : ?>
																			<th width="50%"><a href="<?= site_url("web_blog/index/$p/1") ?>">Judul <i class='fa fa-sort fa-sm'></i></a></th>
																		<?php endif; ?>
																		<?php if ($o == 4) : ?>
																			<th nowrap><a href="<?= site_url("web_blog/index/$p/3") ?>">Hit <i class='fa fa-sort-asc fa-sm'></i></a></th>
																		<?php elseif ($o == 3) : ?>
																			<th nowrap><a href="<?= site_url("web_blog/index/$p/4") ?>">Hit <i class='fa fa-sort-desc fa-sm'></i></a></th>
																		<?php else : ?>
																			<th nowrap><a href="<?= site_url("web_blog/index/$p/3") ?>">Hit <i class='fa fa-sort fa-sm'></i></a></th>
																		<?php endif; ?>
																		<?php if ($o == 6) : ?>
																			<th nowrap><a href="<?= site_url("web_blog/index/$p/5") ?>">Diposting Pada <i class='fa fa-sort-asc fa-sm'></i></a></th>
																		<?php elseif ($o == 5) : ?>
																			<th nowrap><a href="<?= site_url("web_blog/index/$p/6") ?>">Diposting Pada <i class='fa fa-sort-desc fa-sm'></i></a></th>
																		<?php else : ?>
																			<th nowrap><a href="<?= site_url("web_blog/index/$p/5") ?>">Diposting Pada <i class='fa fa-sort fa-sm'></i></a></th>
																		<?php endif; ?>
																	</tr>
																</thead>
																<tbody>
																	<?php foreach ($main as $data) : ?>
																		<tr>
																			<td class="padat"><input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>" <?php $data['boleh_ubah'] or print('disabled') ?> /></td>
																			<td class="padat"><?= $data['no'] ?></td>
																			<td class="aksi">
																				<?php if ($data['boleh_ubah']) : ?>
																					<?php if ($this->CI->cek_hak_akses('u')) : ?>
																						<a href="<?= site_url("web_blog/form/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
																						<a href="#" data-href="<?= site_url("web_blog/delete/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
																						<a href="<?= site_url("web_blog/ubah_kategori_form/$data[id]") ?>" class="btn bg-purple btn-box btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Kategori" title="Ubah Kategori"><i class="fa fa-folder-open"></i></a>
																					<?php endif; ?>
																					<?php if ($data['boleh_komentar'] == 1) : ?>
																						<a href="<?= site_url("web_blog/komentar_lock/$data[id]/2") ?>" class="btn bg-info btn-box btn-sm" title="Tutup Komentar Artikel"><i class="fa fa-comments"></i></a>
																					<?php else : ?>
																						<a href="<?= site_url("web_blog/komentar_lock/$data[id]/1") ?>" class="btn bg-info btn-box btn-sm" title="Buka Komentar Artikel"><i class="fa fa-comments"></i></i></a>
																					<?php endif ?>
																					<?php if ($data['enabled'] == '1') : ?>
																						<a href="<?= site_url("web_blog/artikel_lock/$data[id]/2"); ?>" class="btn bg-navy btn-box btn-sm" title="Non Aktifkan Artikel"><i class="fa fa-lock-open"></i></a>
																						<a href="<?= site_url("web_blog/headline/$data[id]") ?>" class="btn bg-teal btn-box btn-sm" title="Jadikan Headline">
																							<i class="<?= ($data['headline'] == 1) ? 'fa fa-star-half' : 'fa fa-star' ?>"></i>
																						</a>
																						<a href="<?= site_url("web_blog/slide/$data[id]"); ?>" class="btn bg-gray btn-box btn-sm" title="<?= ($data['headline'] == 3) ? 'Keluarkan dari slide' : 'Masukkan ke dalam slide' ?>">
																							<i class="<?= ($data['headline'] == 3) ? 'fa fa-pause' : 'fa fa-play' ?>"></i>
																						</a>
																					<?php else : ?>
																						<a href="<?= site_url("web_blog/artikel_lock/$data[id]/1"); ?>" class="btn bg-navy btn-box btn-sm" title="Aktifkan Artikel"><i class="fa fa-lock"></i></a>
																					<?php endif ?>
																				<?php endif; ?>
																				<a href="<?= site_url('artikel/' . buat_slug($data)); ?>" target="_blank" class="btn bg-green btn-box btn-sm" title="Lihat Artikel"><i class="fa fa-eye"></i></a>
																			</td>
																			<td><?= $data['judul'] ?></td>
																			<td nowrap><?= hit($data['hit']) ?></td>
																			<td nowrap><?= tgl_indo2($data['tgl_upload']) ?></td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
														<div class="card-footer">
														<?php $this->load->view('global/paging'); ?>

														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('global/confirm_delete'); ?>

<form action="<?= site_url("web_blog/reset") ?>" method="post">
	<div class='modal fade' id='reset-hit' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title' id='myModalLabel'></i> Reset Hit</h4>
				</div>
				<div class='modal-body'>
					<div class="form-group">
						<code>Lakukan hapus hit ini jika artikel statis di menu atas website anda terkena kunjungan tak terduga, seperti robot(crawler), yang berlebihan. </code><br><br>
						<label for="hit">Reset Hit</label>
						<select class="form-control input-sm" required name="hit" width="100%">
							<option value="">Pilih persen hit yang akan dihapus</option>
							<?php for ($i = 1; $i <= 10; $i++) : ?>
								<option value="<?= ($i * 10) ?>"><?= ($i * 10) . '%' ?></option>
							<?php endfor; ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-social btn-box btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
					<button type="submit" class="btn btn-social btn-box btn-info btn-sm"><i class='fa fa-check'></i> Simpan</button>
				</div>
			</div>
		</div>
	</div>
</form>