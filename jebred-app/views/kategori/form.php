<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Pengaturan Menu Dinamis / Kategori</h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('kategori')?>"> Daftar Kategori</a></li>
						<li class="breadcrumb-item active">Pengaturan Menu</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<div class="card">
		<form id="validasi" action="<?= $form_action?>" method="POST" class="form-horizontal">
			<div class="row">
				<div class="col-md-3">
          <?php $this->load->view('kategori/menu_kiri.php')?>
				</div>
				<div class="col-md-9">
					
            <div class="card-header">
							<a href="<?= site_url("kategori")?>" class="btn btn-box btn-info btn-sm btn-sm "  title="Tambah Artikel">
								<i class="fa fa-arrow-circle-left "></i>Kembali ke Daftar Kategori
            	</a>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label class="control-label col-sm-4" for="nama">Nama Kategori</label>
								<div class="col-sm-6">
									<?php if ($kategori): ?>
										<input name="kategori_lama" type="hidden" value="<?=$kategori['kategori']?>">
									<?php endif; ?>
									<input name="kategori" class="form-control input-sm required nomor_sk" maxlength="50" type="text" value="<?=$kategori['kategori']?>"></input>
								</div>
							</div>
						</div>
						<div class='card-footer'>
							<div class='col-xs-12'>
								<button type='reset' class='btn btn-box btn-danger btn-sm' ><i class='fa fa-times'></i> Batal</button>
								<button type='submit' class='btn btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
