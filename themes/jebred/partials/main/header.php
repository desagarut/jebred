<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<!-- Topbar Start 
<div class="container-fluid bg-light px-0 wow fadeIn" data-wow-delay="0.1s">
  <div class="row gx-0 align-items-center d-none d-lg-flex" style="background-color:#201e1e">
    <div class="col-lg-6 px-5 text-start">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a class="small text-secondary" href="#">Home</a></li>
        <li class="breadcrumb-item"><a class="small text-secondary" href="#">Career</a></li>
        <li class="breadcrumb-item"><a class="small text-secondary" href="#">Terms</a></li>
        <li class="breadcrumb-item"><a class="small text-secondary" href="#">Privacy</a></li>
      </ol>
    </div>
    <div class="col-lg-6 px-5 text-end"> <small>Follow us:</small>
      <div class="h-100 d-inline-flex align-items-center"> <a class="btn-square text-danger border-end rounded-0" href=""><i class="fab fa-facebook-f"></i></a> <a class="btn-square text-danger border-end rounded-0" href=""><i class="fab fa-twitter"></i></a> <a class="btn-square text-danger border-end rounded-0" href=""><i class="fab fa-linkedin-in"></i></a> <a class="btn-square text-danger pe-0" href=""><i class="fab fa-instagram"></i></a> </div>
    </div>
  </div>
</div>
<!-- Topbar End -->

<!-- Brand & Contact Start -->
<div class="container-fluid py-2 px-5 wow fadeIn" data-wow-delay="0.1s" style="background-color:#2a022c">
  <div class="row align-items-center top-bar">
    <div class="col-lg-6 col-md-6 text-center text-lg-start">
      <a href="<?= site_url('first') ?>" class="navbar-brand m-0 p-0">
        <h3 class="fw-bold text-danger m-1" style="color:#F00;">
          <a href="<?= site_url('first') ?>"> <img src="<?= logo_web($desa['logo']) ?>" style="width:35px;" alt="Logo">
          </a> <?= $this->setting->website_title ?>
        </h3>
      </a>
    </div>
    <div class="col-lg-6 px-5 text-center text-md-end">
      <div class="h-100 d-inline-flex align-items-center">
        <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-facebook-f"></i></a>
        <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-twitter"></i></a>
        <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-youtube"></i></a>
        <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>
</div>
<!-- Brand & Contact End -->