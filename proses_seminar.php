<?php 
include 'koneksi.php';
// 		function tanggal($length = 1) {
//     $str = "";
//     $characters = array_merge(range('01','31'));
//     $max = count($characters) - 1;
//     for ($i = 0; $i < $length; $i++) {
//         $rand = mt_rand(0, $max);
//         $str  .= $characters[$rand];
//     }
//     return $str;
// }
// function jam($length = 1) {
//     $str = "";
//     $characters = array_merge(range('07','14'));
//     $max = count($characters) - 1;
//     for ($i = 0; $i < $length; $i++) {
//         $rand = mt_rand(0, $max);
//         $str  .= $characters[$rand];
//     }
//     return $str;
// }
// function bulan($length = 1) {
//     $str = "";
//     $characters = array_merge(range('04','05'));
//     $max = count($characters) - 1;
//     for ($i = 0; $i < $length; $i++) {
//         $rand = mt_rand(0, $max);
//         $str  .= $characters[$rand];
//     }
//     return $str;
// }
$z = "08 09 10 11 12 13 14 15";
$j = explode(" ", $z);

$ruang = "Ruang A
Ruang B
Ruang C
Ruang D ";
$ruang = explode("\n", $ruang);

$menit = "00 15 30 45";
$menit = explode(" ", $menit);

// INI UNTUK MENCARI TANGGAL
// $hari = "01 02 03 04 05 06 07 08 09 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29 30";
// $hari = explode(" ", $hari);
$a = $_POST['tanggal_awal'];
$b = $_POST['tanggal_akhir'];
// echo $a."<br>".$b;

$x = explode("-",$a);
$y = explode("-",$b);
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
$hari = explode(" ", $t);
// MENCARI TANGGAL


// $bulan = "01 02 03 04 05 06 07 08 09 10 11 12";
$bulan = $x[1];
$bulan = explode(" ", $bulan);

