<div class="col-md-3 wow fadeInUp" data-wow-delay="0.5s">
        <div class="h-100">
          <!-- <h6 class="section-title bg-white text-start text-danger pe-3">REKOMENDASI FILM</h6>
          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847" crossorigin="anonymous"></script>
          <ins class="adsbygoogle" style="display:block" data-ad-format="autorelaxed" data-ad-client="ca-pub-1823410826720847" data-ad-slot="1153031774"></ins>
          <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
          </script>-->

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active" role="presentation">
              <button class="nav-link active <?php ($jenis == 'populer') and print('active') ?>" id="populer-tab" data-bs-toggle="tab" data-bs-target="#populer" type="button" role="tab" aria-controls="populer" aria-selected="false">Film Populer</button>
            </li>
          </ul>

          <div class="tab-content">
            <?php foreach (array('populer' => 'arsip_populer') as $jenis => $jenis_arsip) : ?>
              <div class="tab-pane <?php ($jenis == 'populer') and print('active') ?>" id="<?= $jenis ?>" role="tabpanel" aria-labelledby="<?= $jenis ?>-tab">
                <table id="ul-menu">
                  <?php foreach ($$jenis_arsip as $arsip) : ?>
                    <tr>
                      <td valign="top" style="padding-top: 10px;">
                        <a href="<?= site_url('film/' . buat_slug($arsip)) ?>">
                          <?php if (is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $arsip[gambar])) : ?>
                            <img width="15%" style="float:left; margin:0 8px 4px 0;" class="img-fluid img-thumbnail" src="<?= base_url(LOKASI_FOTO_ARTIKEL . 'sedang_' . $arsip[gambar]) ?>" />
                          <?php else : ?>
                            <img width="15%" style="float:left; margin:0 8px 4px 0;" class="img-fluid img-thumbnail" src="<?= base_url('assets/images/404-image-not-found.jpg') ?>" />
                          <?php endif; ?>
                          <small>
                            <font color="yellow"><?= $arsip['judul'] ?></font><br />
                            Ditonton: <?= hit($arsip['hit']); ?><br />
                            <!--Tanggal Upload: <?= tgl_indo($arsip['tgl_upload']); ?><br/>
									Kategori:  <?= $arsip['kategori']; ?>
									Genre:  <?= $arsip['kategori']; ?>
									Negara:  <?= $arsip['kategori']; ?>-->

                          </small>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              </div>
            <?php endforeach ?>
          </div>

          <script>
            var firstTabEl = document.querySelector('#myTab li:last-child a')
            var firstTab = new bootstrap.Tab(firstTabEl)

            firstTab.show()
          </script>


        </div>
      </div>
