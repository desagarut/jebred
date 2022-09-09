<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Pengaturan Slider Besar</h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
						<li class="breadcrumb-item active">Pengaturan Slider Besar</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<div class="card">
		<form id="mainform" action="<?= site_url('web/update_slider')?>" method="POST" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					
						<div class="card-header">
								Pilih sumber gambar untuk ditampilkan di slider besar:
						</div>
						<div class="card-body">
							<div class="row">
								<div data-toggle="buttons">
									<div class="col-sm-12">
										<div class="radio">
											<label data-toggle="tooltip" title="10 gambar utama film terbaru" data-placement="bottom" class="btn btn-info btn-box btn-sm col-xs-12 col-md-4 col-lg-3 <?php if ($this->setting->sumber_gambar_slider == '1'): ?>active<?php endif ?>">
												<input id="sumber1" type="radio" name="pilihan_sumber" class="hidden" type="radio" value="1" <?php if ($this->setting->sumber_gambar_slider == '1'): ?>checked <?php endif ?> autocomplete="off"> Artikel Terbaru
											</label>
											<label class="control-label row"> 10 gambar utama film terbaru</lable>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="radio">
											<label data-toggle="tooltip" title="10 gambar utama film terbaru yang masuk ke slider atas" data-placement="bottom" class="btn btn-info btn-box btn-sm col-xs-12 col-md-4 col-lg-3 <?php if ($this->setting->sumber_gambar_slider == '2'): ?>active<?php endif ?>">
												<input id="sumber2" type="radio" name="pilihan_sumber" class="hidden" type="radio" value="2" <?php if ($this->setting->sumber_gambar_slider == '2'): ?>checked <?php endif ?> autocomplete="off"> Artikel Terbaru Pilihan
											</label>
											<label class="control-label row"> 10 gambar utama film terbaru yang masuk ke slider atas</lable>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="radio">
											<label data-toggle="tooltip" title="Gambar dalam album galeri yang dimasukkan ke slider" data-placement="bottom" class="btn btn-info btn-box btn-sm col-xs-12 col-md-4 col-lg-3 <?php if ($this->setting->sumber_gambar_slider == '3'): ?>active<?php endif ?>">
												<input id="sumber3" type="radio" name="pilihan_sumber" class="hidden" type="radio" value="3" <?php if ($this->setting->sumber_gambar_slider == '3'): ?>checked <?php endif ?> autocomplete="off"> Album Galeri
											</label>
											<label class="control-label row">  Gambar dalam album galeri yang dimasukkan ke slider</lable>
										</div>
									</div>
								</div>
						</div>
						<div class='card-footer'>
							<div class='col-xs-12'>
								<button type='submit' class='btn btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

