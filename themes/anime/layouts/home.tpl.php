<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes .'/partials/ads_banner_top') ?>
<?php //$this->load->view($folder_themes .'/partials/slider') ?>

<section class="product spad">
  <div class="container">
    <div class="row">
    <div class="col-lg-12">
      <?php $this->load->view($folder_themes .'/partials/trending.php') ?>
      <?php //$this->load->view($folder_themes .'/partials/recent.php') ?>
      <?php //$this->load->view($folder_themes .'/partials/live.php') ?>
    </div>
    <!--<div class="col-lg-4 col-md-6 col-sm-8">
      <?php //$this->load->view($folder_themes .'/partials/side_right.php') ?>
    </div>-->
    </div>
  </div>
</section>
