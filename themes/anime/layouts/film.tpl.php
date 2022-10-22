<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<?php $this->load->view($folder_themes .'/commonds/head') ?>
<body>
<?php $this->load->view($folder_themes .'/commonds/header') ?>
<?php $this->load->view($folder_themes . '/partials/film_details.php') ?>

<?php $this->load->view($folder_themes .'/commonds/footer') ?>
</body>
</html>