<script>
  $(function() {
    var keyword = <?= $keyword ?>;
    $("#cari").autocomplete({
      source: keyword,
      maxShowItems: 10,
    });
  });
</script>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Film :
            <?= $kategori['kategori']; ?>
          </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#!">Web</a></li>
            <li class="breadcrumb-item active">Film</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <?php $this->load->view('web/film/menu'); ?>
        </div>
        <div class="col-md-9">
          <form id="mainform" name="mainform" action="" method="post">
            <div class="card">
              <div class="card-header">
                <?php if ($this->CI->cek_hak_akses('h')) : ?>
                  <?php if ($cat > 0) : ?>
                    <a href="<?= site_url("web/form") ?>" class="btn btn-box btn-success btn-sm btn-sm " title="Tambah Artikel"> <i class="fa fa-plus"></i> Tambah
                      <?php if ($kategori) : ?>
                        <?= $kategori['kategori']; ?>
                      <?php elseif ($cat == 1000) : ?>
                        Agenda
                      <?php elseif ($cat == 1001) : ?>
                        Artikel Keuangan
                      <?php else : ?>
                        Artikel Statis
                      <?php endif; ?>
                      Baru </a>
                  <?php endif; ?>
                  <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("web/delete_all") ?>')" class="btn btn-box btn-danger btn-sm  hapus-terpilih"><i class='fa fa-trash'></i> Hapus Data Terpilih</a>
                  <?php if ($cat > 0 and $cat < 999) : ?>
                    <a href="#confirm-delete" title="Hapus Kategori <?= $kategori['kategori'] ?>" onclick="deleteAllBox('mainform', '<?= site_url("web/hapus") ?>')" class="btn btn-box btn-danger btn-sm "><i class='fa fa-trash'></i> Hapus Kategori
                      <?= $kategori['kategori'] ?>
                    </a>
                  <?php endif; ?>
                  <?php if ($cat == 999) : ?>
                    <a href="<?= site_url("web/reset") ?>" class="btn btn-box bg-purple btn-sm " title="Reset Hit" data-toggle="modal" data-target="#reset-hit" data-remote="false"><i class="fa fa-spinner"></i> Reset Hit</a>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
              <div class="card-body">
                <form id="mainform" name="mainform" action="" method="post">
                  <div class="card">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-sm-3">
                          <select class="form-control input-sm " name="status" onchange="formAction('mainform', '<?= site_url("web/filter/status/$cat") ?>')">
                            <option value="">Semua Posting</option>
                            <option value="1" <?php selected($status, 1); ?>>Aktif</option>
                            <option value="2" <?php selected($status, 2); ?>>Tidak Aktif</option>
                          </select>
                        </div>
                        <div class="col-sm-9">
                          <div class="input-group input-group float-right col-md-4">
                            <input name="cari" id="cari" class="form-control  float-right" placeholder="Cari..." type="text" value="<?= html_escape($cari) ?>" onkeypress="if (event.keyCode == 13):$('#'+'mainform').attr('action', '<?= site_url('web/filter/cari/$cat') ?>');$('#'+'mainform').submit();endif">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("web/filter/cari/$cat") ?>');$('#'+'mainform').submit();"> <i class="fas fa-search"></i> </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th><input type="checkbox" id="checkall" /></th>
                            <th>No</th>
                            <th>Aksi</th>
                            <?php if ($o == 2) : ?>
                              <th width="50%"><a href="<?= site_url("web/index/$p/1") ?>">Judul <i class='fa fa-sort-asc fa-sm'></i></a></th>
                            <?php elseif ($o == 1) : ?>
                              <th width="50%"><a href="<?= site_url("web/index/$p/2") ?>">Judul <i class='fa fa-sort-desc fa-sm'></i></a></th>
                            <?php else : ?>
                              <th width="50%"><a href="<?= site_url("web/index/$p/1") ?>">Judul <i class='fa fa-sort fa-sm'></i></a></th>
                              <th nowrap="nowrap">Tahun</th>
                              <th nowrap="nowrap">Negara</th>
                              <th nowrap="nowrap">Genre</th>
                              <th nowrap="nowrap">Kategori</th>
                            <?php endif; ?>
                            <?php if ($o == 4) : ?>
                              <th nowrap><a href="<?= site_url("web/index/$p/3") ?>">Hit <i class='fa fa-sort-asc fa-sm'></i></a></th>
                            <?php elseif ($o == 3) : ?>
                              <th nowrap><a href="<?= site_url("web/index/$p/4") ?>">Hit <i class='fa fa-sort-desc fa-sm'></i></a></th>
                            <?php else : ?>
                              <th nowrap><a href="<?= site_url("web/index/$p/3") ?>">Hit <i class='fa fa-sort fa-sm'></i></a></th>
                            <?php endif; ?>
                            <?php if ($o == 6) : ?>
                              <th nowrap><a href="<?= site_url("web/index/$p/5") ?>">Diposting Pada <i class='fa fa-sort-asc fa-sm'></i></a></th>
                            <?php elseif ($o == 5) : ?>
                              <th nowrap><a href="<?= site_url("web/index/$p/6") ?>">Diposting Pada <i class='fa fa-sort-desc fa-sm'></i></a></th>
                            <?php else : ?>
                              <th nowrap><a href="<?= site_url("web/index/$p/5") ?>">Diposting Pada <i class='fa fa-sort fa-sm'></i></a></th>
                            <?php endif; ?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($main as $data) : ?>
                            <tr data-widget="expandable-table" aria-expanded="false">
                              <td class="padat"><input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>" <?php $data['boleh_ubah'] or print('disabled') ?> /></td>
                              <td class="padat"><?= $data['no'] ?></td>
                              <td nowrap><?php if ($data['boleh_ubah']) : ?>
                                  <?php if ($this->CI->cek_hak_akses('u')) : ?>
                                    <a href="<?= site_url("web/form/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a> <a href="#" data-href="<?= site_url("web/delete/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a> <a href="<?= site_url("web/ubah_kategori_form/$data[id]") ?>" class="btn bg-purple btn-box btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Kategori" title="Ubah Kategori"><i class="fa fa-folder-open"></i></a>
                                  <?php endif; ?>
                                  <?php if ($data['boleh_komentar'] == 1) : ?>
                                    <a href="<?= site_url("web/komentar_lock/$data[id]/2") ?>" class="btn bg-info btn-box btn-sm" title="Tutup Komentar Artikel"><i class="fa fa-comment"></i></a>
                                  <?php else : ?>
                                    <a href="<?= site_url("web/komentar_lock/$data[id]/1") ?>" class="btn bg-info btn-box btn-sm" title="Buka Komentar Artikel"><i class="fa fa-comment"></i></a>
                                  <?php endif ?>
                                  <br />
                                  <?php if ($data['enabled'] == '1') : ?>
                                    <a href="<?= site_url("web/artikel_lock/$data[id]/2"); ?>" class="btn bg-navy btn-box btn-sm" title="Non Aktifkan Artikel"><i class="fa fa-unlock"></i></a> <a href="<?= site_url("web/headline/$data[id]") ?>" class="btn bg-teal btn-box btn-sm" title="Jadikan Headline"> <i class="<?= ($data['headline'] == 1) ? 'fa fa-star-o' : 'fa fa-star' ?>"></i> </a> <a href="<?= site_url("web/slide/$data[id]"); ?>" class="btn bg-gray btn-box btn-sm" title="<?= ($data['headline'] == 3) ? 'Keluarkan dari slide' : 'Masukkan ke dalam slide' ?>"> <i class="<?= ($data['headline'] == 3) ? 'fa fa-pause' : 'fa fa-play' ?>"></i> </a>
                                  <?php else : ?>
                                    <a href="<?= site_url("web/artikel_lock/$data[id]/1"); ?>" class="btn bg-navy btn-box btn-sm" title="Aktifkan Artikel"><i class="fa fa-lock"></i></a>
                                  <?php endif ?>
                                <?php endif; ?>
                                <a href="<?= site_url('film/' . buat_slug($data)); ?>" target="_blank" class="btn bg-green btn-box btn-sm" title="Lihat Artikel"><i class="fa fa-eye"></i></a>
                              </td>
                              <td><?= $data['judul'] ?></td>
                              <td><?= $data['tahun'] ?></td>
                              <td><?= $data['negara1'] ?>
                                ,<br />
                                <?= $data['negara2'] ?>
                                ,<br />
                                <?= $data['negara3'] ?></td>
                              <td><?= $data['genre1'] ?>
                                ,<br />
                                <?= $data['genre2'] ?>
                                ,<br />
                                <?= $data['genre3'] ?></td>
                              <td><?= $data['id_kategori'] ?></td>
                              <td nowrap><?= hit($data['hit']) ?></td>
                              <td nowrap><?= tgl_indo2($data['tgl_upload']) ?></td>
                            </tr>
                            <tr class="expandable-body">
                              <td colspan="10">
                                <p>
                                  Link FEMBED <?= $data['link_fembed'] ?><br />
                                  <br />
                                  Link FEMBED <?= $data['link_fembed'] ?><br />
                                </p>

                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </form>
                <?php $this->load->view('global/paging'); ?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('global/confirm_delete'); ?>
<form action="<?= site_url("web/reset") ?>" method="post">
  <div class='modal fade' id='reset-hit' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title' id='myModalLabel'></i> Reset Hit</h4>
        </div>
        <div class='modal-body'>
          <div class="form-group"> <code>Lakukan hapus hit ini jika film statis di menu atas website anda terkena kunjungan tak terduga, seperti robot(crawler), yang berlebihan. </code><br>
            <br>
            <label for="hit">Reset Hit</label>
            <select class="form-control input-sm" required name="hit" width="100%">
              <option value="">Pilih persen hit yang akan dihapus</option>
              <?php for ($i = 1; $i <= 10; $i++) : ?>
                <option value="<?= ($i * 10) ?>">
                  <?= ($i * 10) . '%' ?>
                </option>
              <?php endfor; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-box btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
          <button type="submit" class="btn btn-box btn-info btn-sm"><i class='fa fa-check'></i> Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>