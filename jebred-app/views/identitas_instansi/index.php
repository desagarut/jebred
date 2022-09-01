<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style>
  .table {
    font-size: 14px;
  }
</style>

<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0">Profil Web</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>

            <li class="breadcrumb-item active"><a href="#!">Profil Web</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->


<!-- /.content-header -->
<section class="content" id="maincontent">
  <!-- [ breadcrumb ] end -->


  <!-- [ Main Content ] start -->
  <div class="row">
    <div class="col-xl-12 col-md-12">
      <div class="card">

        <form id="mainform" name="mainform" action="" method="post">

          <div class="card-header">

            <div class="col-md-12">
              <div class="pull-right">
                <?php if ($this->CI->cek_hak_akses('h')) : ?>
                  <a href="<?= site_url('identitas_instansi/form'); ?>" class="btn btn-warning" title="Ubah Data"><i class="fa fa-edit"></i> Ubah Data</a>
                <?php endif; ?>
              </div>
            </div>
          </div>


          <div class="card-body table-border-style">
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th colspan="3" style="background-color:#606BFD; color:#fff"><strong>
                        IDENTITAS
                      </strong></th>
                  </tr>
                  <tr>
                    <td width="300">Nama Website</td>
                    <td width="1">:</td>
                    <td><?= $main['nama_kecamatan']; ?></td>
                  </tr>
                  <tr>
                    <td>Nomor Web
                      </td>
                    <td>:</td>
                    <td><?= kode_wilayah($main['kode_kecamatan']); ?></td>
                  </tr>
                  <tr>
                    <td>Kode Pos
                      <?= $kecamatan; ?></td>
                    <td>:</td>
                    <td><?= $main['kode_pos']; ?></td>
                  </tr>
                  <tr>
                    <td>Nama Pengelola</td>
                    <td>:</td>
                    <td><?= $main['nama_camat']; ?></td>
                  </tr>
                  <tr>
                    <td>NIK <?= ucwords($this->setting->sebutan_camat); ?></td>
                    <td>:</td>
                    <td><?= $main['nip_camat']; ?></td>
                  </tr>
                  <tr>
                    <td>Alamat Kantor</td>
                    <td>:</td>
                    <td><?= $main['alamat_kantor_kecamatan']; ?></td>
                  </tr>
                  <tr>
                    <td>E-Mail Utama</td>
                    <td>:</td>
                    <td><?= $main['email_kecamatan']; ?></td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td>:</td>
                    <td><?= $main['telepon_kecamatan']; ?></td>
                  </tr>
                  <tr>
                    <td>Url website</td>
                    <td>:</td>
                    <td><?= $main['website_kecamatan']; ?></td>
                  </tr>
                  <tr>
                    <td>Profil
                      </td>
                    <td>:</td>
                    <td><?= $main['profil_singkat']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>
  </div>