<div class="card">
  <div class="card-body no-padding">
    <!-- <h3 class="card-title"> -->
    <div class="nav nav-pills nav-stacked">
      <a href="<?= site_url('web/tab/-1') ?>" class="<?= jecho($cat, -1, 'active'); ?> btn btn-block btn-info "> Semua Kategori Film </a>
</div>
    <!-- </h3> -->
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Kategori Film</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>  
  </div>
  <div class="card-body">
    <div class="nav nav-pills flex-column">
      <?php foreach ($list_kategori as $data) : ?>
        <a href="<?= site_url('web/tab/$data[id]') ?>" class="<?= jecho($cat, $data['id'], 'active'); ?> btn btn-sm btn-block btn-default text-left">
            <?= $data['kategori']; ?>
          </a>
        <?php foreach ($data['submenu'] as $submenu) : ?>
          <a href="<?= site_url('web/tab/$submenu[id]') ?>" class="<?= jecho($cat, $submenu['id'], 'active'); ?> btn btn-block btn-default text-left"> &emsp;
              <?= $submenu['kategori']; ?>
            </a>
        <?php endforeach; ?>
      <?php endforeach; ?>
        </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Artikel Statis</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
      </button>
    </div>  
  </div>
  <div class="card-body">
    <div class="nav nav-pills flex-column">
      <a href="<?= site_url('web/tab/999') ?>" class="<?= jecho($cat, 999, 'active'); ?> btn btn-sm btn-block btn-default text-left">Halaman Statis</a>
      <a href="<?= site_url('web/tab/1000') ?>" class="<?= jecho($cat, 1000, 'active'); ?> btn btn-sm btn-block btn-default text-left">Agenda</a>
      <a href="<?= site_url('web/tab/1001') ?>" class="<?= jecho($cat, 1001, 'active'); ?> btn btn-sm btn-block btn-default text-left">Keuangan</a>
    </div>
  </div>
</div>