<?php if(!$sub_modul): ?>
<script type="text/javascript">
		function ubah_jenis_server(jenis_server)
		{
			$('#offline_saja select').val('');
			if (jenis_server == 3)
			{
				$('#offline_saja').hide();
				$('#offline_saja select').removeClass('required');
				$('#offline_online_hosting select').val('');
				$('#offline_online_hosting select').addClass('required');
				$('#offline_online_hosting').show();
			}
			else
			{
				$('#offline_online_hosting select').val('');
				$('#offline_online_hosting select').change();
				$('#offline_online_hosting').hide();
				$('#offline_online_hosting select').removeClass('required');
				$('#offline_saja select').removeClass('required');
				$('#offline_saja').hide();
				if (jenis_server == 1)
				{
					$('#offline_saja select').addClass('required');
					$('#offline_saja').show();
				}
			}
		}
		function ubah_server(server)
		{
			$('#offline_saja select').val('');
			$('#offline_ada_hosting select').val('');;
			if (server == 5)
			{
				$('#offline_ada_hosting select').addClass('required');
				$('#offline_ada_hosting').show();
			}
			else
			{
				$('#offline_ada_hosting select').removeClass('required');
				$('#offline_ada_hosting').hide();
			}
		}

		$(function()
		{
			var keyword = <?= $keyword?> ;
			$( "#cari" ).autocomplete(
			{
				source: keyword,
				maxShowItems: 10,
			});
		});
	</script>
