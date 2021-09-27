<?php
include 'koneksi.php';
error_reporting(0);
//Fungi untuk mendapatkkan ruangan kosong
$jam = $_GET['jam'];
$date = $_GET['tanggal'];
$tahun=date('Y');
list($tahun,$bulan,$hari) = explode("-", $date);
$tanggal = $hari."/".$bulan."/".$tahun;

 $a=array('Ruang 1','Ruang 2','Ruang 3','Ruang 4','Ruang 5','Ruang 6','Ruang 7');
 $be=array();
 $ambil1 = mysqli_query($konek_db,"SELECT * FROM pendadaran WHERE tanggal ='$tanggal' AND jam = '$jam'");
 foreach ($ambil1 as $row){
     if($row['ruang']=='Ruang 1'){
        foreach (array_keys($a, 'Ruang 1') as $key) {
            unset($a[$key]);
        }
     }
     if($row['ruang']=='Ruang 2'){
        foreach (array_keys($a, 'Ruang 2') as $key) {
            unset($a[$key]);
        }
     }
     if($row['ruang']=='Ruang 3'){
        foreach (array_keys($a, 'Ruang 3') as $key) {
            unset($a[$key]);
        }
     }
     if($row['ruang']=='Ruang 4'){
        foreach (array_keys($a, 'Ruang 4') as $key) {
            unset($a[$key]);
        }
     }
     if($row['ruang']=='Ruang 5'){
        foreach (array_keys($a, 'Ruang 5') as $key) {
            unset($a[$key]);
        }
     }
     if($row['ruang']=='Ruang 6'){
        foreach (array_keys($a, 'Ruang 6') as $key) {
            unset($a[$key]);
        }
     }
     if($row['ruang']=='Ruang 7'){
        foreach (array_keys($a, 'Ruang 7') as $key) {
            unset($a[$key]);
        }
     }
 }
 $jumlahnya=count($a);
 for($b=0;$b<$jumlahnya;$b++){
     if($a[$b]!= ""){
        array_push($be,$a[$b]);
     }
 }

 echo json_encode($be);

?>