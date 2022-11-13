<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="h-100 d-inline-flex align-items-center">
	<div>
		<?php foreach ($menu_kiri as $data) : ?>

			<a href="<?= site_url("film/kategori/$data[slug]"); ?>">
				<?= $data['kategori']; ?><?php (count($data['submenu']) > 0) and print('<span class="caret"></span>'); ?>
			</a>
			<?php if (count($data['submenu']) > 0) : ?>
				<div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
					<?php foreach ($data['submenu'] as $submenu) : ?>
						<a href="<?= site_url("film/kategori/$submenu[slug]"); ?>"><?= $submenu['kategori'] ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

		<?php endforeach; ?>
	</div>
</div>