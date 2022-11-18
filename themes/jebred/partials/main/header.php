<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Brand & Contact Start -->
<div class="container-fluid py-2 px-5 wow fadeIn" data-wow-delay="0.1s" style="background-color:#2a022c">
  <div class="row align-items-center top-bar">
    <div class="col-lg-2 col-md-2 text-center text-lg-start">
      <a href="<?= site_url('first') ?>" class="navbar-brand m-0 p-0">
        <h3 class="fw-bold text-danger m-1" style="color:#F00;">
          <a href="<?= site_url('first') ?>"> <img src="<?= logo_web($desa['logo']) ?>" style="width:35px;" alt="Logo">
          </a> <?= $this->setting->website_title ?>
        </h3>
      </a>
    </div>
    <div class="col-lg-10 col-md-10 c0 text-xs-start">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"> <span class="navbar-toggler-icon"></span> Menu</button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav me-auto p-3 p-lg-0">
            <a href="<?= site_url('') ?>" class="nav-item nav-link">Home</a>
            <?php if (menu_atas) : ?>
              <?php foreach ($menu_atas as $menu) : ?>
                <div class="nav-item dropdown">
                  <a href="<?= $menu['link'] ?>" class="nav-item nav-link" data-bs-toggle="dropdown"><?= $menu['nama'] ?></a>
                  <?php if (count($menu['submenu']) > 0) : ?>
                    <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                      <?php foreach ($menu['submenu'] as $submenu) : ?>
                        <a href="<?= $submenu['link'] ?>" class="dropdown-item"><?= $submenu['nama'] ?></a>
                      <?php endforeach ?>
                    </div>
                  <?php endif ?>
                </div>
              <?php endforeach ?>
            <?php endif ?>
            <a href="<?= site_url('artikel') ?>" class="nav-item nav-link">Review</a>
          </div>
          <a href="#" class="btn btn-sm btn-light rounded-pill py-2 px-4 d-lg-block">Advertising</a>
        </div>
      </nav>
      <!-- Navbar End -->
    </div>
    <div class="col-lg-4 px-5 text-center text-md-end d-none">
      <div class="h-100 d-inline-flex align-items-center">
        <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-facebook-f"></i></a>
        <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-twitter"></i></a>
        <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-youtube"></i></a>
        <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-instagram"></i></a>
        <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-telegram"></i></a>
      </div>
    </div>
  </div>
</div>
<!-- Brand & Contact End -->