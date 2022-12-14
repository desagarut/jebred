<div class='modal-body'>
	<div class="row">
		<div class="col-sm-12">
			<div class="card card-danger">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered dataTable table-hover nowrap">
							<thead class="bg-gray disabled color-palette">
								<tr>
									<th>No</th>
									<th>Nama Rumah</th>
									<th>Tgl. Unggah</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($list_rumah as $data): ?>
									<tr>
										<td><?= $data['no']?></td>
										<td><a href="<?= base_url().LOKASI_RUMAH?><?= urlencode($data['satuan'])?>" ><?= $data['nama']?></a></td>
										<td><?= tgl_indo2($data['tgl_upload'])?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
