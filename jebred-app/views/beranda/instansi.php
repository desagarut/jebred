<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0">Beranda</h4>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>

            <li class="breadcrumb-item active"><a href="#!">Web</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('beranda/stat_bidang.php'); ?>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <?php $this->load->view('beranda/pengunjung.php'); ?>
        <?php $this->load->view('beranda/user_login.php'); ?>
        <?php $this->load->view('beranda/layanan.php'); ?>
      </div>
    </div>
  </section>
</div>