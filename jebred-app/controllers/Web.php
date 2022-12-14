<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends Admin_Controller {

	private $_set_page;

	public function __construct()
	{
		parent::__construct();
		// Jika offline_mode dalam level yang menyembunyikan website,
		// tidak perlu menampilkan halaman website
		if ($this->setting->offline_mode >= 2)
		{
			redirect('beranda');
			exit;
		}

		$this->load->model(['web_film_model', 'web_kategori_model', 'referensi_model']);
		$this->_set_page = ['20', '50', '100'];
		$this->modul_ini = 2;
	}

	public function clear()
	{
		$this->session->unset_userdata(['cari, status']);
		$this->session->per_page = $this->_set_page[0];
		$this->session->kategori = -1;
		redirect("web");
	}

	public function index($p = 1, $o = 0)
	{
		$cat = $this->session->kategori ?: -1;

		$data['p'] = $p;
		$data['o'] = $o;

		$data['cat'] = $cat;
		$data['cari'] = $this->session->cari ?: '';
		$data['status'] = $this->session->status ?: '';

		$per_page = $this->input->post('per_page');
		if (isset($per_page))
			$this->session->per_page = $per_page;

		$data['func'] = "index";
		$data['per_page'] = $this->session->per_page;
		$data['set_page'] = $this->_set_page;

		$paging = $this->web_film_model->paging($cat, $p, $o);
		$data['main'] = $this->web_film_model->list_data($cat, $o, $paging->offset, $paging->per_page);
		$data['keyword'] = $this->web_film_model->autocomplete($cat);
		$data['list_kategori'] = $this->web_film_model->list_kategori();
		$data['kategori'] = $this->web_film_model->get_kategori($cat);
		$data['negara1'] = $this->referensi_model->list_data('ref_negara');
		$data['negara2'] = $this->referensi_model->list_data('ref_negara');
		$data['genre'] = $this->referensi_model->list_data('ref_genre');
		$data = $this->security->xss_clean($data);
		$data['paging'] = $paging;

		$this->sub_modul_ini = 47;
		$this->set_minsidebar(1);
		$this->render('web/film/table', $data);
	}

	public function tab($cat = 0)
	{
		$this->session->kategori = $cat;

		redirect("web");
	}

	public function form($id = 0)
	{
		$cat = $this->session->kategori ? : 0;

		if ($id)
		{
			$cek_data = $this->web_film_model->get_artikel($id);
			if ( ! $cek_data) show_404();

			if ( ! $this->web_film_model->boleh_ubah($id, $this->session->user)) redirect("web");

			
			$this->session->kategori = $cek_data['id_kategori'];
			$data['negara1'] = $this->referensi_model->list_data('ref_negara');
			$data['negara2'] = $this->referensi_model->list_data('ref_negara');
			$data['genre1'] = $this->referensi_model->list_data('ref_genre');
			$data['genre2'] = $this->referensi_model->list_data('ref_genre');
			$data['genre3'] = $this->referensi_model->list_data('ref_genre');
			$data['film'] = $cek_data;
			$data['form_action'] = site_url("web/update/$id");
		}
		else
		{
			$data['film'] = NULL;
			$data['negara1'] = $this->referensi_model->list_data('ref_negara');
			$data['negara2'] = $this->referensi_model->list_data('ref_negara');
			$data['genre1'] = $this->referensi_model->list_data('ref_genre');
			$data['genre2'] = $this->referensi_model->list_data('ref_genre');
			$data['genre3'] = $this->referensi_model->list_data('ref_genre');
			$data['form_action'] = site_url("web/insert");
		}

		$data['cat'] = $cat;
		$data['kategori'] = $this->web_film_model->get_kategori($cat);
			$data['negara'] = $this->referensi_model->list_data('ref_negara');
			$data['genre'] = $this->referensi_model->list_data('ref_genre');

		$this->set_minsidebar(1);
		$this->render('web/film/form', $data);
	}

	public function filter($filter)
	{
		$value = $this->input->post($filter);
		if ($value != '')
			$this->session->$filter = $value;
		else $this->session->unset_userdata($filter);
		redirect("web");
	}

	public function insert()
	{
		$cat = $this->session->kategori ?: 0;

		$this->web_film_model->insert($cat);
		redirect("web");
	}

	public function update($id = 0)
	{
		$cat = $this->session->kategori ?: 0;

		if ( ! $this->web_film_model->boleh_ubah($id, $this->session->user)) redirect("web");

		$this->web_film_model->update($cat, $id);
		if ($this->session->success == -1)
			redirect("web/form/$id");
		else
			redirect("web");
	}

	public function delete($id = 0)
	{
		$this->redirect_hak_akses('h');
		$this->web_film_model->delete($id);
		redirect("web");
	}

	public function delete_all()
	{
		$this->redirect_hak_akses('h');
		$this->web_film_model->delete_all();
		redirect("web");
	}

	// TODO: Pindahkan ke controller kategori
	public function hapus()
	{
		$cat = $this->session->kategori ?: 0;

		$this->redirect_hak_akses('h');
		$this->web_film_model->hapus($cat);
		$this->session->kategori = 0;
		redirect("web");
	}

	// TODO: Pindahkan ke controller kategoris
	public function ubah_kategori_form($id = 0)
	{
		if ( ! $this->web_film_model->boleh_ubah($id, $this->session->user)) redirect("web");

		$data['list_kategori'] = $this->web_kategori_model->list_kategori("kategori");
		$data['form_action'] = site_url("web/update_kategori/$id");
		$data['kategori_sekarang'] = $this->web_film_model->get_kategori_artikel($id);
		$this->load->view('web/film/ajax_ubah_kategori_form', $data);
	}

	public function update_kategori($id = 0)
	{
		if ( ! $this->web_film_model->boleh_ubah($id, $this->session->user)) redirect("web");

		$cat = $this->input->post('kategori');
		$this->web_film_model->update_kategori($id, $cat);
		$this->session->kategori = $cat;
		redirect("web");
	}

	public function artikel_lock($id = 0, $val = 1)
	{
		// Kontributor tidak boleh mengubah status aktif film
		$this->redirect_hak_akses('u');

		$this->web_film_model->artikel_lock($id, $val);
		redirect("web");
	}

	public function komentar_lock($id = 0, $val = 1)
	{
		// Kontributor tidak boleh mengubah status komentar film
		$this->redirect_hak_akses('u');

		$this->web_film_model->komentar_lock($id, $val);
		redirect("web");
	}

	// TODO: Pindahkan ke controller kategori
	public function ajax_add_kategori($cat = 1, $p = 1, $o = 0)
	{
		$data['form_action'] = site_url("web/insert_kategori/$cat/$p/$o");
		$this->load->view('web/film/ajax_add_kategori_form', $data);
	}

	// TODO: Pindahkan ke controller kategori
	public function insert_kategori($cat = 1, $p = 1, $o = 0)
	{
		redirect_hak_akses('u', "web/index/$cat/$p/$o", 'kategori');
		$this->web_film_model->insert_kategori();
		redirect("web/index/$cat/$p/$o");
	}

	public function headline($id = 0)
	{
		// Kontributor tidak boleh melakukan ini
		$this->redirect_hak_akses('u');

		$this->web_film_model->headline($id);
		redirect("web");
	}

	public function slide($id = 0)
	{
		// Kontributor tidak boleh melakukan ini
		$this->redirect_hak_akses('u');

		$this->web_film_model->slide($id);
		redirect("web");
	}

	public function slider()
	{
		$this->sub_modul_ini = 54;

		$this->render('slider/admin_slider.php');
	}

	public function update_slider()
	{
		// Kontributor tidak boleh melakukan ini
		$this->redirect_hak_akses('u');

		$this->setting_model->update_slider();
		redirect("web/slider");
	}

	public function teks_berjalan()
	{
		$this->sub_modul_ini = 64;

		$this->render('web/admin_teks_berjalan.php');
	}

	public function update_teks_berjalan()
	{
		// Kontributor tidak boleh melakukan ini
		$this->redirect_hak_akses('u');

		$this->setting_model->update_teks_berjalan();
		redirect("web/teks_berjalan");
	}

	public function reset()
	{
		$cat = $this->session->kategori ?: 0;

		if ($cat == 999) $this->web_film_model->reset($cat);

		redirect("web");
	}
}
