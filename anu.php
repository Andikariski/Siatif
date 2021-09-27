<?php
$daftar_hari = array(
 'Sunday' => 'Minggu',
 'Monday' => 'Senin',
 'Tuesday' => 'Selasa',
 'Wednesday' => 'Rabu',
 'Thursday' => 'Kamis',
 'Friday' => 'Jumat',
 'Saturday' => 'Sabtu'
);
$date="2020-06-09";
$namahari = date('l', strtotime($date));

echo $daftar_hari[$namahari];
?>