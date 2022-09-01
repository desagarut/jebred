<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h5>Identitas
      <?= $desa; ?>
    </h4>
    <ol class="breadcrumb">
      <li class="breadcrumb">Pengelolaan Pembangunan <?= ucwords($this->setting->sebutan_desa) ?> <?= $desa["nama_desa"]; ?></h4>
    <ol class="breadcrumb">
      <li class="breadcrumb"><a href="<?= site_url('beranda') ?>"><i class="feather icon-home"></i></a></li>
						<li class="breadcrumb-item active"><a href="#!">Pembangunan</a></li>
						<li class="breadcrumb-item active"><a href="#!">Daftar Pembangunan</a></li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
  <section class="content" id="maincontent">

		<div class="card">
			<form id="mainformexcel" name="mainformexcel" method="post" class="form-horizontal">
				<div class="row">
					<div class="col-md-12">
						<div class="card-header">
							<div class="col-md-12">
								<div class="row">
									<a href="<?= site_url('pembangunan/form') ?>" class="btn btn-icon btn-success btn-sm mb-2 mr-2" title="Tambah Data Baru"><i class="feather icon-plus"></i> </a>
									<div class="col-md-3">
										<select class="form-control input-sm" id="tahun" name="tahun" style="width:100%;">
											<option selected value="semua">Semua Tahun</option>
											<?php foreach ($list_tahun as $list) : ?>
												<option value="<?= $list->tahun_anggaran ?>"><?= $list->tahun_anggaran ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="table-responsive">
										<table id="tabel-pembangunan" class="table dataTable table-hover">
											<thead class="bg-gray">
												<tr>
													<th class="text-center">No</th>
													<th width="230px" class="text-center">Aksi</th>
													<th class="text-center">Nama Kegiatan</th>
													<th class="text-center">Sumber Dana</th>
													<th class="text-center">Anggaran</th>
													<th class="text-center">Persentase</th>
													<th class="text-center">Volume</th>
													<th class="text-center">Tahun</th>
													<th class="text-center">Pelaksana</th>
													<th class="text-center">Lokasi</th>
													<th class="text-center">Gambar</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
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


<script>
	$(document).ready(function() {
		let tabelPembangunan = $('#tabel-pembangunan').DataTable({
			'processing': true,
			'serverSide': true,
			'autoWidth': false,
			'pageLength': 10,
			'order': [
				[7, 'desc'],
			],
			'columnDefs': [{
				'orderable': false,
				'targets': [0, 1, 10],
			}],
			'ajax': {
				'url': "<?= site_url('pembangunan') ?>",
				'method': 'POST',
				'data': function(d) {
					d.tahun = $('#tahun').val();
				}
			},
			'columns': [{
					'data': null,
				},
				{
					'data': function(data) {
						let status;
						if (data.status == 1) {
							status = `<a href="<?= site_url('pembangunan/lock/') ?>${data.id}" class="btn btn-icon btn-success btn-sm mb-2 mr-2" title="Non Aktifkan Pembangunan"><i class="feather icon-unlock"></i></a>`
						} else {
							status = `<a href="<?= site_url('pembangunan/unlock/') ?>${data.id}" class="btn btn-icon btn-secondary btn-sm mb-2 mr-2" title="Aktifkan Pembangunan"><i class="feather icon-lock"></i></a>`
						}

						return `
						<div class="btn-group mb-2 mr-2">
						<a href="<?= site_url('pembangunan/info_pembangunan/'); ?>${data.id}" target="_blank" title="Lihat Pembangunan"><button type="button" class="btn btn-success">Lihat</button></a>
							<button type="button" class="btn  btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?= site_url('pembangunan/form/'); ?>${data.id}">Edit Data</a>
								<a class="dropdown-item" href="<?= site_url('pembangunan/lokasi_maps/'); ?>${data.id}">Peta lokasi</a>
								<a class="dropdown-item" href="<?= site_url('pembangunan_dokumentasi/show/'); ?>${data.id}">Tahap Pelaksanaan</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-href="<?= site_url('pembangunan/delete/'); ?>${data.id}" data-toggle="modal" data-target="#confirm-delete"">Hapus</a>
							</div>
						</div>
							${status}
							`
					}
				},
				{
					'data': 'judul'
				},
				{
					'data': 'sumber_dana'
				},
				{
					'data': 'anggaran',
					'render': $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
				},
				{
					'data': 'max_persentase'
				},
				{
					'data': 'volume'
				},
				{
					'data': 'tahun_anggaran'
				},
				{
					'data': 'pelaksana_kegiatan'
				},
				{
					'data': 'alamat'
				},
				{
					'data': function(data) {
						return `<div class="user-panel">
									<div class="image2">
										<img src="<?= base_url(LOKASI_GALERI) ?>${data.foto}" class="img-user wid-80 align-top m-r-15" alt="Gambar Dokumentasi">
									</div>
								</div>`
					}
				},
			],
			'language': {
				'url': "<?= base_url('/assets/bootstrap/js/dataTables.indonesian.lang') ?>"
			}
		});

		tabelPembangunan.on('draw.dt', function() {
			let PageInfo = $('#tabel-pembangunan').DataTable().page.info();
			tabelPembangunan.column(0, {
				page: 'current'
			}).nodes().each(function(cell, i) {
				cell.innerHTML = i + 1 + PageInfo.start;
			});
		});

		$('#tahun').on('select2:select', function(e) {
			tabelPembangunan.ajax.reload();
		});
	});
</script>

