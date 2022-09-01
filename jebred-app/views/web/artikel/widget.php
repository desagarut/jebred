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
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h5>Pengaturan Widget</h5>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
						<li class="breadcrumb-item"><a href="#!">Web</a></li>
						<li class="breadcrumb-item active"><a href="#!">Pengaturan Widget</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<form id="mainform" name="mainform" action="" method="post">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<a href="<?= site_url("web_widget/form") ?>" class="btn btn-box btn-success btn-sm btn-sm " title="Tambah Artikel">
									<i class="fa fa-plus"></i> Tambah Widget
								</a>
								<?php if ($this->CI->cek_hak_akses('h')) : ?>
									<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("web_widget/delete_all/$p/$o") ?>')" class="btn btn-box btn-danger btn-sm  hapus-terpilih"><i class='fa fa-trash'></i> Hapus Data Terpilih</a>
								<?php endif; ?>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<div class="table-responsive">
											<form id="mainform" name="mainform" action="" method="post">
												<div class="row">
													<div class="col-sm-6">
														<select class="form-control input-sm " name="filter" onchange="formAction('mainform', '<?= site_url('web_widget/filter/filter') ?>')">
															<option value="">Semua</option>
															<option value="1" <?php selected($filter, 1); ?>>Aktif</option>
															<option value="2" <?php selected($filter, 2); ?>>Tidak Aktif</option>
														</select>
													</div>
													<div class="col-sm-6">
														<div class="box-tools">
															<div class="input-group input-group-sm pull-right">
																<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?= html_escape($cari) ?>" onkeypress="if (event.keyCode == 13):$('#'+'mainform').attr('action', '<?= site_url('web_widget/filter/cari') ?>');$('#'+'mainform').submit();endif">
																<div class="input-group-btn">
																	<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("web_widget/filter/cari") ?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="table-responsive">
															<table class="table dataTable table-hover">
																<thead>
																	<tr>
																		<th><input type="checkbox" id="checkall" /></th>
																		<th>No</th>
																		<th>Aksi</th>
																		<th nowrap>Judul</th>
																		<th nowrap>Jenis Widget</th>
																		<th>Aktif</th>
																		<th>Isi</th>
																	</tr>
																</thead>
																<tbody>
																	<?php foreach ($main as $data) : ?>
																		<tr <?php if ($data['jenis_widget'] != 1) : ?>style='background-color:#f8deb5 !important;' <?php endif; ?>>
																			<td width="1%"><input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>" /></td>
																			<td width="1%"><?= $data['no'] ?></td>
																			<td width="5%" nowrap>
																				<a href="<?= site_url("web_widget/urut/$data[id]/1") ?>" class="btn bg-olive btn-box btn-sm" title="Pindah Posisi Ke Bawah"><i class="fa fa-arrow-down"></i></a>
																				<a href="<?= site_url("web_widget/urut/$data[id]/2") ?>" class="btn bg-olive btn-box btn-sm" title="Pindah Posisi Ke Atas"><i class="fa fa-arrow-up"></i></a>
																				<?php if ($data['jenis_widget'] != 1) : ?>
																					<a href="<?= site_url("web_widget/form/$p/$o/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
																				<?php endif; ?>
																				<?php if ($data['form_admin']) : ?>
																					<a href="<?= site_url("$data[form_admin]") ?>" class="btn btn-info btn-box btn-sm" title="Form Admin"><i class="fa fa-flag" aria-hidden="true"></i></a>
																				<?php endif; ?>
																				<?php if ($data['enabled'] == '2') : ?>
																					<a href="<?= site_url("web_widget/lock/$data[id]") ?>" class="btn bg-navy btn-box btn-sm" title="Aktifkan Widget"><i class="fa fa-lock">&nbsp;</i></a>
																				<?php elseif ($data['enabled'] == '1') : ?>
																					<a href="<?= site_url("web_widget/unlock/$data[id]") ?>" class="btn bg-navy btn-box btn-sm" title="Non Aktifkan Widget"><i class="fa fa-unlock"></i></a>
																				<?php endif; ?>
																				<?php if ($this->CI->cek_hak_akses('h')) : ?>
																					<?php if ($data['jenis_widget'] != 1) : ?>
																						<a href="#" data-href="<?= site_url("web_widget/delete/$p/$o/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
																					<?php endif; ?>
																				<?php endif; ?>
																			</td>
																			<td nowrap><?= $data['judul'] ?></td>
																			<td>
																				<?php if ($data['jenis_widget'] == 1) : ?>
																					Sistem
																				<?php elseif ($data['jenis_widget'] == 2) : ?>
																					Statis
																				<?php else : ?>
																					Dinamis
																				<?php endif; ?>
																			</td>
																			<td><?= $data['aktif'] ?></td>
																			<td><?= $data['isi'] ?></td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</form>
											<?php $this->load->view('global/paging'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete'); ?>