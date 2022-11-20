<div class="col-lg-4 col-md-4">
  <div class="card btn-page">
    <div class="card-header">
      <h5>Layanan</h5>
    </div>
    <div class="card-body">
      <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('web') ?><?php endif; ?>" title="Posting"> <button type="button" class="btn  btn-primary">Posting Film<span class="badge badge-light"></span></button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('web_blog') ?><?php endif; ?>" title="Posting Sinopsis"> <button type="button" class="btn  btn-info">Posting Review<span class="badge badge-light"></span></button></a>

      <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('kategori/form') ?><?php endif; ?>" title="Buat Surat"> <button type="button" class="btn  btn-secondary">Kategori </span></button>
      <!--  <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('surat_masuk') ?><?php endif; ?>" title="Surat Masuk"><button type="button" class="btn  btn-success">Surat Masuk <span class="badge badge-light"></span></button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('surat_keluar') ?><?php endif; ?>" title="Surat Keluar"><button type="button" class="btn  btn-danger">Surat Keluar <span class="badge badge-light"></span></button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('permohonan_surat_admin') ?><?php endif; ?>"> <button type="button" class="btn  btn-warning">Surat Online <span class="badge badge-light"><?= $permohonan_surat ?></span></button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('mandiri') ?><?php endif; ?>" title="Buat PIN Layanan Warga "><button type="button" class="btn  btn-info">Buat PIN <span class="badge badge-light"></span></button></a>-->
        <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('mailbox') ?><?php endif; ?>"><button type="button" class="btn btn-success">Pesan <span class="badge badge-light"><?= $status ?></span></button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('komentar') ?><?php endif; ?>"><button type="button" class="btn  btn-warning">Komentar <span class="badge badge-light"><?= $komentar ?></span></button></a>
    </div>
  </div>
</div>