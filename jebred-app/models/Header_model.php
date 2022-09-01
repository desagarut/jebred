<?php

class Header_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('config_model');
	}

	// Data penduduk yang digunakan untuk ditampilkan di Widget halaman dashbord (Home SID)
	public function penduduk_total()
	{
		$sql = "SELECT COUNT(id) AS jumlah FROM tweb_penduduk WHERE status_dasar = 1";
		$query = $this->db->query($sql);
		$data = $query->result_array();
		return $data;
	}

	public function keluarga_total()
	{
		$data = $this->db->select('COUNT(*) AS jumlah')
			->from('tweb_keluarga u')
			->join('tweb_penduduk t', 'u.nik_kepala = t.id', 'left')
			->where('t.status_dasar', '1')
			->where('t.kk_level', '1')
			->get()->result_array();
		return $data;
	}

	public function bantuan_total()
	{
		$jml_program = $this->db->select('COUNT(id) as jml')
			->get('program')
			->row()->jml;
		if (empty($jml_program))
		{
			$data['jumlah'] = 0;
			$data['nama'] = 'Bantuan';
			$data['link_detail'] = 'program_bantuan';
			return $data;
		}

		if (empty($this->setting->dashboard_program_bantuan))
			$this->setting->dashboard_program_bantuan = 1;
		$data = $this->db->select('COUNT(pp.id) AS jumlah')
			->select('nama')
			->from('program p')
			->join('program_peserta pp', 'p.id = pp.program_id', 'left')
			->where('p.id', $this->setting->dashboard_program_bantuan)
			->get()
			->row_array();
		$data['link_detail'] = 'statistik/clear/50'.$this->setting->dashboard_program_bantuan;
		return $data;
	}

	public function kelompok_total()
	{
		$sql = "SELECT COUNT(id) AS jumlah FROM kelompok";
		$query = $this->db->query($sql);
		$data = $query->result_array();
		return $data;
	}

	public function rtm_total()
	{
		$sql = "SELECT COUNT(id) AS jumlah FROM tweb_penduduk WHERE rtm_level = 1";
		$query = $this->db->query($sql);
		$data = $query->result_array();
		return $data;
	}

	public function dusun_total()
	{
		$sql = "SELECT COUNT(id) AS jumlah FROM tweb_wilayah WHERE rt = '0' AND rw = '0' ";
		$query = $this->db->query($sql);
		$data = $query->result_array();
		return $data;
	}

	// ---
	public function get_data()
	{
	/*
	 * global variabel
	 * */
		$outp["sasaran"] = array("1"=>"Penduduk", "2"=>"Keluarga / KK", "3"=>"Rumah Tangga", "4"=>"Kelompok/Organisasi Kemasyarakatan");

		/*
		 * Pembenahan per 13 Juli 15, sebelumnya ada notifikasi Error, saat $_SESSOIN['user'] nya kosong!
		 * */
		$id = @$_SESSION['user'];
		$sql = "SELECT nama,foto FROM user WHERE id = ?";
		$query = $this->db->query($sql, $id);
		if ($query)
		{
			if ($query->num_rows() > 0)
			{
				$data  = $query->row_array();
				$outp['nama'] = $data['nama'];
				$outp['foto'] = $data['foto'];
			}
		}

		$outp['desa'] = $this->config_model->get_data();

		$sql = "SELECT COUNT(id) AS jml FROM komentar WHERE id_artikel = 775 AND status = 2;";
		$query = $this->db->query($sql);
		$lap = $query->row_array();
		$outp['lapor'] = $lap['jml'];

		$this->load->model('modul_model');
		$outp['modul'] = $this->modul_model->list_aktif();

		return $outp;
	}
}
