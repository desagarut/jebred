<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php defined('THEME_VERSION') or define('THEME_VERSION', 'V2.0.1') ?>
<?php $website_title = trim(ucwords($this->setting->sebutan_desa) . ' ' . $kabupaten['nama_desa'] . ' ' . $this->setting->sebutan_kecamatan_singkat . ' ' . $kabupaten['nama_kecamatan'] . ' ' . $this->setting->sebutan_kabupaten_singkat . ' ' . $kabupaten['nama_kabupaten']); ?>

<meta content="utf-8" http-equiv="encoding">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name='viewport' content='width=device-width, initial-scale=1' />
<meta name="google" content="notranslate" />
<meta name="theme" content="Jebred" />
<meta name="designer" content="Jebred" />
<meta name='theme:designer' content='Jebred' />
<meta name="theme:version" content="<?= THEME_VERSION ?>" />
<meta name="theme-color" content="#FFF" />
<meta name="keywords" content="<?= $profile_singkat ?> " />
<meta property="og:site_name" content="<?= $website_title ?>" />
<meta property="og:type" content="article" />
<?php if (isset($single_artikel)) : ?>
    <meta name='description' content="<?= str_replace('"', "'", substr(strip_tags($single_artikel['isi']), 0, 400)); ?>" />
    <meta property="og:title" content="<?= $single_artikel["judul"]; ?>" />
    <?php if (trim($single_artikel['gambar']) != '') : ?>
        <meta property="og:image" content="<?= base_url() ?><?= LOKASI_FOTO_ARTIKEL ?>sedang_<?= $single_artikel['gambar']; ?>" />
    <?php endif; ?>
    <meta property='og:description' content="<?= str_replace('"', "'", substr(strip_tags($single_artikel['isi']), 0, 400)); ?>" />
<?php else : ?>


    <meta name='description' content="<?= $this->setting->website_title . ' ' . $kabupaten_title; ?>" />
    <meta property="og:title" content="<?= $kabupaten_title; ?>" />
    <meta property='og:description' content="<?= $this->setting->website_title . ' ' . $kabupaten_title; ?>" />
<?php endif; ?>
<meta property='og:url' content="<?= current_url(); ?>" />
<?php if (is_file(LOKASI_LOGO . "favicon.ico")) : ?>
    <link rel="shortcut icon" href="<?= base_url() . LOKASI_LOGO ?>favicon.ico" />
<?php else : ?>
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" />
<?php endif; ?>
<script>
    const BASE_URL = '<?= base_url() ?>';
</script>