<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php defined('THEME_VERSION') or define('THEME_VERSION', 'V2.0.1') ?>
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
<?php if (isset($single_film)) : ?>
    <meta name='description' content="<?= str_replace('"', "'", substr(strip_tags($single_film['isi']), 0, 400)); ?>" />
    <meta property="og:title" content="<?= $single_film["judul"]; ?>" />
    <?php if (trim($single_film['gambar']) != '') : ?>
        <meta property="og:image" content="<?= base_url() ?><?= LOKASI_FOTO_ARTIKEL ?>sedang_<?= $single_film['gambar']; ?>" />
    <?php endif; ?>
    <meta property='og:description' content="<?= str_replace('"', "'", substr(strip_tags($single_film['isi']), 0, 400)); ?>" />
<?php else : ?>

    <meta name='description' content="Jebred - Nonton Online Film Gratis jebred Movie, Jebred Film, Jebread Streaming" />
    <meta property="og:title" content="Nonton Online Film Gratis" />
    <meta property='og:description' content="Jebred - Nonton Online Film Gratis jebred Movie, Jebred Film, Jebread Streaming" />
    <meta property="og:site_name" content="<?= $website_title ?>" />
    <meta property="og:type" content="article" />
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