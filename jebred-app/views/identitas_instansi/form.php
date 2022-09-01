<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">Form Profil Web</h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
						<li class="breadcrumb-item active"><a href="<?= site_url() ?>identitas_instansi">Profil Web</a></li>
						<li class="breadcrumb-item active"><a href="#!">Form</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-xl-12 col-md-12">
				<form id="mainform" action="<?= $form_action; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal" id="validasi">
					<div class="row">
						<div class="col-lg-3 col-md-12">
							<div class="card">
								<div class="card-body">
									<img class="img-fluid card-img-top" src="<?= logo_web($main['logo']); ?>" alt="Logo">
									<br />
									<p class="text-center text-bold">Logo</p>
									<p class="text-muted text-center text-red">(Kosongkan, jika logo tidak berubah)</p>
									<br />
									<div class="input-group input-group-sm">
										<input type="text" class="form-control" id="file_path">
										<input type="file" class="hidden" id="file" name="logo">
										<input type="hidden" name="old_logo" value="<?= $main['logo']; ?>">
										<span class="input-group-btn">
											<button type="button" class="btn btn-info btn-box" id="file_browser"><i class="fa fa-search"></i> Browse</button>
										</span>
									</div>
								</div>
							</div>
							<!--<div class="card">
								<div class="card-body">
									<img class="img-fluid card-img-top" src="<?= logo_web($main['kantor_kecamatan'], TRUE); ?>" alt="Kantor <?= $kecamatan; ?>">
									<br />
									<p class="text-center text-bold">Kantor <?= $kecamatan; ?></p>
									<p class="text-muted text-center text-red">(Kosongkan, jika kantor <?= $kecamatan; ?> tidak berubah)</p>
									<br />
									<div class="input-group input-group-sm">
										<input type="text" class="form-control" id="file_path2">
										<input type="file" class="hidden" id="file2" name="kantor_desa">
										<input type="hidden" name="old_kantor_kecamatan" value="<?= $main['kantor_kecamatan']; ?>">
										<span class="input-group-btn">
											<button type="button" class="btn btn-info btn-box" id="file_browser2"><i class="fa fa-search"></i> Browse</button>
										</span>
									</div>
								</div>-->
						</div>
						<div class="col-lg-9 col-md-12">

							<div class="card">
								<div class="card-header text-right">
									<a href="<?= site_url('identitas_instansi'); ?>" class="btn btn-info " title="Kembali Ke Data <?= $kecamatan; ?>"><i class='feather mr-2 icon-skip-back'></i> Kembali </a>
									<button type='reset' class='btn btn-danger'><i class='feather mr-2 icon-x'></i> Batal</button>
									<button type='submit' class='btn btn-success'><i class='feather mr-2 icon-check'></i> Simpan</button>

								</div>
								<div class="card-body">
									<div class="form-group row">
										<label class="col-sm-3 col-form-label" for="nama">Nama Website</label>
										<div class="col-sm-9">
											<input id="nama_kecamatan" name="nama_kecamatan" class="form-control input-sm nama_terbatas required" maxlength="50" type="text" placeholder="Nama " value="<?= $main["nama_kecamatan"]; ?>"></input>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label" for="kode_desa">Nomor Website</label>
										<div class="col-sm-2">
											<input id="kode_kecamatan" name="kode_kecamatan" class="form-control input-sm bilangan required" minlength="6" maxlength="6" type="text" placeholder="Kode <?= $kecamatan; ?>" value="<?= $main["kode_kecamatan"]; ?>"></input>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label" for="kode_pos">Kode Pos </label>
										<div class="col-sm-2">
											<input id="kode_pos" name="kode_pos" class="form-control input-sm number" minlength="5" maxlength="5" type="text" placeholder="Kode Pos <?= $kecamatan; ?>" value="<?= $main["kode_pos"]; ?>"></input>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label" for="nama_camat">Nama Pengelola</label>
										<div class="col-sm-9">
											<input id="nama_camat" name="nama_camat" class="form-control input-sm nama required" maxlength="50" type="text" placeholder="nama <?= ucwords($this->setting->sebutan_camat); ?>" value="<?= $main["nama_camat"] ?>"></input>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label" for="nip_kepala_desa">ID Pengelola</label>
										<div class="col-sm-9">
											<input id="nip_camat" name="nip_camat" class="form-control input-sm nomor_sk" maxlength="50" type="text" placeholder="NIP <?= ucwords($this->setting->sebutan_camat); ?>" value="<?= $main["nip_camat"]; ?>"></input>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label" for="alamat_kantor">Alamat Kantor </label>
										<div class="col-sm-9">
											<textarea id="alamat_kantor_kecamatan" name="alamat_kantor_kecamatan" class="form-control input-sm alamat required" maxlength="100" placeholder="Alamat Kantor <?= $kecamatan; ?>" rows="3" style="resize:none;"><?= $main["alamat_kantor_kecamatan"]; ?></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label" for="email_kecamatan">E-Mail Utama</label>
										<div class="col-sm-9">
											<input id="email_kecamatan" name="email_kecamatan" class="form-control input-sm email" maxlength="50" type="text" placeholder="E-Mail <?= $kecamatan; ?>" value="<?= $main["email_kecamatan"] ?>"></input>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label" for="telepon">Telpon</label>
										<div class="col-sm-9">
											<input id="telepon_kecamatan" name="telepon_kecamatan" class="form-control input-sm bilangan" type="text" maxlength="15" placeholder="Telpon <?= $kecamatan; ?>" value="<?= $main["telepon_kecamatan"]; ?>"></input>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label" for="website">Url Website</label>
										<div class="col-sm-9">
											<input id="website_kecamatan" name="website_kecamatan" class="form-control input-sm url" maxlength="50" type="text" placeholder="Website <?= $kecamatan; ?>" value="<?= $main["website_kecamatan"]; ?>"></input>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label" for="profil_singkat">Profil Singkat</label>
										<div class="col-sm-9">
											<textarea id="profil_singkat" name="profil_singkat" class="form-control input-sm alamat" placeholder="Profil Singkat" rows="3" style="resize:auto;"><?= $main["profil_singkat"]; ?></textarea>
										</div>
									</div>
								</div>
								<div class='card-footer text-right'>
									<button type='reset' class='btn btn-danger'><i class='feather mr-2 icon-x'></i> Batal</button>
									<button type='submit' class='btn btn-success'><i class='feather mr-2 icon-check'></i> Simpan</button>
								</div>
							</div>
						</div>

					</div>
				</form>
			</div>
		</div>
</div>
