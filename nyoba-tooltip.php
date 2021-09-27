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

$hari = "01 02 03 04 05 06 07 08 09 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29 30 31";
$hari = explode(" ", $hari);

$bulan = "01 02 03 04 05 06 07 08 09 10 11 12";
$bulan = explode(" ", $bulan);

$tahun = date('Y');

	// 	$sql=mysqli_query ($konek_db, "SELECT skripsi.* ,dosen.* FROM  skripsi, dosen WHERE dosen.nidn=skripsi.pembimbing AND skripsi.status='Metopen' ORDER BY skripsi.nim ASC");
	// while ($d=mysqli_fetch_array($sql)) 
	// 	{	
			$jm = $j[mt_rand(0,count($j)-1)]; 	
			$men = $menit[mt_rand(0,count($menit)-1)];
			$har = $hari[mt_rand(0,count($hari)-1)];
			$bul = $bulan[mt_rand(0,count($bulan)-1)];
			$tanggal =$har."/".$bul."/".$tahun;
			$jam = $jm.":".$men;
			$cek = $ruang[mt_rand(0,count($ruang)-1)];

			$nim = $d['nim'];
			$judul = "Analisa dan Perbandingan Bukti Forensik Aplikasi Media Sosial Facebook dan Twitter pada Smartphone Android";
			$pembimbing = $d['nama_dosen'];

			$query =  str_replace(" ", "%20", $judul);
 			$json=file_get_contents("http://localhost:5000/search?q=$query");
     		$data = json_decode($json, true);
     	
     		foreach ($data as $value) {
      			foreach ($value['details'] as $key) {
        $cari = substr($key['pembimbing'],0,9);        
        $skor = $key['score'];
        $s = mysqli_fetch_array(mysqli_query($konek_db,"SELECT * FROM dosen WHERE nama_dosen LIKE '%$cari%' "));
        $z = mysqli_query($konek_db,"INSERT INTO temp_judul (dosen,judul,skor) VALUES ('$s[nama_dosen]','$judul','$skor')");
      		  }
			}
			$i = 1;
			$g = mysqli_query($konek_db,"SELECT * FROM temp_judul GROUP BY dosen ORDER BY skor ASC");
			foreach ($g as $keyz) {
				$i=$i+1;
				if ($pembimbing != $keyz['dosen']) {
              		$cek_n = mysqli_query($konek_db,"SELECT nidn FROM dosen WHERE nama_dosen='$keyz[dosen]'");
              		$nidn = mysqli_fetch_array($cek_n);          			              	
     //          		$upd = mysqli_query($konek_db,"UPDATE skripsi SET penguji1='$nidn[nidn]' WHERE nim='$nim' ");
					// $jad = mysqli_query($konek_db,"INSERT INTO seminar (nim,tanggal,jam,ruang) VALUES ('$nim','$tanggal','$jam','$cek')");
					// $jud = mysqli_query($konek_db,"INSERT INTO judul_dosen (nim,penguji1,judul1,skor1) VALUES ('$nim','$nidn[nidn]','$keyz[judul]','$keyz[skor]')");		
					// echo "<td>$value</td>"; 
					echo "$keyz[judul]";
					mysqli_query($konek_db,"TRUNCATE TABLE temp_judul");
					if ($i>1) {
						break;					
					}
				}


			}
		     
		
			
			// if($data['pembimbing'] != $penguji1 AND $data['pembimbing'] != $penguji2 AND $penguji1 != $penguji2 )
			
		// }

// echo '<script languange="javascript"> 
// 		alert("Generate Berhasil");
// 	</script>';
// 	echo '<script>window.location.href="cek_seminar.php";
// 	</script>';

?>
