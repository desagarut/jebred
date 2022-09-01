<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-08-28 15:01:19 --> Severity: error --> Exception: Unable to locate the model you have specified: Pamong_model D:\laragon\www\jebred\system\core\Loader.php 348
ERROR - 2022-08-28 15:08:16 --> Severity: error --> Exception: Unable to locate the model you have specified: Penduduk_model D:\laragon\www\jebred\system\core\Loader.php 348
ERROR - 2022-08-28 15:10:45 --> Severity: error --> Exception: Unable to locate the model you have specified: Web_dokumen_model D:\laragon\www\jebred\system\core\Loader.php 348
ERROR - 2022-08-28 15:11:40 --> Severity: error --> Exception: Call to undefined method Shortcode_model::convert_sc_list() D:\laragon\www\jebred\jebred-app\models\First_artikel_m.php 174
ERROR - 2022-08-28 15:13:33 --> Severity: error --> Exception: Unable to locate the model you have specified: Shortcode_model D:\laragon\www\jebred\system\core\Loader.php 348
ERROR - 2022-08-28 15:14:56 --> Severity: error --> Exception: Unable to locate the model you have specified: Keuangan_grafik_model D:\laragon\www\jebred\system\core\Loader.php 348
ERROR - 2022-08-28 15:15:25 --> Severity: error --> Exception: Call to undefined method First_artikel_m::icon_keuangan() D:\laragon\www\jebred\jebred-app\models\First_artikel_m.php 156
ERROR - 2022-08-28 15:16:58 --> Severity: error --> Exception: Call to undefined method First_artikel_m::icon_keuangan() D:\laragon\www\jebred\jebred-app\models\First_artikel_m.php 156
ERROR - 2022-08-28 15:17:11 --> Severity: error --> Exception: Call to undefined method First_artikel_m::icon_keuangan() D:\laragon\www\jebred\jebred-app\models\First_artikel_m.php 156
ERROR - 2022-08-28 15:17:53 --> Severity: error --> Exception: Call to a member function jml_surat_keluar() on null D:\laragon\www\jebred\jebred-app\models\Track_model.php 72
ERROR - 2022-08-28 15:18:25 --> Severity: error --> Exception: Call to a member function jml_surat_keluar() on null D:\laragon\www\jebred\jebred-app\models\Track_model.php 72
ERROR - 2022-08-28 15:19:29 --> Severity: error --> Exception: Unable to locate the model you have specified: Laporan_bulanan_model D:\laragon\www\jebred\system\core\Loader.php 348
ERROR - 2022-08-28 15:19:31 --> Severity: error --> Exception: Unable to locate the model you have specified: Laporan_bulanan_model D:\laragon\www\jebred\system\core\Loader.php 348
ERROR - 2022-08-28 15:19:32 --> Severity: error --> Exception: Unable to locate the model you have specified: Laporan_bulanan_model D:\laragon\www\jebred\system\core\Loader.php 348
ERROR - 2022-08-28 15:19:33 --> Severity: error --> Exception: Unable to locate the model you have specified: Laporan_bulanan_model D:\laragon\www\jebred\system\core\Loader.php 348
ERROR - 2022-08-28 15:20:17 --> Severity: error --> Exception: Call to a member function surat_total() on null D:\laragon\www\jebred\jebred-app\controllers\Beranda.php 49
ERROR - 2022-08-28 15:21:00 --> Severity: error --> Exception: Call to a member function rekapitulasi() on null D:\laragon\www\jebred\jebred-app\controllers\Beranda.php 70
ERROR - 2022-08-28 08:22:16 --> Severity: error --> Exception: Class 'CI_Controller' not found D:\laragon\www\jebred\system\core\CodeIgniter.php 369
ERROR - 2022-08-28 15:23:23 --> Severity: error --> Exception: Unable to locate the model you have specified: Provinsi_model D:\laragon\www\jebred\system\core\Loader.php 348
ERROR - 2022-08-28 17:58:38 --> Query error: Table 'jebred.permohonan_surat' doesn't exist - Invalid query: SELECT *
FROM `permohonan_surat`
WHERE `status` = 0
ERROR - 2022-08-28 17:58:38 --> Severity: error --> Exception: Call to a member function num_rows() on bool D:\laragon\www\jebred\jebred-app\models\Notif_model.php 38
ERROR - 2022-08-28 17:59:46 --> Severity: error --> Exception: Call to undefined method Notif_model::permohonan_surat_baru() D:\laragon\www\jebred\jebred-app\controllers\Beranda.php 52
ERROR - 2022-08-28 18:00:30 --> Query error: Table 'jebred.tweb_penduduk_mandiri' doesn't exist - Invalid query: 
            SELECT tweb_penduduk.id, tweb_penduduk.nama, tweb_penduduk.nik, tweb_wilayah.dusun
            FROM tweb_penduduk_mandiri
            JOIN tweb_penduduk
            ON tweb_penduduk_mandiri.id_pend = tweb_penduduk.id
            JOIN tweb_wilayah
            ON tweb_penduduk.id_cluster = tweb_wilayah.id 
            ORDER BY tweb_penduduk_mandiri.last_login DESC
            LIMIT 2;
