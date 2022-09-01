<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<head>
<meta charset="utf-8">
<title>
<?= $this->setting->website_title ?>
</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">

<!-- Favicon -->
<link href="img/favicon.ico" rel="icon">
<?php $this->load->view($folder_themes .'/partials/main/meta') ?>

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="<?= base_url("$this->theme_folder/$this->theme/lib/animate/animate.min.css")?>" rel="stylesheet">
<link href="<?= base_url("$this->theme_folder/$this->theme/lib/owlcarousel/assets/owl.carousel.min.css")?>" rel="stylesheet">
<link href="<?= base_url("$this->theme_folder/$this->theme/lib/lightbox/css/lightbox.min.css")?>" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="<?= base_url("$this->theme_folder/$this->theme/css/bootstrap.min.css")?>" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="<?= base_url("$this->theme_folder/$this->theme/css/style.css")?>" rel="stylesheet">
</head>

<body>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
  <div class="spinner-border position-relative text-danger" style="width: 6rem; height: 6rem;" role="status"></div>
  <i class="fa fa-laptop-code fa-2x text-danger position-absolute top-50 start-50 translate-middle"></i> </div>
<!-- Spinner End -->


<!-- Brand & Contact Start -->
<div class="container-fluid py-4 px-5 wow fadeIn" data-wow-delay="0.1s" style="background-color:#C00">
  <div class="row align-items-center top-bar">
    <div class="col-lg-4 col-md-12 text-center text-lg-start"> <a href="<?= site_url('first') ?>" class="navbar-brand m-0 p-0">
      <h1 class="fw-bold text-danger m-0">
      <a href="<?= site_url('first') ?>"> <img src="<?= logo_web($desa['logo']) ?>" style="padding-bottom: 5px; width:58px;" alt="Logo"> 
       </a><strong style="color:#FFF"><?= $this->setting->website_title ?></strong></h1> 
      <!--<img src="<?= base_url("$this->theme_folder/$this->theme/img/dishanpan.png")?>" style="padding-bottom: 5px; height:70px;" alt="Logo"alt="Logo"> --></a> </div>
    <div class="col-lg-8 col-md-7 d-none d-lg-block" style="color:#FFF">
      <div class="row">
        <div class="col-4">
          <div class="d-flex align-items-center justify-content-end">
            <div class="flex-shrink-0 btn-lg-square border rounded-circle"> <i class="far fa-clock text-warning"></i> </div>
            <div class="ps-3" style="color:#FFF">
              <p class="mb-2" style="color:#FFF">Opening Hour</p>
              <h6 class="mb-0" style="color:#FFF">Mon - Fri, 8:00 - 16:00</h6>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="d-flex align-items-center justify-content-end">
            <div class="flex-shrink-0 btn-lg-square border rounded-circle"> <i class="fa fa-phone text-danger"></i> </div>
            <div class="ps-3" style="color:#FFF">
              <p class="mb-2" style="color:#FFF">Call Us</p>
              <h6 class="mb-0" style="color:#FFF">
                <?= $desa['telepon_kecamatan']; ?>
              </h6>
            </div>
          </div>
        </div>
        <div class="col-5" style="color:#FFF">
          <div class="d-flex align-items-center justify-content-end">
            <div class="flex-shrink-0 btn-lg-square border rounded-circle"> <i class="far fa-envelope text-danger"></i> </div>
            <div class="ps-3">
              <p class="mb-2" style="color:#FFF">Email Us</p>
              <h6 class="mb-0" style="color:#FFF">
                <?= $desa['email_kecamatan']; ?>
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Brand & Contact End --> 

