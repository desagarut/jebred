<?php defined('BASEPATH') OR exit('No direct script access allowed');

class First extends Web_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::clear_cluster_session();

		// Jika offline_mode dalam level yang menyembunyikan website,
		// tidak perlu menampilkan halaman website
		if ($this->setting->offline_mode == 2)
		{
			redirect('main');
		}
		elseif ($this->setting->offline_mode == 1)
		{
			// Hanya tampilkan website jika user mempunyai akses ke menu admin/web
			// Tampilkan 'maintenance mode' bagi pengunjung website
			$this->load->model('user_model');
			$grup	= $this->user_model->sesi_grup($_SESSION['sesi']);
			if (!$this->user_model->hak_akses($grup, 'web', 'b'))
			{
				redirect('main/maintenance_mode');
			}
		}

//		$this->load->model('anjungan_model');
		$this->load->model('config_model');
		
		$this->load->model('first_m');
		$this->load->model('first_film_m');
		$this->load->model('first_artikel_m');

		$this->load->model('first_gallery_m');
		$this->load->model('first_menu_m');
		
		$this->load->model('mailbox_model');
		
		
		$this->load->model('referensi_model');
		$this->load->model('teks_berjalan_model');
		
		$this->load->model('web_menu_model');
		$this->load->model('web_widget_model');
		$this->load->model('web_gallery_model');
		$this->load->model('web_artikel_blog_model');

		
		$this->load->library('upload');
	}

	public function index($p=1)
	{
		$data = $this->includes;

		$data['p'] = $p;
		$data['paging'] = $this->first_film_m->paging($p);
		$data['paging_page'] = 'index';
		$data['paging_range'] = 3;
		$data['start_paging'] = max($data['paging']->start_link, $p - $data['paging_range']);
		$data['end_paging'] = min($data['paging']->end_link, $p + $data['paging_range']);
		$data['pages'] = range($data['start_paging'], $data['end_paging']);
		$data['film'] = $this->first_film_m->film_show($data['paging']->offset, $data['paging']->per_page);
		$data['review'] = $this->first_artikel_m->artikel_show($data['paging']->offset, $data['paging']->per_page);
		$data['headline_film'] = $this->first_film_m->get_headline();
		$data['headline_review'] = $this->first_artikel_m->get_headline();
		$data['cari'] = htmlentities($this->input->get('cari'));
		
		$cari = trim($this->input->get('cari'));
		if ( ! empty($cari))
		{
			// Judul film bisa digunakan untuk serangan XSS
			$data["judul_kategori"] = htmlentities("Hasil pencarian : ". substr($cari, 0, 50));
		}

		$this->_get_common_data($data);
		//$this->track_model->track_desa('first');
		$this->load->view($this->template, $data);
	}
	
	

	/*
	| film bisa ditampilkan menggunakan parameter pertama sebagai id, dan semua parameter lainnya dikosongkan. url film/:id
	| Kalau menggunakan slug, dipanggil menggunakan url film/:thn/:bln/:hri/:slug
	*/

	public function film($url)
	{
		if (is_numeric($url))
		{
			$data_film = $this->first_film_m->get_film_by_id();
			if ($data_film)
			{
				$data_film['slug'] = $this->security->xss_clean($data_film['slug']);
				redirect('film/'. buat_slug($data_film));
			}
		}
		$this->load->model('shortcode_model');
		$data = $this->includes;
		$this->first_film_m->hit($url); // catat film diakses
		$data['single_film'] = $this->first_film_m->get_film($url);
		$id = $data['single_film']['id'];

		// replace isi film dengan shortcodify
		$data['single_film']['isi'] = $this->shortcode_model->shortcode($data['single_film']['isi']);
		$data['title'] = ucwords($data['single_film']['judul']);
		$data['detail_agenda'] = $this->first_film_m->get_agenda($id);//Agenda
		$data['komentar'] = $this->first_film_m->list_komentar($id);
		$this->_get_common_data($data);

		// Validasi pengisian komentar di add_comment()
		// Kalau tidak ada error atau film pertama kali ditampilkan, kosongkan data sebelumnya
		if (empty($_SESSION['validation_error']))
		{
			$_SESSION['post']['owner'] = '';
			$_SESSION['post']['email'] = '';
			$_SESSION['post']['no_hp'] = '';
			$_SESSION['post']['komentar'] = '';
			$_SESSION['post']['captcha_code'] = '';
		}
		$this->_get_common_data($data);
		$this->set_template('layouts/film.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function trailer($url)
	{
		if (is_numeric($url))
		{
			$data_film = $this->first_film_m->get_film_by_id();
			if ($data_film)
			{
				$data_film['slug'] = $this->security->xss_clean($data_film['slug']);
				redirect('trailer/'. buat_slug($data_film));
			}
		}
		$this->load->model('shortcode_model');
		$data = $this->includes;
		$this->first_film_m->hit($url); // catat film diakses
		$data['trailer'] = $this->first_film_m->get_film($url);
		$id = $data['trailer']['id'];

		// replace isi film dengan shortcodify
		$data['trailer']['isi'] = $this->shortcode_model->shortcode($data['trailer']['isi']);
		$data['title'] = ucwords($data['trailer']['judul']);
		$data['detail_agenda'] = $this->first_film_m->get_agenda($id);//Agenda
		$data['komentar'] = $this->first_film_m->list_komentar($id);
		$this->_get_common_data($data);

		// Validasi pengisian komentar di add_comment()
		// Kalau tidak ada error atau film pertama kali ditampilkan, kosongkan data sebelumnya
		if (empty($_SESSION['validation_error']))
		{
			$_SESSION['post']['owner'] = '';
			$_SESSION['post']['email'] = '';
			$_SESSION['post']['no_hp'] = '';
			$_SESSION['post']['komentar'] = '';
			$_SESSION['post']['captcha_code'] = '';
		}
		$this->_get_common_data($data);
		$this->set_template('layouts/trailer.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function filmgd($url)
	{
		if (is_numeric($url))
		{
			$data_film = $this->first_film_m->get_film_by_id();
			if ($data_film)
			{
				$data_film['slug'] = $this->security->xss_clean($data_film['slug']);
				redirect('filmgd/'. buat_slug($data_film));
			}
		}
		$this->load->model('shortcode_model');
		$data = $this->includes;
		$this->first_film_m->hit($url); // catat film diakses
		$data['single_film'] = $this->first_film_m->get_film($url);
		$id = $data['single_film']['id'];

		// replace isi film dengan shortcodify
		$data['single_film']['isi'] = $this->shortcode_model->shortcode($data['single_film']['isi']);
		$data['title'] = ucwords($data['single_film']['judul']);
		$data['detail_agenda'] = $this->first_film_m->get_agenda($id);//Agenda
		$data['komentar'] = $this->first_film_m->list_komentar($id);
		$this->_get_common_data($data);

		// Validasi pengisian komentar di add_comment()
		// Kalau tidak ada error atau film pertama kali ditampilkan, kosongkan data sebelumnya
		if (empty($_SESSION['validation_error']))
		{
			$_SESSION['post']['owner'] = '';
			$_SESSION['post']['email'] = '';
			$_SESSION['post']['no_hp'] = '';
			$_SESSION['post']['komentar'] = '';
			$_SESSION['post']['captcha_code'] = '';
		}
		$this->_get_common_data($data);
		$this->set_template('layouts/filmgd.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function filmacefile($url)
	{
		if (is_numeric($url))
		{
			$data_film = $this->first_film_m->get_film_by_id();
			if ($data_film)
			{
				$data_film['slug'] = $this->security->xss_clean($data_film['slug']);
				redirect('filmacefile/'. buat_slug($data_film));
			}
		}
		$this->load->model('shortcode_model');
		$data = $this->includes;
		$this->first_film_m->hit($url); // catat film diakses
		$data['single_film'] = $this->first_film_m->get_film($url);
		$id = $data['single_film']['id'];

		// replace isi film dengan shortcodify
		$data['single_film']['isi'] = $this->shortcode_model->shortcode($data['single_film']['isi']);
		$data['title'] = ucwords($data['single_film']['judul']);
		$data['detail_agenda'] = $this->first_film_m->get_agenda($id);//Agenda
		$data['komentar'] = $this->first_film_m->list_komentar($id);
		$this->_get_common_data($data);

		// Validasi pengisian komentar di add_comment()
		// Kalau tidak ada error atau film pertama kali ditampilkan, kosongkan data sebelumnya
		if (empty($_SESSION['validation_error']))
		{
			$_SESSION['post']['owner'] = '';
			$_SESSION['post']['email'] = '';
			$_SESSION['post']['no_hp'] = '';
			$_SESSION['post']['komentar'] = '';
			$_SESSION['post']['captcha_code'] = '';
		}
		$this->_get_common_data($data);
		$this->set_template('layouts/filmacefile.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function filmhxfile($url)
	{
		if (is_numeric($url))
		{
			$data_film = $this->first_film_m->get_film_by_id();
			if ($data_film)
			{
				$data_film['slug'] = $this->security->xss_clean($data_film['slug']);
				redirect('filmgd/'. buat_slug($data_film));
			}
		}
		$this->load->model('shortcode_model');
		$data = $this->includes;
		$this->first_film_m->hit($url); // catat film diakses
		$data['single_film'] = $this->first_film_m->get_film($url);
		$id = $data['single_film']['id'];

		// replace isi film dengan shortcodify
		$data['single_film']['isi'] = $this->shortcode_model->shortcode($data['single_film']['isi']);
		$data['title'] = ucwords($data['single_film']['judul']);
		$data['detail_agenda'] = $this->first_film_m->get_agenda($id);//Agenda
		$data['komentar'] = $this->first_film_m->list_komentar($id);
		$this->_get_common_data($data);

		// Validasi pengisian komentar di add_comment()
		// Kalau tidak ada error atau film pertama kali ditampilkan, kosongkan data sebelumnya
		if (empty($_SESSION['validation_error']))
		{
			$_SESSION['post']['owner'] = '';
			$_SESSION['post']['email'] = '';
			$_SESSION['post']['no_hp'] = '';
			$_SESSION['post']['komentar'] = '';
			$_SESSION['post']['captcha_code'] = '';
		}
		$this->_get_common_data($data);
		$this->set_template('layouts/filmhxfile.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function filmlk21($url)
	{
		if (is_numeric($url))
		{
			$data_film = $this->first_film_m->get_film_by_id();
			if ($data_film)
			{
				$data_film['slug'] = $this->security->xss_clean($data_film['slug']);
				redirect('filmlk21/'. buat_slug($data_film));
			}
		}
		$this->load->model('shortcode_model');
		$data = $this->includes;
		$this->first_film_m->hit($url); // catat film diakses
		$data['single_film'] = $this->first_film_m->get_film($url);
		$id = $data['single_film']['id'];

		// replace isi film dengan shortcodify
		$data['single_film']['isi'] = $this->shortcode_model->shortcode($data['single_film']['isi']);
		$data['title'] = ucwords($data['single_film']['judul']);
		$data['detail_agenda'] = $this->first_film_m->get_agenda($id);//Agenda
		$data['komentar'] = $this->first_film_m->list_komentar($id);
		$this->_get_common_data($data);

		// Validasi pengisian komentar di add_comment()
		// Kalau tidak ada error atau film pertama kali ditampilkan, kosongkan data sebelumnya
		if (empty($_SESSION['validation_error']))
		{
			$_SESSION['post']['owner'] = '';
			$_SESSION['post']['email'] = '';
			$_SESSION['post']['no_hp'] = '';
			$_SESSION['post']['komentar'] = '';
			$_SESSION['post']['captcha_code'] = '';
		}
		$this->_get_common_data($data);
		$this->set_template('layouts/filmlk21.tpl.php');
		$this->load->view($this->template, $data);
	}


	public function arsip($p=1)
	{
		$data = $this->includes;
		$data['p'] = $p;
		$data['paging'] = $this->first_film_m->paging_arsip($p);
		$data['farsip'] = $this->first_film_m->full_arsip($data['paging']->offset,$data['paging']->per_page);

		$this->_get_common_data($data);
		$this->set_template('layouts/arsip.tpl.php');
		$this->load->view($this->template, $data);
	}

	public function arsip_film($p=1)
	{
		$data = $this->includes;
		$data['p'] = $p;
		$data['paging'] = $this->first_film_m->paging_arsip($p);
		$data['farsip'] = $this->first_film_m->full_arsip($data['paging']->offset,$data['paging']->per_page);

		$this->_get_common_data($data);

		$this->set_template('layouts/arsip_film.tpl.php');
		$this->load->view($this->template, $data);
	}


	public function kategori($id, $p = 1)
	{
		$data = $this->includes;

		$data['p'] = $p;
		$data["judul_kategori"] = $this->first_film_m->get_kategori($id);
		$data['title'] = 'Film ' . $data['judul_kategori']['kategori'];
		$data['paging'] = $this->first_film_m->paging_kat($p, $id);
		$data['paging_page'] = 'kategori/' . $id;
		$data['paging_range'] = 3;
		$data['start_paging'] = max($data['paging']->start_link, $p - $data['paging_range']);
		$data['end_paging'] = min($data['paging']->end_link, $p + $data['paging_range']);
		$data['pages'] = range($data['start_paging'], $data['end_paging']);
		$data['film'] = $this->first_film_m->list_film($data['paging']->offset, $data['paging']->per_page, $id);

		$this->_get_common_data($data);
		$this->load->view($this->template, $data);
	}

	public function add_comment($id=0, $slug = NULL)
	{
		$sql = "SELECT *, YEAR(tgl_upload) AS thn, MONTH(tgl_upload) AS bln, DAY(tgl_upload) AS hri, slug AS slug FROM film a WHERE id=$id ";
		$query = $this->db->query($sql,1);
		$data = $query->row_array();
		// Periksa isian captcha
		include FCPATH . 'securimage/securimage.php';
		$securimage = new Securimage();
		$_SESSION['validation_error'] = false;

		if ($securimage->check($_POST['captcha_code']) == false)
		{
			$this->session->set_flashdata('flash_message', 'Kode anda salah. Silakan ulangi lagi.');
			$_SESSION['post'] = $_POST;
			$_SESSION['validation_error'] = true;
			redirect($_SERVER['HTTP_REFERER']."#kolom-komentar");
		}

		$res = $this->first_film_m->insert_comment($id);
		$data['data_config'] = $this->config_model->get_data();

		// cek kalau berhasil disimpan dalam database
		if ($res)
		{
			$this->session->set_flashdata('flash_message', 'Komentar anda telah berhasil dikirim dan perlu dimoderasi untuk ditampilkan.');
		}
		else
		{
			$_SESSION['post'] = $_POST;
			if (!empty($_SESSION['validation_error']))
				$this->session->set_flashdata('flash_message', validation_errors());
			else
				$this->session->set_flashdata('flash_message', 'Komentar anda gagal dikirim. Silakan ulangi lagi.');
		}

		$_SESSION['sukses'] = 1;
		redirect("first/film/".$data['thn']."/".$data['bln']."/".$data['hri']."/".$data['slug']."#kolom-komentar");
	}

	private function _get_common_data(&$data)
	{
		$data['desa'] = $this->config_model->get_data();
		$data['menu_atas'] = $this->first_menu_m->list_menu_atas();
		$data['menu_atas'] = $this->first_menu_m->list_menu_atas();
		$data['menu_kiri'] = $this->first_menu_m->list_menu_kiri();
		$data['teks_berjalan'] = $this->teks_berjalan_model->list_data(TRUE);
		$data['slide_film'] = $this->first_film_m->slide_show();
		$data['slider_gambar'] = $this->first_film_m->slider_gambar();
		$data['w_cos'] = $this->web_widget_model->get_widget_aktif();

		$this->web_widget_model->get_widget_data($data);
		$data['data_config'] = $this->config_model->get_data();
		$data['flash_message'] = $this->session->flashdata('flash_message');
		foreach ($list_kolom as $kolom)
		{
			$data[$kolom] = $this->security->xss_clean($data[$kolom]);
		}
	}

}