ERROR - 2022-08-28 18:00:30 --> Severity: error --> Exception: Call to a member function result_array() on bool D:\laragon\www\jebred\jebred-app\models\First_m.php 98
ERROR - 2022-08-28 18:01:25 --> Severity: error --> Exception: Call to undefined method First_m::last_login() D:\laragon\www\jebred\jebred-app\controllers\Beranda.php 56
ERROR - 2022-08-28 18:02:39 --> Severity: error --> Exception: Unable to locate the model you have specified: Kelompok_model D:\laragon\www\jebred\system\core\Loader.php 348
ERROR - 2022-08-28 18:02:59 --> Severity: error --> Exception: Unable to locate the model you have specified: Kelompok_model D:\laragon\www\jebred\system\core\Loader.php 348
ERROR - 2022-08-28 11:06:31 --> Severity: error --> Exception: Class 'CI_Controller' not found D:\laragon\www\jebred\system\core\CodeIgniter.php 369
ERROR - 2022-08-28 11:06:57 --> Severity: error --> Exception: Class 'CI_Controller' not found D:\laragon\www\jebred\system\core\CodeIgniter.php 369
ERROR - 2022-08-28 11:15:51 --> Severity: error --> Exception: Class 'CI_Controller' not found D:\laragon\www\jebred\system\core\CodeIgniter.php 369
ERROR - 2022-08-28 18:17:09 --> Query error: Table 'jebred.gambar_gallery' doesn't exist - Invalid query: SELECT * FROM gambar_gallery WHERE enabled = '1' and parrent = 0 order by rand() limit 4
ERROR - 2022-08-28 18:17:09 --> Severity: error --> Exception: Call to a member function result_array() on bool D:\laragon\www\jebred\jebred-app\models\First_gallery_m.php 99
ERROR - 2022-08-28 19:11:20 --> Query error: Table 'jebred.gambar_gallery' doesn't exist - Invalid query: SELECT * FROM gambar_gallery WHERE enabled = '1' and parrent = 0 order by rand() limit 4
ERROR - 2022-08-28 19:11:20 --> Severity: error --> Exception: Call to a member function result_array() on bool D:\laragon\www\jebred\jebred-app\models\First_gallery_m.php 99
ERROR - 2022-08-28 19:16:24 --> Query error: Table 'jebred.gambar_gallery' doesn't exist - Invalid query: SELECT * FROM gambar_gallery WHERE enabled = '1' and parrent = 0 order by rand() limit 4
ERROR - 2022-08-28 19:16:24 --> Severity: error --> Exception: Call to a member function result_array() on bool D:\laragon\www\jebred\jebred-app\models\First_gallery_m.php 99
ERROR - 2022-08-28 19:16:55 --> Query error: Table 'jebred.gambar_gallery' doesn't exist - Invalid query: SELECT * FROM gambar_gallery WHERE enabled = '1' and parrent = 0 order by rand() limit 4
ERROR - 2022-08-28 19:16:55 --> Severity: error --> Exception: Call to a member function result_array() on bool D:\laragon\www\jebred\jebred-app\models\First_gallery_m.php 99
