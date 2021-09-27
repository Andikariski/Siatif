<?php 
include 'koneksi.php';
// $hari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
// $pem = mysqli_fetch_array(mysqli_query($konek_db,"SELECT * FROM dosen WHERE nidn='0521128502'"));
// echo "Pembimbing : ".$pem['nama_dosen'];
// echo "<br>";
// $pen1 = mysqli_fetch_array(mysqli_query($konek_db,"SELECT * FROM dosen WHERE nidn='0516127501'"));
// echo "Penguji 1 : ".$pen1['nama_dosen'];
// echo "<br>";
// echo "<br>";
// $jdpem = mysqli_fetch_array(mysqli_query($konek_db,"SELECT * FROM jadwal_dosen WHERE dosen='$pem[nidn]'"));
// $a = substr($jdpem['jam_mulai'],0,2);
// $b = substr($jdpem['jam_selesai'],0,2);
// $jdpen1 = mysqli_fetch_array(mysqli_query($konek_db,"SELECT * FROM jadwal_dosen WHERE dosen='$pen1[nidn]'"));
// $c = substr($jdpen1['jam_mulai'],0,2);
// $d = substr($jdpen1['jam_selesai'],0,2);
// $jum = count($hari);
// for ($i=0; $i < $jum; $i++) { 
// 	if($a>08 && $a<=10 || $b>08 && $b<=10){
// 		echo "Tidak Tersedia pada Hari ".$hari[$i]." Jam 08:00 - 10:00 <br>";
// 	}
// 	else{
// 		echo "Tersedia pada Hari ".$hari[$i]." Jam 08:00 - 10:00 <br>";	
// 	}
// }
$a = $_POST['tanggal_awal'];
$b = $_POST['tanggal_akhir'];
echo $a."<br>".$b;

$x = explode("-", $a);
$y = explode("-", $b);
echo "<br><br>";
$t=" ";
if ($x[2][0]=='0' && $y[2][0]=='0') {
	for ($i=$x[2][1]; $i <= $y[2][1]; $i++) { 
	$t = $t." $i";
	}
}
else if($x[2][0]=='0'){
	for ($i=$x[2][1]; $i <= $y[2]; $i++) { 
	$t = $t." $i";
	}
}
else{
	for ($i=$x[2]; $i <=$y[2]; $i++) { 
	$t = $t." $i";
	}
}
echo $t;
echo "<br>";
$hari = explode(" ", $t);
$har = $hari[mt_rand(0,count($hari)-1)];
echo $har;
?>