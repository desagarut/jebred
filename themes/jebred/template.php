<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view($folder_themes . '/partials/main/meta') ?>
  <?php $this->load->view($folder_themes . '/partials/main/head') ?>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847" crossorigin="anonymous"></script>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-SGEGS5PF1H"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-SGEGS5PF1H');
  </script>
</head>

<body>
  <?php $this->load->view($folder_themes . '/partials/main/nav') ?>
  <?php $this->load->view($folder_themes . '/layouts/home.tpl.php') ?>
  <?php $this->load->view($folder_themes . '/partials/main/footer') ?>
</body>

</html>