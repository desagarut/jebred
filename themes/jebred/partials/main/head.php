<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<title>
<?php if ($single_artikel["judul"] == ""): ?>
	<?= $this->setting->website_title; ?>
<?php else: ?>
	<?= $single_film["judul"]; ?>
<?php endif; ?>
</title>

<!-- Favicon -->
<?php	$favicon = LOKASI_LOGO . 'favicon.ico'; ?>
<link rel="shortcut icon" href="<?= base_url(is_file($favicon) ? $favicon : 'favicon.ico') ?>"/>

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="<?= base_url("$this->theme_folder/$this->theme/lib/animate/animate.min.css") ?>" rel="stylesheet">
<link href="<?= base_url("$this->theme_folder/$this->theme/lib/owlcarousel/assets/owl.carousel.min.css") ?>" rel="stylesheet">
<link href="<?= base_url("$this->theme_folder/$this->theme/lib/lightbox/css/lightbox.min.css") ?>" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="<?= base_url("$this->theme_folder/$this->theme/css/bootstrap.min.css") ?>" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="<?= base_url("$this->theme_folder/$this->theme/css/style.css") ?>" rel="stylesheet">

<link href="<?= base_url("$this->theme_folder/$this->theme/css/fractionslider.css") ?>" rel="stylesheet">
<link href="<?= base_url("$this->theme_folder/$this->theme/css/style-fraction.css") ?>" rel="stylesheet">