$tahun = date('Y');

		$sql=mysqli_query ($konek_db, "SELECT skripsi.* ,dosen.* FROM  skripsi, dosen WHERE dosen.nidn=skripsi.pembimbing AND skripsi.status='Metopen' ORDER BY skripsi.nim ASC");
	while ($d=mysqli_fetch_array($sql)) 
		{	
			$jm = $j[mt_rand(0,count($j)-1)]; 	
			$men = $menit[mt_rand(0,count($menit)-1)];
			$har = $hari[mt_rand(0,count($hari)-1)];
			$bul = $bulan[mt_rand(0,count($bulan)-1)];
			$tanggal = $tahun."/".$bul."/".$har;
			$jam = $jm.":".$men;
			$cek_ruang = $ruang[mt_rand(0,count($ruang)-1)];

			$nim = $d['nim'];
			$judul = $d['judul'];
			$pembimbing = $d['nama_dosen'];

			$query =  str_replace(" ", "%20", $judul);
 			$json=file_get_contents("http://localhost:5000/search?q=$query");
     		$data = json_decode($json, true);
     	
     		foreach ($data as $value) {
      			foreach ($value['details'] as $key) {
        $cari = substr($key['pembimbing'],0,9);        
        $skor = $key['score'];
        $s = mysqli_fetch_array(mysqli_query($konek_db,"SELECT * FROM dosen WHERE nama_dosen LIKE '%$cari%' "));
        $z = mysqli_query($konek_db,"INSERT INTO temp_judul (dosen,judul,skor) VALUES ('$s[nama_dosen]','$key[judul]','$skor')");
      		  }
			}
			if($har != ""){
			$i = 1;
			$g = mysqli_query($konek_db,"SELECT * FROM temp_judul GROUP BY dosen ORDER BY id ASC");
			foreach ($g as $keyz) {
				$i=$i+1;
				if ($pembimbing != $keyz['dosen']) {
					
						$cek_pem=mysqli_fetch_array(mysqli_query($konek_db,"SELECT nidn FROM dosen WHERE nama_dosen='$pembimbing'"));
              			$cek_n = mysqli_query($konek_db,"SELECT nidn FROM dosen WHERE nama_dosen='$keyz[dosen]'");
              			$pembimbing=$cek_pem['nidn'];
              			$nidn = mysqli_fetch_array($cek_n);    
              			$penguji1 = $nidn['nidn'];
              			$judul = $keyz['judul']; 
              			$skor = $keyz['skor']; 
              			
              			$cek_seminar = mysqli_query($konek_db,"SELECT * FROM seminar 
              			WHERE pembimbing='$pembimbing' AND penguji1='$penguji1' AND tanggal='$tanggal' AND jam='$jam'");
						if (mysqli_num_rows($cek_seminar) == 0){   			              	
              			$upd_skripsi = mysqli_query($konek_db,"UPDATE skripsi SET penguji1='$penguji1' WHERE nim='$nim' ");
						$jad_sem = mysqli_query($konek_db,"INSERT INTO seminar VALUES ('$nim','$pembimbing','$penguji1',' ','$tanggal','$jam','$cek_ruang')");
						$jud_dos = mysqli_query($konek_db,"INSERT INTO judul_dosen (nim,penguji1,judul1,skor1) VALUES ('$nim','$penguji1','$judul','$skor')");		
					// echo "<td>$value</td>"; 
						mysqli_query($konek_db,"TRUNCATE TABLE temp_judul");
					if ($i>1) {
						break;					
						}
					}
				}


			}
		     
		}
		else{
			$har = $hari[mt_rand(0,count($hari)-1)];
			if ($har != "") {
			$i = 1;
			$g = mysqli_query($konek_db,"SELECT * FROM temp_judul GROUP BY dosen ORDER BY id ASC");
			foreach ($g as $keyz) {
				$i=$i+1;
				if ($pembimbing != $keyz['dosen']) {
					
						$cek_pem=mysqli_fetch_array(mysqli_query($konek_db,"SELECT nidn FROM dosen WHERE nama_dosen='$pembimbing'"));
              			$cek_n = mysqli_query($konek_db,"SELECT nidn FROM dosen WHERE nama_dosen='$keyz[dosen]'");
              			$pembimbing=$cek_pem['nidn'];
              			$nidn = mysqli_fetch_array($cek_n);    
              			$penguji1 = $nidn['nidn'];
              			$judul = $keyz['judul']; 
              			$skor = $keyz['skor']; 
              			
              			$cek_seminar = mysqli_query($konek_db,"SELECT * FROM seminar 
              			WHERE pembimbing='$pembimbing' AND penguji1='$penguji1' AND tanggal='$tanggal' AND jam='$jam'");
						if (mysqli_num_rows($cek_seminar) == 0){   			              	
              			$upd_skripsi = mysqli_query($konek_db,"UPDATE skripsi SET penguji1='$penguji1' WHERE nim='$nim' ");
						$jad_sem = mysqli_query($konek_db,"INSERT INTO seminar VALUES ('$nim','$pembimbing','$penguji1',' ','$tanggal','$jam','$cek_ruang')");
						$jud_dos = mysqli_query($konek_db,"INSERT INTO judul_dosen (nim,penguji1,judul1,skor1) VALUES ('$nim','$penguji1','$judul','$skor')");		
					// echo "<td>$value</td>"; 
						mysqli_query($konek_db,"TRUNCATE TABLE temp_judul");
					if ($i>1) {
						break;					
						}
					}
				}


				}
			}
		}
			
			// if($data['pembimbing'] != $penguji1 AND $data['pembimbing'] != $penguji2 AND $penguji1 != $penguji2 )
			
		 }

	echo '<script languange="javascript"> 
		alert("Generate Berhasil");
	</script>';
	echo '<script>window.location.href="cek_seminar.php";
	</script>';

?>
