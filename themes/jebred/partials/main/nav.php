<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-danger navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s"> <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
  <div class="collapse navbar-collapse" id="navbarCollapse">
  <div class="navbar-nav me-auto p-3 p-lg-0"> 
  	<a href="<?= site_url('first') ?>" class="nav-item nav-link " aria-label="Toggle navigation">HOME</a> 
    <?php if(menu_atas) : ?>
    <?php foreach($menu_atas as $menu) : ?>
    <div class="nav-item dropdown">
      <?php if(count($menu['submenu']) > 0) : ?>
      <a href="<?= $menu['link'] ?>" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
      <?= $menu['nama'] ?>
      </a>
      <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
        <?php foreach($menu['submenu'] as $submenu) : ?>
        <a href="<?= $submenu['link'] ?>" class="dropdown-item">
        <?= $submenu['nama'] ?>
        </a>
        <?php endforeach ?>
      </div>
      <?php endif ?>
    </div>
    <?php endforeach ?>
    <?php endif ?>    
    <!--<a href="<?= site_url('first') ?>" class="nav-item nav-link " aria-label="Toggle navigation">Pengembang</a> <a href="<?= site_url('first') ?>" class="nav-item nav-link " aria-label="Toggle navigation">Panduan</a>--> </div>
  <a href="<?= site_url('insidega') ?>" class="btn btn-sm btn-light rounded-pill py-2 px-4 d-lg-block">LOGIN</a> </nav>
<!-- Navbar End --> 
