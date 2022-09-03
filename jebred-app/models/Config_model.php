<?php

class Config_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_data()
	{
		$query = $this->db->select('*')->limit(1)->get('config')->row_array();
		return $query;
	}

	public function insert()
	{
		$data = $this->bersihkan_post();
		$data['id'] = 1; // Hanya ada satu row data desa
		// Data lokasi peta default. Diperlukan untuk menampilkan widget peta lokasi
		$data['lat'] = '-8.488005310891758';
		$data['lng'] = '116.0406072534065';
		$data['zoom'] = '19';
		$data['map_tipe'] = 'roadmap';
		unset($data['old_logo']);
		unset($data['old_kantor_kecamatan']);
		$data['logo'] = $this->upload_gambar_kecamatan('logo');
		$data['kantor_kecamatan'] = $this->upload_gambar_kecamatan('kantor_kecamatan');
		if (!empty($data['logo']))
		{
			// Ada logo yang berhasil diunggah --> simpan ukuran 100 x 100
			$tipe_file = TipeFile($_FILES['logo']);
			$dimensi = array("width"=>100, "height"=>100);
			resizeImage(LOKASI_LOGO.$data['logo'], $tipe_file, $dimensi);
			resizeImage(LOKASI_LOGO.$data['logo'], $tipe_file, array("width"=>16, "height"=>16), LOKASI_LOGO.'favicon.ico');
		}
		else
		{
			unset($data['logo']);
		}
		unset($data['file_logo']);
		unset($data['file_kantor_kecamatan']);
		$outp = $this->db->insert('config', $data);
		status_sukses($outp); //Tampilkan Pesan
	}

	// TODO: tambahkan validasi di form Identitas Desa
	private function bersihkan_post()
	{
		$post = $this->input->post();
		$data['old_logo'] = $post['old_logo'];
		$data['old_kantor_kecamatan'] = $post['old_kantor_kecamatan'];
		$data['kode_pos'] = bilangan($post['kode_pos']);
		$data['alamat_kantor_kecamatan'] = alamat($post['alamat_kantor_kecamatan']);
		$data['email_kecamatan'] = email($post['email_kecamatan']);
		$data['telepon_kecamatan'] = bilangan($post['telepon_kecamatan']);
		$data['website_kecamatan'] = alamat_web($post['website_kecamatan']);
		$data['nama_kecamatan'] = nama_terbatas($post['nama_kecamatan']);
		$data['kode_kecamatan'] = bilangan($post['kode_kecamatan']);
		$data['nama_camat'] = nama($post['nama_camat']);
		$data['nip_camat'] = nomor_surat_keputusan($post['nip_camat']);
		$data['nama_kabupaten'] = nama($post['nama_kabupaten']);
		$data['kode_kabupaten'] = bilangan($post['kode_kabupaten']);
		$data['nama_propinsi'] = nama_terbatas($post['nama_propinsi']);
		$data['kode_propinsi'] = bilangan($post['kode_propinsi']);
		$data['batas_utara'] = $post['batas_utara'];
		$data['batas_selatan'] = $post['batas_selatan'];
		$data['batas_timur'] = $post['batas_timur'];
		$data['batas_barat'] = $post['batas_barat'];
		$data['mdpl'] = $post['mdpl'];
		$data['luas_wilayah'] = $post['luas_wilayah'];
		$data['terluar_id'] = $post['terluar_id'];
		$data['terluar_prov'] = $post['terluar_prov'];
		$data['terluar_kab'] = $post['terluar_kab'];
		$data['terluar_kec'] = $post['terluar_kec'];
		$data['profil_singkat'] = $post['profil_singkat'];
		$data['visi'] = $post['visi'];
		$data['misi'] = $post['misi'];
		$data['strategi'] = $post['strategi'];
		return $data;
	}

	public function update($id=0)
	{
		$_SESSION['success'] = 1;
		$_SESSION['error_msg'] = '';

		$data = $this->bersihkan_post();
		$data['logo'] = $this->upload_gambar_kecamatan('logo');
		$data['kantor_kecamatan'] = $this->upload_gambar_kecamatan('kantor_kecamatan');

		if (!empty($data['logo']))
		{
			// Ada logo yang berhasil diunggah --> simpan ukuran 100 x 100
			$tipe_file = TipeFile($_FILES['logo']);
			$dimensi = array("width"=>100, "height"=>100);
			resizeImage(LOKASI_LOGO.$data['logo'], $tipe_file, $dimensi);
			resizeImage(LOKASI_LOGO.$data['logo'], $tipe_file, array("width"=>16, "height"=>16), LOKASI_LOGO.'favicon.ico');
			// Hapus berkas logo lama
		  if (!empty($data['old_logo'])) unlink(LOKASI_LOGO.$data['old_logo']);
		}
		else
		{
			unset($data['logo']);
		}

		if (empty($data['kantor_kecamatan'])) unset($data['kantor_kecamatan']);

		unset($data['file_logo']);
		unset($data['old_logo']);
		unset($data['file_kantor_kecamatan']);
		unset($data['old_kantor_kecamatan']);
		$this->db->where('id',$id)->update('config', $data);

		$pamong['pamong_nama'] = $data['nama_kepala_desa'];
		$pamong['pamong_nip'] = $data['nip_kepala_desa'];
		$this->db->where('pamong_id','707');
		$outp = $this->db->update('tweb_pamong', $pamong);

		if (!$outp) $_SESSION['success'] = -1;
	}

	/*
		Returns:
			- success: nama berkas yang diunggah
			- fail: NULL
	*/
	private function upload_gambar_kecamatan($jenis)
	{
		$this->load->library('upload');
		$this->uploadConfig = array(
			'upload_path' => LOKASI_LOGO,
			'allowed_types' => 'gif|jpg|jpeg|png',
			'max_size' => max_upload() * 1024,
		);
		// Adakah berkas yang disertakan?
		$adaBerkas = !empty($_FILES[$jenis]['name']);
		if ($adaBerkas !== TRUE)
		{
			return NULL;
		}
		// Tes tidak berisi script PHP
		if (isPHP($_FILES['logo']['tmp_name'], $_FILES[$jeniss]['name']))
		{
			$_SESSION['error_msg'] .= " -> Jenis file ini tidak diperbolehkan ";
			$_SESSION['success'] = -1;
			redirect('identitas_instansi');
		}

		$uploadData = NULL;
		// Inisialisasi library 'upload'
		$this->upload->initialize($this->uploadConfig);
		// Upload sukses
		if ($this->upload->do_upload($jenis))
		{
			$uploadData = $this->upload->data();
			// Buat nama file unik agar url file susah ditebak dari browser
			$namaFileUnik = tambahSuffixUniqueKeNamaFile($uploadData['file_name']);
			// Ganti nama file asli dengan nama unik untuk mencegah akses langsung dari browser
			$fileRenamed = rename(
				$this->uploadConfig['upload_path'].$uploadData['file_name'],
				$this->uploadConfig['upload_path'].$namaFileUnik
			);
			// Ganti nama di array upload jika file berhasil di-rename --
			// jika rename gagal, fallback ke nama asli
			$uploadData['file_name'] = $fileRenamed ? $namaFileUnik : $uploadData['file_name'];
		}
		// Upload gagal
		else
		{
			$_SESSION['success'] = -1;
			$_SESSION['error_msg'] = $this->upload->display_errors(NULL, NULL);
		}
		return (!empty($uploadData)) ? $uploadData['file_name'] : NULL;
	}

	public function update_kantor()
	{
		$data = $_POST;
		$id = "1";
		$this->db->where('id', $id);
		$outp = $this->db->update('config', $data);

		status_sukses($outp); //Tampilkan Pesan
	}

	public function update_wilayah()
	{
		$data = $_POST;
		$id = "1";
		$this->db->where('id', $id);
		$outp = $this->db->update('config', $data);

		status_sukses($outp); //Tampilkan Pesan
	}

}
