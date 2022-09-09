<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'First';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['sitemap\.xml'] = "Sitemap/index";
$route['feed\.xml'] = "Feed/index";
$route ['ppid'] = "Api_informasi_publik/ppid";

// Artikel
$route['film/(:num)'] = 'first/film/$1'; // Contoh : film/1
$route['film/(:num)/(:num)/(:num)/(:any)'] = 'first/film/$4'; // Contoh : film/2020/5/15/contoh-film

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

