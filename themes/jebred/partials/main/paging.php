<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php
$pages = array();
for ($i = $paging->start_link; $i <= $paging->end_link; $i++) {
	array_push($pages, $i);
}
?>

<div class="btn wow fadeInUp" data-wow-delay="0.1s" align="center">
	<?php if ((int) $paging->end_link > 1) : ?>
		<div class="justify-content-center">
			<?php if ($paging->start_link) : ?>
				<a class="disabled" href="<?= site_url('first/' . $paging_page . '/' . $paging->start_link) ?>"> <i class="fa fa-arrow-left"></i></a>
			<?php endif ?>
			<?php if ($paging->prev) : ?>
				<a class="disabled" href="<?= site_url('first/' . $paging_page . '/' . $paging->prev . $paging->suffix) ?>"></a>
			<?php endif ?>
			<?php foreach ($pages as $page) : ?>
				<a class="active btn btn-warning" href="<?= site_url('first/' . $paging_page . '/' . $page . $paging->suffix) ?>"> <?= $page ?> </a>
			<?php endforeach ?>
			<?php if ($paging->next) : ?>
				<a class="disabled" href="<?= site_url('first/' . $paging_page . '/' . $paging->next . $paging->suffix) ?>"></a>
			<?php endif ?>
			<?php if ($paging->end_link) : ?>
				<a class="disabled" href="<?= site_url('first/' . $paging_page . '/' . $paging->end_link) ?>"> <i class="fa fa-arrow-right"></i></a>
			<?php endif ?>
			</div>
	<?php endif ?>
</div>