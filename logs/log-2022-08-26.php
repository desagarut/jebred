
ERROR - 2022-08-26 09:23:02 --> Severity: error --> Exception: Call to a member function result() on bool D:\laragon\www\sisiteras\jebred-app\models\Perencanaan_desa_dok_model.php 141
ERROR - 2022-08-26 09:27:39 --> Query error: Column 'id_perencanaan_desa' in where clause is ambiguous - Invalid query: SELECT `p`.*, (CASE WHEN SUM(CAST(d.id_pilihan as UNSIGNED INTEGER)) IS NOT NULL THEN CONCAT(SUM(CAST(d.id_pilihan as UNSIGNED INTEGER))) ELSE CONCAT("belum ada progres") END) AS sum_id_pilihan, (CASE WHEN COUNT(CAST(d.id_pilihan as UNSIGNED INTEGER)) IS NOT NULL THEN CONCAT(COUNT(CAST(d.id_pilihan as UNSIGNED INTEGER))) ELSE CONCAT("belum ada responden") END) AS count_id_pilihan
FROM (`tbl_perencanaan_desa` `p`, `tbl_perencanaan_desa_dok`)
LEFT JOIN `tbl_perencanaan_desa_polling` `d` ON `d`.`id_perencanaan_desa` = `p`.`id`
WHERE   (
`p`.`tahun` LIKE '%cetak%' ESCAPE '!'
OR  `p`.`desa` LIKE '%cetak%' ESCAPE '!'
OR  `p`.`bidang_desa` LIKE '%cetak%' ESCAPE '!'
OR  `p`.`urutan_prioritas` LIKE '%cetak%' ESCAPE '!'
OR  `p`.`nama_program_kegiatan` LIKE '%cetak%' ESCAPE '!'
OR  `p`.`sdgs_ke` LIKE '%cetak%' ESCAPE '!'
OR  `p`.`lokasi` LIKE '%cetak%' ESCAPE '!'
OR  `p`.`sumber_dana` LIKE '%cetak%' ESCAPE '!'
 )
AND `p`.`tahun` = ''
AND `id_perencanaan_desa` IS NULL
GROUP BY `p`.`id`
ORDER BY CAST(persentase as UNSIGNED INTEGER)
ERROR - 2022-08-26 09:27:39 --> Severity: error --> Exception: Call to a member function result() on bool D:\laragon\www\sisiteras\jebred-app\models\Perencanaan_desa_dok_model.php 141
ERROR - 2022-08-26 09:29:23 --> Severity: error --> Exception: Call to a member function get_hasil_polling() on null D:\laragon\www\sisiteras\jebred-app\controllers\Perencanaan_desa.php 487
ERROR - 2022-08-26 09:30:17 --> Severity: error --> Exception: Call to a member function get_hasil_polling() on null D:\laragon\www\sisiteras\jebred-app\controllers\Perencanaan_desa.php 487
ERROR - 2022-08-26 09:31:03 --> Severity: error --> Exception: Cannot use object of type mysqli as array D:\laragon\www\sisiteras\jebred-app\views\perencanaan_desa\rkpdes\cetak.php 42
ERROR - 2022-08-26 10:22:04 --> Severity: error --> Exception: Cannot use object of type mysqli as array D:\laragon\www\sisiteras\jebred-app\views\perencanaan_desa\rkpdes\cetak.php 42
ERROR - 2022-08-26 10:34:32 --> Severity: error --> Exception: Cannot use object of type mysqli as array D:\laragon\www\sisiteras\jebred-app\views\perencanaan_desa\rkpdes\cetak.php 43
ERROR - 2022-08-26 03:37:39 --> Severity: error --> Exception: Class 'CI_Controller' not found D:\laragon\www\sisiteras\system\core\CodeIgniter.php 369
ERROR - 2022-08-26 10:39:39 --> Severity: error --> Exception: Cannot use object of type CI_DB_mysqli_driver as array D:\laragon\www\sisiteras\jebred-app\views\perencanaan_desa\rkpdes\cetak.php 42
ERROR - 2022-08-26 11:06:30 --> Severity: error --> Exception: Argument 1 passed to Perencanaan_desa_model::get_data_apdes() must be of the type string, null given, called in D:\laragon\www\sisiteras\jebred-app\controllers\Perencanaan_desa.php on line 496 D:\laragon\www\sisiteras\jebred-app\models\Perencanaan_desa_model.php 484
ERROR - 2022-08-26 11:20:13 --> Severity: error --> Exception: Cannot use object of type mysqli as array D:\laragon\www\sisiteras\jebred-app\views\perencanaan_desa\rkpdes\cetak.php 42
ERROR - 2022-08-26 11:20:33 --> Severity: error --> Exception: Cannot use object of type mysqli as array D:\laragon\www\sisiteras\jebred-app\views\perencanaan_desa\rkpdes\cetak.php 42
ERROR - 2022-08-26 11:20:55 --> Severity: error --> Exception: Cannot use object of type mysqli as array D:\laragon\www\sisiteras\jebred-app\views\perencanaan_desa\rkpdes\cetak.php 42
ERROR - 2022-08-26 04:21:39 --> Severity: error --> Exception: Class 'CI_Controller' not found D:\laragon\www\sisiteras\system\core\CodeIgniter.php 369
ERROR - 2022-08-26 11:21:47 --> Severity: error --> Exception: Cannot use object of type mysqli as array D:\laragon\www\sisiteras\jebred-app\views\perencanaan_desa\rkpdes\cetak.php 42
ERROR - 2022-08-26 11:23:16 --> Severity: error --> Exception: Cannot use object of type mysqli as array D:\laragon\www\sisiteras\jebred-app\views\perencanaan_desa\rkpdes\cetak.php 42
ERROR - 2022-08-26 04:23:50 --> Severity: error --> Exception: Class 'CI_Controller' not found D:\laragon\www\sisiteras\system\core\CodeIgniter.php 369
ERROR - 2022-08-26 11:24:04 --> Severity: error --> Exception: Cannot use object of type mysqli as array D:\laragon\www\sisiteras\jebred-app\views\perencanaan_desa\rkpdes\cetak.php 42
