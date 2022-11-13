<div class="card">
  <div class="card-header">
    <h4 class="card-title">Artikel Dinamis</h4>
    <div class="card-tools"> <span title="3 New Messages" class="badge badge-primary"></span>
      <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <!-- Menu Kategori Start-->
    <div class="<?= jecho($cat, -1, 'active'); ?>"> <a href='<?= site_url("web_blog/tab/-1") ?>' class="btn btn-block btn-sm btn-warning"> Semua Kategori Artikel </a> </div>
    <!-- Sidebar Menu -->
    <div>
      <?php foreach ($list_kategori_blog as $data) : ?>
        <a href="<?= site_url("web_blog/tab/$data[id]") ?>" class="nav-link <?= jecho($cat, $data['id'], 'active'); ?>" class="btn btn-block btn-outline-success btn-sm">
          <?= $data['kategori']; ?>
        </a>
        <?php foreach ($data['submenu'] as $submenu) : ?>
          <a href="<?= site_url("web_blog/tab/$submenu[id]") ?>" class="nav-link <?= jecho($cat, $submenu['id'], 'active'); ?>" class="btn btn-block btn-outline-success btn-sm">
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
    <div class="card-tools"> <span title="3 New Messages" class="badge badge-primary"></span>
      <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
    </div>
  </div>
  <div class="card-body">
    <a href="<?= site_url('web_blog/tab/999') ?>" class="btn btn-sm btn-block btn-outline-success">Buat Artikel</a>
    <!--<a href="<?= site_url('web_blog/tab/1000') ?>" class="btn btn-sm btn-block btn-outline-success">Agenda</a>
    <a href="<?= site_url('web_blog/tab/1001') ?>" class="btn btn-sm btn-block btn-outline-success">Keuangan</a>-->
  </div>
</div>