
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th rowspan="2">NIM</th>
                    <th rowspan="2">Judul</th>
                    <th rowspan="2">Pembimbing</th>
                    <th rowspan="2">Penguji</th>
                    <th colspan="3">Jadwal</th>
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
                   $hasil=mysqli_query ($konek_db, "SELECT skripsi.* ,dosen.* FROM  skripsi, dosen WHERE dosen.nidn=skripsi.pembimbing AND status='Metopen'");
                   while ($data=mysqli_fetch_array($hasil)) {
                      $p1 = mysqli_query($konek_db,"SELECT skripsi.penguji1, dosen.nama_dosen as penguji1 FROM dosen,skripsi WHERE skripsi.penguji1=dosen.nidn AND skripsi.nim = '$data[nim]' ");
                      $d1 = mysqli_fetch_array($p1);
                     echo "    
                    <tr>
                       <td>$data[nim]</center></td>
                       <td>$data[judul]</center></td>
                       <td>$data[nama_dosen]</td>
                        <td>$d1[penguji1]</td>
                         <td></td>
                         <td></td>
                         <td></td>
                         </tr>"; }

                 ?>
                </tbody>
              </table>