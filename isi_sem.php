<style type="text/css">
.link{
        color: black;
}
  .link:hover{
  color: black;
  text-decoration:none
}
.link:link{
  color: black;
}
.link:active{
  color: black;
}
.link:visited{
  background: yellow;
}
</style>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th rowspan="2">NIM</th>
                    <th rowspan="2">Judul</th>
                    <th rowspan="2">Pembimbing</th>
                    <th rowspan="2">Penguji</th>
                    <th colspan="3">Jadwal</th>
                    <th rowspan="2">Edit</th>
                  </tr>
                  <tr>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Ruang</th>
                  </tr>
                </thead>                
                <tbody>
                  
                 <?php 
                 include "koneksi.php";    
                   $hasil=mysqli_query ($konek_db, "SELECT skripsi.* ,dosen.*,  seminar.* FROM  skripsi, dosen, seminar WHERE dosen.nidn=skripsi.pembimbing AND seminar.nim=skripsi.nim AND skripsi.status='Metopen'");
                   while ($data=mysqli_fetch_array($hasil)) {
                      $d1 = mysqli_fetch_array(mysqli_query($konek_db,"SELECT skripsi.penguji1, dosen.nama_dosen as penguji1 FROM dosen,skripsi WHERE skripsi.penguji1=dosen.nidn AND skripsi.nim = '$data[nim]'"));
                      $j1 = mysqli_fetch_array(mysqli_query($konek_db,"SELECT * FROM judul_dosen WHERE nim='$data[nim]'"));

                  echo "    
                    <tr>
                      <td>$data[nim]</center></td>
                      <td>$data[judul]</center></td>
                      <td>$data[nama_dosen]</td>
                      <td><a href='#' class='link' data-toggle='tooltip'  data-placement='top' title='$j1[skor1] - $j1[judul1]'>$d1[penguji1]
                    </a></td>
                        <td>$data[tanggal]</td>
                        <td>$data[jam]</td>
                        <td>$data[ruang]</td>
                      <td><a href='editsem.php?nim=$data[nim]' type='button' class='btn btn-primary btn-md'>Edit</a></td>

                         </tr>"; }

                 ?>
                </tbody>
              </table>