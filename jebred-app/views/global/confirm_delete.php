<?php if ($this->CI->cek_hak_akses('h')): ?>

	<div id="confirm-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<p class="mb-0">Anda akan menghapus data!</p>
					<p><b>Apakah Anda yakin ingin menghapus data ini?</b></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn  btn-secondary" data-dismiss="modal">Batal</button>
					<a class='btn-ok'><button type="button" class="btn  btn-danger">Ya Hapus</button></a>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
