<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'First';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['sitemap\.xml'] = "Sitemap/index";
$route['feed\.xml'] = "Feed/index";
$route ['ppid'] = "Api_informasi_publik/ppid";

// Artikel
$route['artikel/(:num)'] = 'first/artikel/$1'; // Contoh : artikel/1
$route['artikel/(:num)/(:num)/(:num)/(:any)'] = 'first/artikel/$4'; // Contoh : artikel/2020/5/15/contoh-film

// Film
$route['review/(:num)'] = 'first/review/$1'; // Contoh : film/1
$route['review/(:num)/(:num)/(:num)/(:any)'] = 'first/review/$4'; // Contoh : film/2020/5/15/contoh-film

// Film
$route['film/(:num)'] = 'first/film/$1'; // Contoh : film/1
$route['film/(:num)/(:num)/(:num)/(:any)'] = 'first/film/$4'; // Contoh : film/2020/5/15/contoh-film

// Trailer
$route['trailer/(:num)'] = 'first/trailer/$1'; // Contoh : film/1
$route['trailer/(:num)/(:num)/(:num)/(:any)'] = 'first/trailer/$4'; // Contoh : film/2020/5/15/contoh-film

// Film Google Drive
$route['filmgd/(:num)'] = 'first/filmgd/$1'; // Contoh : filmgd/1
$route['filmgd/(:num)/(:num)/(:num)/(:any)'] = 'first/filmgd/$4'; // Contoh : filmgd/2020/5/15/contoh-film

// Film HX File
$route['filmhxfile/(:num)'] = 'first/filmhxfile/$1'; // Contoh : filmgd/1
$route['filmhxfile/(:num)/(:num)/(:num)/(:any)'] = 'first/filmhxfile/$4'; // Contoh : filmgd/2020/5/15/contoh-film

// Film ACE File
$route['filmacefile/(:num)'] = 'first/filmacefile/$1'; // Contoh : filmgd/1
$route['filmacefile/(:num)/(:num)/(:num)/(:any)'] = 'first/filmacefile/$4'; // Contoh : filmgd/2020/5/15/contoh-film

// Film lk21
$route['filmlk21/(:num)'] = 'first/filmlk21/$1'; // Contoh : filmgd/1
$route['filmlk21/(:num)/(:num)/(:num)/(:any)'] = 'first/filmlk21/$4'; // Contoh : filmgd/2020/5/15/contoh-film

// Artikel lama (Agar url lama masih dpt di akases)
$route['first/film/(:num)'] = 'first/film/$1'; // Contoh : Contoh : first/film/1
$route['first/film/(:num)/(:num)/(:num)/(:any)'] = 'first/film/$4'; // Contoh : first/film/2020/5/15/contoh-film

// Kategori film
$route['film/kategori/(:any)'] = 'first/kategori/$1'; // Contoh : Contoh : film/kategori/berita-desa
$route['film/kategori/(:any)/(:num)'] = 'first/kategori/$1/$2'; // Contoh : Contoh : film/kategori/berita-desa/1

$buku_umum = ['ekspedisi', 'lembaran_desa', 'surat_keluar', 'surat_masuk'];
foreach ($buku_umum as $menu)
{
	$route["{$menu}/([a-z_]+)/(:any)/(:any)/(:any)"] = "buku_umum/{$menu}/$1/$2/$3/$4";
	$route["{$menu}/([a-z_]+)/(:any)/(:any)"] = "buku_umum/{$menu}/$1/$2/$3";
	$route["{$menu}/([a-z_]+)/(:any)"] = "buku_umum/{$menu}/$1/$2";
	$route["{$menu}/([a-z_]+)"] = "buku_umum/{$menu}/$1";
	$route["{$menu}"] = "buku_umum/{$menu}";
}

// Route untuk menghilangkan 'first' dari URL web
$route['index/(:num)'] = 'first/index/$1';
$route['(:num)'] = 'first/index/$1';
$route['arsip'] = 'first/arsip';
$route['arsip_film'] = 'first/arsip_film';
$route['arsip_film/(:num)'] = 'first/arsip_film/$1';

$route['arsip/(:num)'] = 'first/arsip/$1';
$route['peraturan_desa'] = 'first/peraturan_desa';
$route['data_analisis'] = 'first/data_analisis';
$route['data_analisis/(.+)'] = 'first/data_analisis/$1';
$route['add_comment/(:any)'] = 'first/add_comment/$1';
$route['ambil_data_covid'] = 'first/ambil_data_covid';
$route['load_aparatur_desa'] = 'first/load_aparatur_desa';
$route['load_apbdes'] = 'first/load_apbdes';
$route['load_aparatur_wilayah/(.+)'] = 'first/load_aparatur_wilayah/$1';
$route['logout'] = 'first/logout';
$route['ganti'] = 'first/ganti';
$route['auth'] = 'first/auth';
$route['peta'] = 'first/peta';
$route['informasi_publik'] = 'first/informasi_publik';

