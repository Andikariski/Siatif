<table border="1">
	<tr>
		<th>NIM</th>
		<th>JUDUL</th>
		<th>PEMBIMBING</th>
		<th>PENGUJI I</th>
		<th>PENGUJI II</th>
	</tr>
	<?php 
                 include "koneksi.php";    
                   $hasil=mysqli_query ($konek_db, "SELECT skripsi.* ,dosen.* FROM  skripsi, dosen WHERE dosen.nidn=skripsi.pembimbing AND skripsi.status='Skripsi' ");
                   while ($data=mysqli_fetch_array($hasil)) {
                      $p1 = mysqli_query($konek_db,"SELECT skripsi.penguji1, dosen.nama_dosen as penguji1 FROM dosen,skripsi WHERE skripsi.penguji1=dosen.nidn AND skripsi.nim = '$data[nim]' ");
                      $d1 = mysqli_fetch_array($p1);
                      $p2 = mysqli_query($konek_db,"SELECT skripsi.penguji1, dosen.nama_dosen as penguji2 FROM dosen,skripsi WHERE skripsi.penguji2=dosen.nidn AND skripsi.nim = '$data[nim]' ");
                      $d2 = mysqli_fetch_array($p2);
                      $jd=mysqli_query ($konek_db, "SELECT skripsi.* ,pendadaran.* FROM  skripsi, pendadaran WHERE skripsi.nim = pendadaran.nim AND skripsi.nim='$data[nim]'");
                      $jad=mysqli_fetch_array($jd);
                     echo "    
                    <tr>
                      <td>$data[nim]</center></td>
                      <td>$data[judul]</center></td>
                      <td>$data[nama_dosen]</td>
                      <td>$d1[penguji1]</td>
                      <td>$d2[penguji2]</td>
                         </tr>"; }

                 ?>
</table>