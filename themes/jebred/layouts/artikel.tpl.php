<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes . '/partials/main/meta') ?>
<?php if($single_artikel['id']) : ?>
<?php $this->load->view($folder_themes .'/partials/main/header') ?>
<?php $this->load->view($folder_themes .'/partials/main/nav') ?>
        <?php $this->load->view($folder_themes .'/partials/article.php') ?>
<?php $this->load->view($folder_themes .'/partials/main/footer') ?>
<?php else : ?>
<?php endif ?>
