<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
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