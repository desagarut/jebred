<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Team Start -->

<?php $this->load->view($folder_themes . '/partials/slider') ?>
<div class="container">
  <?php //$this->load->view($folder_themes . '/partials/teks_berjalan.php') 
  ?>
  <?php $this->load->view($folder_themes . '/partials/film') ?>
  <?php $this->load->view($folder_themes . '/partials/artikel') ?>
</div>