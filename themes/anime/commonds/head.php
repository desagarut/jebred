<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?= $profile_singkat ?>">
    <meta name="keywords" content="Movies, Film, Gratis, Hiburan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
    <title><?= $this->setting->website_title ?></title>
    
	<?php if(is_file(LOKASI_LOGO . "favicon.ico")): ?>
    <link rel="shortcut icon" href="<?= base_url() . LOKASI_LOGO?>favicon.ico" />
    <?php else: ?>
    <link rel="shortcut icon" href="<?= base_url('favicon.ico')?>" />
    <?php endif; ?>
    <script>const BASE_URL = '<?= base_url() ?>';	</script>    
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/css/bootstrap.min.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/css/font-awesome.min.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/css/elegant-icons.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/css/plyr.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/css/nice-select.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/css/owl.carousel.min.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/css/slicknav.min.css") ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/css/style.css") ?>" type="text/css">
    
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847" crossorigin="anonymous"></script>

</head>
