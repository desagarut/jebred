<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Form</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= site_url('identitas_instansi') ?>">Identitas Instansi</a></li>
            <li class="breadcrumb-item"><a href="#!">Form Pegawai</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->
  
  <section class="content" id="maincontent">
    <div class="row" >
      <div class="col-md-12">
        <div class="card">
          <div class="card-header"> <a href="<?= site_url()?>pengurus" class="btn btn-box btn-info btn-sm "><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Daftar Staf</a> </div>
          <div class="card-body">
            <div class="form-group form-horizontal">
              <label class="col-sm-4 col-lg-2 control-label kiri" for="status">Sumber Data Pegawai</label>
              <div class="btn-group col-sm-8 kiri" data-toggle="buttons">
                <label for="pengurus_1" class="btn btn-info btn-box btn-sm col-sm-3 form-check-label <?php if (empty($pamong) or !empty($individu)): ?>active<?php endif ?>">
                  <input id="pengurus_1" type="radio"  name="pengurus" class="form-check-input" type="radio" value="1" <?php if (empty($pamong) or !empty($individu)): ?>checked<?php endif; ?> autocomplete="off" onchange="pengurus_asal(this.value);">
                  Dari Database Penduduk </label>
                <label for="pengurus_2" class="btn btn-info btn-box btn-sm col-sm-3 form-check-label <?php if (!empty($pamong) and empty($individu)): ?>active<?php endif; ?>">
                  <input id="pengurus_2" type="radio"  name="pengurus" class="form-check-input" type="radio" value="2" <?php if (!empty($pamong) and empty($individu)): ?>checked<?php endif; ?> autocomplete="off" onchange="pengurus_asal(this.value);">
                  Tidak Terdata </label>
              </div>
            </div>
            <form action="" id="main" name="main" method="POST"  class="form-horizontal">
              <div class="form-group col-sm-12" >
                <label class="col-md-4 label" for="id_pend">NIK / Nama Penduduk </label>
                <div class="col-md-7">
                  <select class="form-control select2" id="id_pend" name="id_pend"  onchange="formAction('main')" style="width:100%" >
                    <option selected="selected">-- Silakan Masukan NIK / Nama--</option>
                    <?php foreach ($penduduk as $data): ?>
                    <option value="<?= $data['id']?>" <?php if ($individu['id']==$data['id']): ?>selected<?php endif; ?>>NIK :
                    <?= $data['nik']." - ".$data['nama']." - ".$data['dusun']?>
                    </option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <form id="validasi" action="<?=$form_action?>" method="POST" enctype="multipart/form-data"  class="form-horizontal">
      <input type="hidden" name="id_pend" value="<?= $individu['id']?>">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <?php if ($pamong['foto']): ?>
              <img class="profile-user-img img-responsive img-circle" src="<?= AmbilFoto($pamong['foto'])?>" alt="Foto">
              <?php else: ?>
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url()?>assets/files/user_pict/kuser.png" alt="Foto">
              <?php endif; ?>
              <br/>
              <p class="text-muted text-center"><code>(Kosongkan jika tidak ingin mengubah foto)</code></p>
              <br/>
              <div class="input-group input-group-sm">
                <input type="text" class="form-control" id="file_path2" name="foto">
                <input type="file" class="hidden" id="file2" name="foto">
                <input type="hidden" name="old_foto" value="<?= $pamong['foto']?>">
                <span class="input-group-btn">
                <button type="button" class="btn btn-info btn-box"  id="file_browser2"><i class="fa fa-search"></i> Browse</button>
                </span> </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="pamong_nama">Nama Pegawai
                  <?= ucwords($this->setting->sebutan_kecamatan)?>
                </label>
                <div class="col-sm-7">
                  <input type="hidden" name="pamong_status" value="1">
                  <input name="pamong_kecamatan" class="form-control input-sm pengurus-kecamatan" type="text" placeholder="Nama" value="<?= ($individu['nama'])?>" disabled="disabled">
                  </input>
                  <input id="pamong_nama" name="pamong_nama" class="form-control input-sm pengurus-luar-kecamatan <?= !empty($individu) ?: 'required'?>" type="text" placeholder="Nama" value="<?= ($pamong['pamong_nama'])?>" style="display: none;">
                  </input>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="pamong_nik">Nomor Induk Kependudukan</label>
                <div class="col-sm-7">
                  <input class="form-control input-sm pengurus-kecamatan" type="text" placeholder="Nomor Induk Kependudukan" value="<?=$individu['nik']?>" disabled="disabled">
                  </input>
                  <input id="pamong_nik" name="pamong_nik" class="form-control input-sm pengurus-luar-kecamatan nik" type="text" maxlength="16" placeholder="Nomor Induk Kependudukan" value="<?=$pamong['pamong_nik']?>" style="display: none;">
                  </input>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="pamong_niap">
                  <?= $this->setting->sebutan_nip_kecamatan ?>
                </label>
                <div class="col-sm-7">
                  <input id="pamong_niap" name="pamong_niap" class="form-control input-sm digits" type="text" maxlength="25" placeholder="<?= $this->setting->sebutan_nip_kecamatan ?>" value="<?=$pamong['pamong_niap']?>" >
                  </input>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="pamong_nip">NIP</label>
                <div class="col-sm-7">
                  <input id="pamong_nip" name="pamong_nip" class="form-control input-sm digits" type="text" maxlength="20" placeholder="NIP" value="<?=$pamong['pamong_nip']?>" >
                  </input>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="pamong_tempatlahir">Tempat Lahir</label>
                <div class="col-sm-7">
                  <input class="form-control input-sm pengurus-kecamatan" type="text" placeholder="Tempat Lahir" value="<?= strtoupper($individu['tempatlahir'])?>" disabled="disabled">
                  </input>
                  <input name="pamong_tempatlahir" class="form-control input-sm pengurus-luar-kecamatan" type="text" placeholder="Tempat Lahir" value="<?= strtoupper($pamong['pamong_tempatlahir'])?>" style="display: none;">
                  </input>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="pamong_tanggallahir">Tanggal Lahir</label>
                <div class="col-sm-7">
                  <input class="form-control input-sm pengurus-kecamatan" type="text" placeholder="Tanggal Lahir" value="<?= strtoupper($individu['tanggallahir'])?>" disabled="disabled">
                  </input>
                  <div class="input-group input-group-sm date pengurus-luar-kecamatan" style="display: none;">
                    <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                    <input class="form-control input-sm pull-right tgl_1" name="pamong_tanggallahir" type="text" value="<?= tgl_indo_out($pamong['pamong_tanggallahir'])?>">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="pamong_sex">Jenis Kelamin</label>
                <div class="col-sm-7">
                  <input class="form-control input-sm pengurus-kecamatan" type="text" placeholder="Jenis Kelamin" value="<?= $individu['sex']?>" disabled="disabled">
                  </input>
                  <select class="form-control input-sm pengurus-luar-kecamatan" name="pamong_sex" onchange="show_hide_hamil($(this).find(':selected').val());" style="display: none;">
                    <option value="">Jenis Kelamin</option>
                    <option value="1" <?php selected($pamong['pamong_sex'], '1'); ?>>Laki-Laki</option>
                    <option value="2" <?php selected($pamong['pamong_sex'], '2'); ?> >Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="pamong_pendidikan">Pendidikan</label>
                <div class="col-sm-7">
                  <input class="form-control input-sm pengurus-kecamatan" type="text" placeholder="Pendidikan" value="<?= $individu['pendidikan_kk']?>" disabled="disabled">
                  </input>
                  <select class="form-control input-sm pengurus-luar-kecamatan" name="pamong_pendidikan" style="display: none;">
                    <option value="">Pilih Pendidikan (Dalam KK) </option>
                    <?php foreach ($pendidikan_kk as $data): ?>
                    <option value="<?= $data['id']?>" <?php selected($pamong['pamong_pendidikan'], $data['id']); ?>>
                    <?= strtoupper($data['nama'])?>
                    </option>
                    <?php endforeach?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="pamong_agama">Agama</label>
                <div class="col-sm-7">
                  <input class="form-control input-sm pengurus-kecamatan" type="text" placeholder="Agama" value="<?= $individu['agama']?>" disabled="disabled">
                  </input>
                  <select class="form-control input-sm pengurus-luar-kecamatan" name="pamong_agama" style="display: none;">
                    <option value="">Pilih Agama</option>
                    <?php foreach ($agama as $data): ?>
                    <option value="<?= $data['id']?>" <?php selected($pamong['pamong_agama'], $data['id']); ?>>
                    <?= strtoupper($data['nama'])?>
                    </option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="pamong_pangkat">Pangkat / Golongan</label>
                <div class="col-sm-7">
                  <input name="pamong_pangkat" class="form-control input-sm" type="text" placeholder="Pangkat / Golongan" value="<?= $pamong['pamong_pangkat']?>" >
                  </input>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="pamong_nosk">Nomor SK Pengangkatan</label>
                <div class="col-sm-7">
                  <input name="pamong_nosk" class="form-control input-sm" type="text" maxlength="30" placeholder="Nomor SK Pengangkatan" value="<?= $pamong['pamong_nosk']?>" >
                  </input>
                </div>
              </div>
              <div class='form-group'>
                <label class="col-sm-4 control-label" for="pamong_tglsk">Tanggal SK Pengangkatan</label>
                <div class="col-sm-7">
                  <div class="input-group input-group-sm date">
                    <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                    <input class="form-control input-sm pull-right tgl_1" name="pamong_tglsk" type="text" value="<?= tgl_indo_out($pamong['pamong_tglsk'])?>">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="pamong_nohenti">Nomor SK Pemberhentian</label>
                <div class="col-sm-7">
                  <input name="pamong_nohenti" class="form-control input-sm" type="text" placeholder="Nomor SK Pemberhentian" value="<?= $pamong['pamong_nohenti']?>" >
                  </input>
                </div>
              </div>
              <div class='form-group'>
                <label class="col-sm-4 control-label" for="pamong_tglhenti">Tanggal SK Pemberhentian</label>
                <div class="col-sm-7">
                  <div class="input-group input-group-sm date">
                    <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                    <input class="form-control input-sm pull-right tgl_1" name="pamong_tglhenti" type="text" value="<?= tgl_indo_out($pamong['pamong_tglhenti'])?>">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="pamong_masajab">Masa Jabatan (Usia/Periode)</label>
                <div class="col-sm-7">
                  <input name="pamong_masajab" class="form-control input-sm" type="text" placeholder="Contoh: 6 Tahun Periode Pertama (2015 s/d 2021)" value="<?= $pamong['pamong_masajab']?>" >
                  </input>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label" for="jabatan">Jabatan</label>
                <div class="col-sm-7">
                  <input id="jabatan" name="jabatan" class="form-control input-sm required" type="text" placeholder="Jabatan" value="<?= $pamong['jabatan']?>" >
                  </input>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label bagan" for="atasan">Atasan</label>
                <div class="col-sm-7">
                  <select class="form-control select2" name="atasan">
                    <option value="">Pilih Atasan</option>
                    <?php foreach ($atasan as $data): ?>
                    <option value="<?= $data['id']?>" <?php selected($pamong['atasan'], $data['id']); ?>>
                    <?= $data['nama']?>
                    (
                    <?= $data['jabatan']?>
                    )</option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label bagan" for="jabatan">Bagan - Tingkat</label>
                <div class="col-sm-7">
                  <input name="bagan_tingkat" class="form-control input-sm number" type="text" placeholder="Angka menunjukkan tingkat di bagan organisasi. Contoh: 2" value="<?= $pamong['bagan_tingkat']?>" >
                  </input>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label bagan" for="jabatan">Bagan - Offset</label>
                <div class="col-sm-7">
                  <input name="bagan_offset" class="form-control input-sm number" type="text" placeholder="Angka menunjukkan persentase geser kiri (-n) atau kanan (+n). Contoh: 75%" value="<?= $pamong['bagan_offset']?>" >
                  </input>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 control-label bagan" for="jabatan">Bagan - Layout</label>
                <div class="col-sm-7">
                  <select class="form-control input-sm" name="bagan_layout">
                    <option value="">Tidak Ada Layout</option>
                    <option value="hanging" <?php selected($pamong['bagan_layout'], 'hanging'); ?>>Hanging</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-sm-4 bagan">Bagan - Warna</label>
                <div class="col-sm-7">
                  <div class="input-group my-colorpicker2">
                    <input type="text" name="bagan_warna" class="form-control input-sm" placeholder="#FFFFFF" value="<?=  $pamong['bagan_warna']?>">
                    <div class="input-group-addon input-sm"> <i></i> </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-lg-4 control-label" for="status">Status Pegawai kecamatan</label>
                <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
                  <label id="sx3" class="btn btn-info btn-box btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?php if ($pamong['pamong_status'] == '1' OR $pamong['pamong_status'] == NULL): ?>active<?php endif ?>">
                    <input id="group1" type="radio" name="pamong_status" class="form-check-input" type="radio" value="1" <?php if ($pamong['pamong_status'] == '1' OR $pamong['pamong_status'] == NULL): ?>checked <?php endif ?> autocomplete="off">
                    Aktif </label>
                  <label id="sx4" class="btn btn-info btn-box btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?php if ($pamong['pamong_status'] == '2'): ?>active<?php endif ?>">
                    <input id="group2" type="radio" name="pamong_status" class="form-check-input" type="radio" value="2" <?php if ($pamong['pamong_status'] == '2'): ?>checked<?php endif ?> autocomplete="off">
                    Tidak Aktif </label>
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <div class='col-xs-12'>
                <button type='reset' class='btn btn-box btn-danger btn-sm'  onclick="reset_form($(this).val());"><i class='fa fa-times'></i> Batal</button>
                <button type='submit' class='btn btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</div>
<script>
	$('document').ready(function()
	{
		$("input[name='pengurus']:checked").change();
		if ($("#validasi input[name='id_pend']").val() != '')
		{
			$('#pamong_nama').removeClass('required');
		}
	});

	function reset_form()
	{
		<?php if ($pamong['pamong_status'] =='1' OR $pamong['pamong_status'] == NULL): ?>
			$("#sx3").addClass('active');
			$("#sx4").removeClass("active");
		<?php endif ?>
		<?php if ($pamong['pamong_status'] =='2'): ?>
			$("#sx4").addClass('active');
			$("#sx3").removeClass("active");
		<?php endif ?>
	};

	function pengurus_asal(asal)
	{
		if (asal == 1)
		{
			$('#main').show();
			$('.pengurus-luar-kecamatan').hide();
			$('.pengurus-kecamatan').show();
			$('#pamong_nama').val('');
		}
		else
		{
			$('#main').hide();
			$("input[name='id_pend']").val('');
			$('.pengurus-luar-kecamatan').show();
			$('.pengurus-kecamatan').hide();
			$('#pamong_nama').addClass('required');
		}
	}
</script> 