<?php endif; ?>

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5> <?= $sub_modul ? 'Submodul' : 'Modul';?></h5>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('beranda') ?>">Beranda</a></li>
            <?php if(!$sub_modul): ?>
            <li class="breadcrumb-item"><a href="#!">Pengaturan</a></li>
            <?php else: ?>
            <li class="breadcrumb-item"><a href="#!">Pengaturan</a></li>
            <li class="breadcrumb-item active"><a href="<?= site_url('modul/clear')?>"> Daftar Modul</a></li>
            <?php endif; ?>
          </ol>
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.container-fluid --> 
  </div>
  <!-- /.content-header --> 
  
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
    <?php if(!$sub_modul): ?>
    <div class="card card-info">
      <div class="row">
        <div class="col-md-12">
          <form id="validasi" action="<?= site_url("modul/ubah_server")?>" method="POST" class="form-horizontal">
            <div class="card-header card-info">
              <h5 class="header-title">Penggunaan Server</h5>
            </div>
            <div class="card-body">
              <div class="form-group" >
                <label class="col-sm-4 control-label">Penggunaan Aplikasi di
                  <?= ucwords($this->setting->sebutan_kecamatan)?>
                </label>
                <div class="col-sm-9 col-lg-4">
                  <select class="form-control required input-sm" name="jenis_server" onchange="ubah_jenis_server($(this).val())">
                    <option value='' selected="selected">-- Pilih Penggunaan Aplikasi --</option>
                    <option value="1" <?php selected($this->setting->penggunaan_server, '1')?>> Offline saja di kantor </option>
                    <option value="2" <?php selected($this->setting->penggunaan_server, '2')?>> Online saja di hosting </option>
                    <option value="3" <?php in_array($this->setting->penggunaan_server, array('3', '5', '6')) and print('selected') ?>> Offline di kantor dan online di hosting </option>
                    <option value="4" <?php selected($this->setting->penggunaan_server, '4')?>> Offline dan online di kantor </option>
                  </select>
                </div>
              </div>
              <div class="form-group" id="offline_online_hosting" style="<?php !in_array($this->setting->penggunaan_server, array('3', '5', '6')) and print('display: none;') ?>">
                <label class="col-sm-3 control-label">Server ini digunakan sebagai</label>
                <div class="col-sm-9 col-lg-4">
                  <select class="form-control input-sm" name="server_mana" onchange="ubah_server($(this).val())">
                    <option value='' selected="selected">-- Pilih Server Ini --</option>
                    <option value="5" <?php selected($this->setting->penggunaan_server, '5')?>> Offline di kantor </option>
                    <option value="6" <?php selected($this->setting->penggunaan_server, '6')?>> Online di hosting </option>
                  </select>
                </div>
              </div>
              <div class="form-group" id="offline_ada_hosting" style="<?php !in_array($this->setting->penggunaan_server, array('5')) and print('display: none;') ?>">
                <label class="col-sm-3 control-label">Akses web pada server offline ini</label>
                <div class="col-sm-6 col-lg-4">
                  <select class="form-control input-sm" name="offline_mode">
                    <option value='' selected="selected">-- Pilih Akses Web --</option>
                    <option value="1" <?php ($this->setting->penggunaan_server == '5' and $this->setting->offline_mode =='1') and print('selected')?>> Web bisa diakses petugas web </option>
                    <option value="2" <?php ($this->setting->penggunaan_server == '5' and $this->setting->offline_mode =='2') and print('selected')?>> Web non-aktif sama sekali </option>
                  </select>
                </div>
              </div>
              <div class="form-group" id="offline_saja" style="<?php !in_array($this->setting->penggunaan_server, array('1')) and print('display: none;') ?>">
                <label class="col-sm-3 control-label">Akses web pada server offline ini</label>
                <div class="col-sm-9 col-lg-4">
                  <select class="form-control input-sm" name="offline_mode_saja">
                    <option value='' selected="selected">-- Pilih Akses Web --</option>
                    <option value="0" <?php ($this->setting->penggunaan_server == '1' and $this->setting->offline_mode == '0') and print('selected')?>> Web bisa diakses publik </option>
                    <option value="1" <?php ($this->setting->penggunaan_server == '1' and $this->setting->offline_mode == '1') and print('selected')?>> Web bisa diakses petugas web </option>
                    <option value="2" <?php ($this->setting->penggunaan_server == '1' and $this->setting->offline_mode == '2') and print('selected')?>> Web non-aktif sama sekali </option>
                  </select>
                </div>
              </div>
            </div>
            <div class='card-footer text-right'>
              <div class='col-xs-12'>
                <button type='reset' class='btn btn-box btn-danger btn-sm' ><i class='fa fa-times'></i> Batal</button>
                <button type='submit' class='btn btn-box btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
	  <?php endif; ?>
      
      <div class="card">
        <div class="row">
          <div class="col-md-12">
          <?php if(!$sub_modul): ?>
            <div class="card-header">
            <h4 class="card-title">Pengaturan Modul</h4>
            </div>
            <div class="card-body">
              
              <div class="row">
                <div class="col-md-12 text-center"> <a href="<?= site_url("modul/default_server")?>" class="btn btn-box btn-success btn-sm" <?php $this->setting->penggunaan_server or print("disabled='disabled'")?>><i class="fa fa-refresh"></i>Kembalikan ke Modul Default</a> </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <form id="mainform" name="mainform" action="" method="post">
                      <div class="row">
                        <div class="col-sm-6">
                          <select class="form-control input-sm " name="status" onchange="formAction('mainform','<?=site_url('modul/filter/status/')?>')">
                            <option value="">Semua</option>
                            <option value="1" <?php selected($status, 1);?>>Aktif</option>
                            <option value="2" <?php selected($status, 2);?>>Tidak Aktif</option>
                          </select>
                        </div>
                        <div class="col-sm-6">
                          <div class="card-tools">
                            <div class="input-group pull-right">
                              <input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13):$('#'+'mainform').attr('action','<?=site_url('modul/search')?>');$('#'+'mainform').submit();endif;">
                              <div class="input-group-btn">
                                <button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action','<?= site_url("modul/filter/cari")?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php else: ?>
              <div class="card-header"> <a href="<?= site_url('modul/clear')?>" class="btn btn-box btn-info btn-sm "><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Daftar Modul</a> </div>
              <div class="card-header"> <strong> Modul Utama :
                <?=$sub_modul['modul']?>
                </strong> </div>
              <div class="card-body">
                <?php endif; ?>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-bordered dataTable table-hover">
                        <thead class="bg-gray disabled color-palette">
                          <tr>
                            <th width="1%">No</th>
                            <th width="5%">Aksi</th>
                            <th>Nama Modul</th>
                            <th width="5%" nowrap>Icon</th>
                            <th width="5%" nowrap>Tampil</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($main as $data): ?>
                          <tr>
                            <td class="text-center"><?=$data['no']?></td>
                            <td nowrap><a href="<?=site_url("modul/form/$data[id]")?>" class="btn bg-orange btn-box btn-sm" title="Ubah Data" ><i class="fa fa-edit"></i></a>
                              <?php if ($data['aktif'] == '1'): ?>
                              <a href="<?= site_url("modul/lock/$data[id]/2")?>" class="btn bg-navy btn-box btn-sm"  title="Non Aktifkan"><i class="fa fa-unlock"></i></a>
                              <?php elseif ($sub_modul AND $sub_modul['aktif'] != '1'): ?>
                              
                              <!-- Jika parrent menu tdk aktif, maka tdk ada aksi lock -->
                              
                              <?php else: ?>
                              <a href="<?= site_url("modul/lock/$data[id]/1")?>" class="btn bg-navy btn-box btn-sm"  title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
                              <?php endif ?>
                              <?php if (count($data['submodul'])>0): ?>
                              <a href="<?=site_url("modul/sub_modul/$data[id]")?>" class="btn bg-olive btn-box btn-sm" title="Lihat Sub Modul" ><i class="fa fa-list"></i></a>
                              <?php endif; ?></td>
                            <td><?=$data['modul']?></td>
                            <td nowrap><?=$data['ikon']?></td>
                            <td class="text-center"><i class="fa <?=$data['ikon']?> fa-lg"></i></td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
</div>
