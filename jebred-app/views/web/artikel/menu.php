					<div class="card card-info">
						<div class="card-body no-padding">
							<!-- <h3 class="card-title"> -->
								<ul class="nav nav-pills nav-stacked">
									<li class="<?= jecho($cat, -1, 'active'); ?>">
										<a href='<?= site_url("web/tab/-1")?>'>
											Semua Artikel Dinamis
										</a>
									</li>
								</ul>
							<!-- </h3> -->
						</div>
					</div>
					<div class="card card-info">
						<div class="card-header with-border">
							<h3 class="card-title">Kategori Artikel</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-card-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="card-body no-padding">
                        <!-- Menu Kategori Start-->
                        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <?php foreach ($list_kategori AS $data): ?>
          <li class="nav-item">
            <a href="<?= site_url("web/tab/$data[id]")?>" class="nav-link <?= jecho($cat, $data['id'], 'active'); ?>">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                <?= $data['kategori'];?>
                    <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
            <?php foreach($data['submenu'] as $submenu): ?>
              <li class="nav-item">
                <a href="<?= site_url("web/tab/$submenu[id]")?>" class="nav-link <?= jecho($cat, $submenu['id'], 'active'); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?= $submenu['kategori'];?>
                  </p>
                </a>
              </li>
			<?php endforeach; ?>
            </ul>
            
          </li>
        <?php endforeach; ?>

          </ul>
          </nav>
                        
                        <!-- Menu Kategori End -->
<!--                        
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
								<?php foreach ($list_kategori AS $data): ?>
                                
									<li class="<?= jecho($cat, $data['id'], 'active'); ?>">
										<a href='<?= site_url("web/tab/$data[id]")?>'>
											<?= $data['kategori'];?>
										</a>
									</li>
                                    
									<?php foreach($data['submenu'] as $submenu): ?>
										<li class="<?= jecho($cat, $submenu['id'], 'active'); ?>">
											<a href='<?= site_url("web/tab/$submenu[id]")?>'>
												&emsp;<?= $submenu['kategori'];?>
											</a>
										</li>
									<?php endforeach; ?>
                                    
								<?php endforeach; ?>
                                </div>-->
						</div>
					</div>
					<div class="card card-info">
						<div class="card-header with-border">
							<h3 class="card-title">Artikel Statis</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-card-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="card-body no-padding">
							<ul class="nav nav-pills nav-stacked">
								<li class="<?= jecho($cat, 999, 'active'); ?>"><a href="<?= site_url('web/tab/999')?>">Halaman Statis</a></li>
								<li class="<?= jecho($cat, 1000, 'active'); ?>"><a href="<?= site_url('web/tab/1000')?>">Agenda</a></li>
								<li class="<?= jecho($cat, 1001, 'active'); ?>"><a href="<?= site_url('web/tab/1001')?>">Keuangan</a></li>
							</ul>
						</div>
					</div>
