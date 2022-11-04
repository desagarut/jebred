<script type="text/javascript" src="<?= base_url() ?>assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
  tinymce.init({
    selector: 'textarea',
    height: 400,
    theme: 'silver',
    plugins: [
      "advlist autolink link image lists charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
      "table contextmenu directionality emoticons paste textcolor responsivefilemanager code laporan_keuangan penerima_bantuan sotk"
    ],
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
    toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor | print preview code | fontselect fontsizeselect",
    image_advtab: true,
    external_filemanager_path: "<?= base_url() ?>assets/filemanager/",
    filemanager_title: "Responsive Filemanager",
    filemanager_access_key: "<?= $this->session->fm_key; ?>",
    external_plugins: {
      "filemanager": "<?= base_url() ?>assets/filemanager/plugin.min.js"
    },
    templates: [{
        title: 'Test template 1',
        content: 'Test 1'
      },
      {
        title: 'Test template 2',
        content: 'Test 2'
      }
    ],
    content_css: [
      '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
      '//www.tinymce.com/css/codepen.min.css'
    ],
    relative_urls: false,
    remove_script_host: false
  });
</script>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5>Film :
            <?= $kategori['kategori']; ?>
          </h5>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#!">Web</a></li>
            <li class="breadcrumb-item active"><a href="#!">Posting Film</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <?php $this->load->view('web/film/menu'); ?>
        </div>
        <div class="col-md-9">
          <div class="row">
            <form id="validasi" action="<?= $form_action; ?>" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-header"> <a href="<?= site_url("web") ?>" class="btn btn-box btn-info btn-sm " title="Tambah Artikel"> <i class="fa fa-arrow-circle-left "></i> Kembali ke Daftar Film </a>
                      <?php if ($film['slug']) : ?>
                        <a href="<?= site_url('film/' . buat_slug($film)); ?>" target="_blank" class="btn btn-box bg-green btn-sm "><i class="fa fa-eye"></i> Lihat Film</a>
                      <?php endif; ?>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label class="control-label" for="judul">Judul Film</label>
                        <input id="judul" name="judul" class="form-control input-sm required" type="text" placeholder="Judul Film" minlength="3" maxlength="100" value="<?= htmlspecialchars($film['judul']) ?>">
                        </input>
                        <span class="help-block"><code>Judul film minimal 3 karakter dan maksimal 100 karakter</code></span>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-4">
                          <label class="control-label" for="tahun">Tahun</label>
                          <input id="tahun" name="tahun" class="form-control input-sm required" type="text" placeholder="Tahun Film" minlength="3" maxlength="100" value="<?= htmlspecialchars($film['tahun']) ?>">
                          </input>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label" for="negara1">Negara 1</label>
                          <select class="form-control input-sm required" name="negara1">
                            <option value="">Pilih Negara 1</option>
                            <?php foreach ($negara1 as $data) : ?>
                              <option value="<?= $data['nama'] ?>" <?php selected($film['negara1'], $data['nama']); ?>><?= $data['nama'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label" for="negara2">Negara 2</label>
                          <select class="form-control input-sm" name="negara2">
                            <option value="">Pilih Negara 2</option>
                            <?php foreach ($negara2 as $data) : ?>
                              <option value="<?= $data['nama'] ?>" <?php selected($film['negara2'], $data['nama']); ?>><?= $data['nama'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-4">
                          <label class="control-label" for="genre1">Genre 1</label>
                          <select class="form-control input-sm required" name="genre1">
                            <option value="">Pilih Genre 1</option>
                            <?php foreach ($genre1 as $data) : ?>
                              <option value="<?= $data['nama'] ?>" <?php selected($film['genre1'], $data['nama']); ?>><?= $data['nama'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label" for="genre2">Genre 2</label>
                          <select class="form-control input-sm required" name="genre2">
                            <option value="">Pilih Genre 2</option>
                            <?php foreach ($genre2 as $data) : ?>
                              <option value="<?= $data['nama'] ?>" <?php selected($film['genre2'], $data['nama']); ?>><?= $data['nama'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label" for="genre3">Genre 3</label>
                          <select class="form-control input-sm" name="genre3">
                            <option value="">Pilih Genre 3</option>
                            <?php foreach ($genre2 as $data) : ?>
                              <option value="<?= $data['nama'] ?>" <?php selected($film['genre3'], $data['nama']); ?>><?= $data['nama'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="link_hxfile">Link HXFILE</label>
                          <input id="link_hxfile" name="link_hxfile" class="form-control input-sm" type="text" placeholder="ex: https://hxfile.co/embed-3mjy87wsb90p.html" value="<?= htmlspecialchars($film['link_hxfile']) ?>">
                          </input>
                        </div>
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="link_lk21">Link LK-21</label>
                          <input id="link_lk21" name="link_lk21" class="form-control input-sm" type="text" placeholder="ex: http://lk......" value="<?= htmlspecialchars($film['link_lk21']) ?>">
                          </input>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="link_acefile">Link ACE FILE</label>
                          <input id="link_acefile" name="link_acefile" class="form-control input-sm" type="text" placeholder="ex: 1_KAuG5-iSHxzcZgsMiui2vXkNykZxRAN" value="<?= htmlspecialchars($film['link_acefile']) ?>">
                          </input>
                        </div>
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="link_gdiframe">Link GDIFRAME</label>
                          <input id="link_gdiframe" name="link_gdiframe" class="form-control input-sm" type="text" placeholder="link" value="<?= htmlspecialchars($film['link_gdiframe']) ?>">
                          </input>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="link_trailer">Link TRAILER</label>
                          <input id="link_trailer" name="link_trailer" class="form-control input-sm" type="text" placeholder="ex: x2PZWmnRAS8" value="<?= htmlspecialchars($film['link_trailer']) ?>">
                          </input>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="durasi">Durasi</label>
                          <input id="durasi" name="durasi" class="form-control input-sm" type="text" placeholder="ex: 120" value="<?= $film['durasi'] ?>">
                          </input>
                        </div>
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="rilis">Rilis</label>
                          <input id="rilis" name="rilis" class="form-control input-sm" type="text" placeholder="dd-mm-yyyy" value="<?= $film['rilis'] ?>">
                          </input>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-4">
                          <label class="control-label" for="artis1">Pemain 1</label>
                          <input id="artis1" name="artis1" class="form-control input-sm" type="text" placeholder="" value="<?= $film['artis1'] ?>">
                          </input>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label" for="artis2">Pemain 2</label>
                          <input id="artis2" name="artis2" class="form-control input-sm" type="text" placeholder="" value="<?= $film['artis2'] ?>">
                          </input>
                        </div>
                        <div class="form-group col-sm-4">
                          <label class="control-label" for="artis3">Pemain 3</label>
                          <input id="artis3" name="artis3" class="form-control input-sm" type="text" placeholder="" value="<?= $film['artis3'] ?>">
                          </input>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="kode_desa">Sinopsis</label>
                        <textarea name="isi" class="form-control input-sm required" style="height:350px;">
                                                    <?= $film['isi'] ?>
                                                </textarea>
                      </div>
                    </div>
                    <div class='card-footer text-right'>
                      <button type='reset' class='btn btn-box btn-danger btn-sm'><i class='fa fa-times'></i> Batal</button>
                      <button type='submit' class='btn btn-box btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Cover Film</h4>
                      <div class="card-tools"> <span title="3 New Messages" class="badge badge-primary"></span>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                      <div class="col-sm-12">
                        <div class="form-group">
                          <?php if ($film['gambar']) : ?>
                            <input type="hidden" name="old_gambar" value="<?= $film['gambar'] ?>">
                            <img class="profile-user-img img-responsive" src="<?= AmbilFotoArtikel($film['gambar'], 'kecil') ?>" alt="Cover Film">
                            <p class="text-center">
                              <label class="control-label">
                                <input type="checkbox" name="gambar_hapus" value="<?= $film['gambar'] ?>" />
                                Hapus Gambar</label>
                            </p>
                          <?php else : ?>
                            <img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>assets/files/logo/home.png" alt="Tidak Ada Gambar">
                          <?php endif; ?>
                          <label class="control-label" for="gambar">Gambar Utama</label>
                          <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="file_path">
                            <input type="file" class="hidden" id="file" name="gambar">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-box" id="file_browser"><i class="fa fa-search"></i> Browse</button>
                            </span>
                          </div>
                        </div>
                      </div>


                    </div>
                    <div class='card-footer text-right'>
                      <button type='reset' class='btn btn-box btn-danger btn-sm'><i class='fa fa-times'></i> Batal</button>
                      <button type='submit' class='btn btn-box btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</button>
                    </div>

                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Pengaturan Lainnya</h4>
                      <div class="card-tools"> <span title="3 New Messages" class="badge badge-primary"></span>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="col-sm-12">
                        <?php if ($film['dokumen']) : ?>
                          <div class="form-group">
                            <div class="mailbox-attachment-info"> <a href="<?= base_url() . LOKASI_DOKUMEN . $film['dokumen'] ?>" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Unduh Dokumen</a> </div>
                          </div>
                        <?php endif; ?>
                        <div class="form-group">
                          <label class="control-label" for="dokumen">Dokumen Lampiran</label>
                          <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="file_path4">
                            <input type="file" class="hidden" id="file4" name="dokumen">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-info btn-box" id="file_browser4"><i class="fa fa-search"></i> Browse</button>
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="nama_dokumen">Nama Dokumen</label>
                          <input id="link_dokumen" name="link_dokumen" class="form-control input-sm" type="text" value="<?= $film['link_dokumen'] ?>">
                          </input>
                          <span class="help-block"><code>(Nantinya akan menjadi link unduh/download)</code></span>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="tgl_upload">Tanggal Posting</label>
                          <div class="input-group input-group-sm date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                            <input class="form-control input-sm pull-right tgl_jam" name="tgl_upload" type="text" value="<?= $film['tgl_upload'] ?>">
                          </div>
                          <span class="help-block"><code>(Kosongkan jika ingin langsung di post, bisa digunakan untuk film terjadwal)</code></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class='card-footer text-right'>
                <button type='reset' class='btn btn-box btn-danger btn-sm'><i class='fa fa-times'></i> Batal</button>
                <button type='submit' class='btn btn-box btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>