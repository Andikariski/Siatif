<?php
include 'koneksi.php';
$jadwal1=[];
$jadwal2=[];
$jadwal3=[];
$jadwal4=[];
$jadwal5=[];
$jadwal6=[];
$jadwal=[];
$nidn = $_POST['nidn'];
     if (isset($_POST['senin']))
{
   $jadwal1 = $_POST['senin'];
}
    if (isset($_POST['selasa']))
{
     $jadwal2 = $_POST['selasa'];
 }
     if (isset($_POST['rabu']))
{
     $jadwal3 = $_POST['rabu'];
 }
     if (isset($_POST['kamis']))
{
     $jadwal4 = $_POST['kamis'];
 }
     if (isset($_POST['jumat']))
{
     $jadwal5 = $_POST['jumat'];
 }
     if (isset($_POST['sabtu']))
{
     $jadwal6 = $_POST['sabtu'];
 }

	 $delete = mysqli_query($konek_db,"Delete from jadwal_dosen1 where dosen='$nidn'");

	for($a=1;$a<=6;$a++){
		if($a==1){
			$hari='senin';
			$jadwal=$jadwal1;
		}
		if($a==2){
			$hari='selasa';
			$jadwal=$jadwal2;
		}
		if($a==3){
			$hari='rabu';
			$jadwal=$jadwal3;
		}
		if($a==4){
			$hari='kamis';
			$jadwal=$jadwal4;
		}
		if($a==5){
			$hari='jumat';
			$jadwal=$jadwal5;
		}
		if($a==6){
			$hari='sabtu';
			$jadwal=$jadwal6;
		}
		$jumlahdipilih=count($jadwal);
	for($x=0;$x<$jumlahdipilih;$x++){
	if($jadwal[$x]==$hari.'1'){
		$jam_mulai='07.00';
		$jam_selesai='07.50';
	}
	if($jadwal[$x]==$hari.'2'){
		$jam_mulai='07.50';
		$jam_selesai='08.40';
	}
	if($jadwal[$x]==$hari.'3'){
		$jam_mulai='08.45';
		$jam_selesai='09.35';
	}
	if($jadwal[$x]==$hari.'4'){
		$jam_mulai='09.35';
		$jam_selesai='10.25';
	}
	if($jadwal[$x]==$hari.'5'){
		$jam_mulai='10.30';
		$jam_selesai='11.20';
	}
	if($jadwal[$x]==$hari.'6'){
		$jam_mulai='11.20';
		$jam_selesai='12.10';
	}
	if($jadwal[$x]==$hari.'7'){
		$jam_mulai='12.30';
		$jam_selesai='13.20';
	}
	if($jadwal[$x]==$hari.'8'){
		$jam_mulai='13.20';
		$jam_selesai='14.10';
	}
	if($jadwal[$x]==$hari.'9'){
		$jam_mulai='14.15';
		$jam_selesai='15.05';
	}
	if($jadwal[$x]==$hari.'10'){
		$jam_mulai='15.15';
		$jam_selesai='16.05';
	}
	if($jadwal[$x]==$hari.'11'){
		$jam_mulai='16.10';
		$jam_selesai='17.00';
	}
	if($jadwal[$x]==$hari.'12'){
		$jam_mulai='17.00';
		$jam_selesai='17.50';
	}
	if($jadwal[$x]==$hari.'13'){
		$jam_mulai='18.30';
		$jam_selesai='19.20';
	}
	if($jadwal[$x]==$hari.'14'){
		$jam_mulai='19.20';
		$jam_selesai='20.10';
	}
	if($jadwal[$x]==$hari.'15'){
		$jam_mulai='20.10';
		$jam_selesai='21.00';
	}
	
	$sql1 = "INSERT INTO jadwal_dosen1 (hari,dosen,jam_mulai,jam_selesai) VALUES ('$hari','$nidn','$jam_mulai','$jam_selesai')";
	$mysql =mysqli_query($konek_db,$sql1);
	}
}




echo '<script languange="javascript"> 
    alert("Berhasil Ubah");
  </script>';
  echo '<script>window.location.href="cek_dosen.php";
  </script>';

 ?>