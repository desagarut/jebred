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

            <li class="breadcrumb-item active"><a href="#!">SISITERAS</a></li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('beranda/stat_bidang.php'); ?>
      </div>
    
      <div class="row">
        <?php $this->load->view('beranda/pengunjung.php'); ?>
        <?php $this->load->view('beranda/user_login.php'); ?>
		<?php $this->load->view('beranda/layanan.php');?>
      </div>

      <div class='row'>
        <?php //$this->load->view('beranda/helpdesk.php'); 
        ?>
        <?php //$this->load->view('beranda/changelog.php'); 
        ?>
      </div>

      <div class='row'>
        <?php //$this->load->view('beranda/teks_berjalan.php'); 
        ?>
      </div>
    </div>
  </section>
</div>