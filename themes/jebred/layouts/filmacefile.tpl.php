<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847" crossorigin="anonymous"></script>
  <?php $this->load->view($folder_themes . '/partials/main/meta') ?>
  <?php $this->load->view($folder_themes . '/partials/main/head') ?>
</head>

<body style="font-family:SF Pro,Roboto,Noto Sans,sans-serif;">
  <!-- Spinner Start
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
  <div class="spinner-border position-relative text-danger" style="width: 6rem; height: 6rem;" role="status"></div>
  <i class="fa fa-laptop-code fa-2x text-danger position-absolute top-50 start-50 translate-middle"></i> </div>
Spinner End -->
  <?php $this->load->view($folder_themes . '/partials/main/header') ?>
  <?php $this->load->view($folder_themes . '/partials/main/nav') ?>
  <?php $this->load->view($folder_themes . '/partials/teks_berjalan.php') ?>
  <?php if ($single_film['id']) : ?>
    <?php $this->load->view($folder_themes . '/partials/filmacefile_single.php') ?>
  <?php else : ?>
    <?php $this->load->view($folder_themes . '/partials/404.php') ?>
  <?php endif ?>
  <?php $this->load->view($folder_themes . '/partials/main/footer') ?>
</body>

</html>