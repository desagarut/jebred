<!DOCTYPE html>
<html>
<head>
<?php $this->load->view($folder_themes . '/partials/main/meta') ?>
<?php $this->load->view($folder_themes . '/partials/main/head') ?>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847"
     crossorigin="anonymous"></script>
</head>

<body style="font-family:SF Pro,Roboto,Noto Sans,sans-serif;">
<!-- Spinner Start
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
  <div class="spinner-border position-relative text-danger" style="width: 6rem; height: 6rem;" role="status"></div>
  <i class="fa fa-laptop-code fa-2x text-danger position-absolute top-50 start-50 translate-middle"></i> </div>
Spinner End --> 
<?php $this->load->view($folder_themes . '/partials/main/header') ?>
<?php $this->load->view($folder_themes . '/partials/main/nav') ?>
<?php $this->load->view($folder_themes . '/layouts/home.tpl.php') ?>
<?php $this->load->view($folder_themes . '/partials/main/footer') ?>
</body>
</html>