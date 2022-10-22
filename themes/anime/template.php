<!DOCTYPE html>
<html lang="en">
<?php $this->load->view($folder_themes .'/commonds/head') ?>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    
<?php $this->load->view($folder_themes .'/commonds/header') ?>
<?php $this->load->view($folder_themes . '/layouts/home.tpl.php') ?>

<?php $this->load->view($folder_themes .'/commonds/footer') ?>
</body>
</html>