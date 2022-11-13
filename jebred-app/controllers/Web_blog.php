<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Web_blog extends Admin_Controller {

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

		$this->load->model(['web_artikel_blog_model', 'web_kategori_blog_model']);
		$this->_set_page = ['20', '50', '100'];
		$this->modul_ini = 3;
	}

	public function clear()
	{
		$this->session->unset_userdata(['cari, status']);
		$this->session->per_page = $this->_set_page[0];
		$this->session->kategori = -1;
		redirect("web_blog");
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

		$paging = $this->web_artikel_blog_model->paging($cat, $p, $o);
		$data['main'] = $this->web_artikel_blog_model->list_data($cat, $o, $paging->offset, $paging->per_page);
		$data['keyword'] = $this->web_artikel_blog_model->autocomplete($cat);
		$data['list_kategori_blog'] = $this->web_artikel_blog_model->list_kategori_blog();
		$data['kategori'] = $this->web_artikel_blog_model->get_kategori($cat);
		$data = $this->security->xss_clean($data);
		$data['paging'] = $paging;

		$this->sub_modul_ini = 47;
		$this->set_minsidebar(1);
		$this->render('web_blog/artikel/table', $data);
	}

	public function tab($cat = 0)
	{
		$this->session->kategori = $cat;

		redirect("web_blog");
	}

	public function form($id = 0)
	{
		$cat = $this->session->kategori ? : 0;

		if ($id)
		{
			$cek_data = $this->web_artikel_blog_model->get_artikel($id);
			if ( ! $cek_data) show_404();

			if ( ! $this->web_artikel_blog_model->boleh_ubah($id, $this->session->user)) redirect("web_blog");

			$this->session->kategori = $cek_data['id_kategori'];
			$data['artikel'] = $cek_data;
			$data['form_action'] = site_url("web_blog/update/$id");
		}
		else
		{
			$data['artikel'] = NULL;
			$data['form_action'] = site_url("web_blog/insert");
		}

		$data['cat'] = $cat;
		$data['kategori'] = $this->web_artikel_blog_model->get_kategori($cat);

		$this->set_minsidebar(1);
		$this->render('web_blog/artikel/form', $data);
	}

	public function filter($filter)
	{
		$value = $this->input->post($filter);
		if ($value != '')
			$this->session->$filter = $value;
		else $this->session->unset_userdata($filter);
		redirect("web_blog");
	}

	public function insert()
	{
		$cat = $this->session->kategori ?: 0;

		$this->web_artikel_blog_model->insert($cat);
		redirect("web_blog");
	}

	public function update($id = 0)
	{
		$cat = $this->session->kategori ?: 0;

		if ( ! $this->web_artikel_blog_model->boleh_ubah($id, $this->session->user)) redirect("web_blog");

		$this->web_artikel_blog_model->update($cat, $id);
		if ($this->session->success == -1)
			redirect("web_blog/form/$id");
		else
			redirect("web_blog");
	}

	public function delete($id = 0)
	{
		$this->redirect_hak_akses('h');
		$this->web_artikel_blog_model->delete($id);
		redirect("web_blog");
	}

	public function delete_all()
	{
		$this->redirect_hak_akses('h');
		$this->web_artikel_blog_model->delete_all();
		redirect("web_blog");
	}

	// TODO: Pindahkan ke controller kategori
	public function hapus()
	{
		$cat = $this->session->kategori ?: 0;

		$this->redirect_hak_akses('h');
		$this->web_artikel_blog_model->hapus($cat);
		$this->session->kategori = 0;
		redirect("web_blog");
	}

	// TODO: Pindahkan ke controller kategoris
	public function ubah_kategori_form($id = 0)
	{
		if ( ! $this->web_artikel_blog_model->boleh_ubah($id, $this->session->user)) redirect("web_blog");

		$data['list_kategori_blog'] = $this->web_kategori_blog_model->list_kategori_blog("kategori");
		$data['form_action'] = site_url("web_blog/update_kategori/$id");
		$data['kategori_sekarang'] = $this->web_artikel_blog_model->get_kategori_artikel($id);
		$this->load->view('web_blog/artikel/ajax_ubah_kategori_form', $data);
	}

	public function update_kategori($id = 0)
	{
		if ( ! $this->web_artikel_blog_model->boleh_ubah($id, $this->session->user)) redirect("web_blog");

		$cat = $this->input->post('kategori');
		$this->web_artikel_blog_model->update_kategori($id, $cat);
		$this->session->kategori = $cat;
		redirect("web_blog");
	}

	public function artikel_lock($id = 0, $val = 1)
	{
		// Kontributor tidak boleh mengubah status aktif artikel
		$this->redirect_hak_akses('u');

		$this->web_artikel_blog_model->artikel_lock($id, $val);
		redirect("web_blog");
	}

	public function komentar_lock($id = 0, $val = 1)
	{
		// Kontributor tidak boleh mengubah status komentar artikel
		$this->redirect_hak_akses('u');

		$this->web_artikel_blog_model->komentar_lock($id, $val);
		redirect("web_blog");
	}

	// TODO: Pindahkan ke controller kategori
	public function ajax_add_kategori($cat = 1, $p = 1, $o = 0)
	{
		$data['form_action'] = site_url("web_blog/insert_kategori/$cat/$p/$o");
		$this->load->view('web_blog/artikel/ajax_add_kategori_form', $data);
	}

	// TODO: Pindahkan ke controller kategori
	public function insert_kategori($cat = 1, $p = 1, $o = 0)
	{
		redirect_hak_akses('u', "web_blog/index/$cat/$p/$o", 'kategori');
		$this->web_artikel_blog_model->insert_kategori();
		redirect("web_blog/index/$cat/$p/$o");
	}

	public function headline($id = 0)
	{
		// Kontributor tidak boleh melakukan ini
		$this->redirect_hak_akses('u');

		$this->web_artikel_blog_model->headline($id);
		redirect("web_blog");
	}

	public function slide($id = 0)
	{
		// Kontributor tidak boleh melakukan ini
		$this->redirect_hak_akses('u');

		$this->web_artikel_blog_model->slide($id);
		redirect("web_blog");
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
		redirect("web_blog/slider");
	}

	public function teks_berjalan()
	{
		$this->sub_modul_ini = 64;

		$this->render('web_blog/admin_teks_berjalan.php');
	}

	public function update_teks_berjalan()
	{
		// Kontributor tidak boleh melakukan ini
		$this->redirect_hak_akses('u');

		$this->setting_model->update_teks_berjalan();
		redirect("web_blog/teks_berjalan");
	}

	public function reset()
	{
		$cat = $this->session->kategori ?: 0;

		if ($cat == 999) $this->web_artikel_blog_model->reset($cat);

		redirect("web_blog");
	}
}
