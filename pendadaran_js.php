<?php
include 'koneksi.php';
$nim = $_GET['nim'];
$query = mysqli_query($konek_db, "SELECT skripsi.*, dosen.* FROM skripsi, dosen WHERE skripsi.pembimbing=dosen.nidn AND skripsi.nim='$nim'");
$mahasiswa = mysqli_fetch_array($query);
$p1 = mysqli_query($konek_db,"SELECT skripsi.penguji1, dosen.nama_dosen as pengujii FROM dosen,skripsi WHERE skripsi.penguji1=dosen.nidn AND skripsi.nim = '$nim'");
$d1 = mysqli_fetch_array($p1);
$data = array(
            'judul'      =>  $mahasiswa['judul'],
            'semester'   =>  $mahasiswa['semester'],
			'pembimbing' =>  $mahasiswa['nama_dosen'],
			'penguji1'	 =>	 $d1['pengujii']);
 echo json_encode($data);
?>