
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pengelolaan Tugas Akhir</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />  
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php 
  require "navbar.php";

  ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php 
    require "sidebar.php";
    ?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Beranda</a>
          </li>
          <li class="breadcrumb-item">Metopen</li>
          <li class="breadcrumb-item active">Pendaftaran</li>
        </ol>
<h2>Edit Mahasiswa Seminar</h2>
          <hr>
        <!-- DataTables Example -->
       <div class="card mb-3">
           
      <div class="card-body">
<?php 
if (isset($_POST['Kirim'])) {
    require "koneksi.php";
    $nim = $_POST['nim'];
    $pe = $_POST['penguji1'];
    $status =$_POST['status'];
    // $alt = $_POST['alt'];
    list($a, $dos) = explode("?", $pe);
    $cek_dos = mysqli_fetch_array(mysqli_query($konek_db,"SELECT nidn FROM dosen WHERE nama_dosen='$dos'"));
    //if dosen alternatif dipilih
        if (isset($_POST['alt'])) {
          $alt = $_POST['alt'];
          $upd_skripsi =mysqli_query($konek_db,"UPDATE skripsi SET penguji1='$alt', status='$status' WHERE nim='$nim' ");
          $upd_judul=mysqli_query($konek_db,"UPDATE judul_dosen SET penguji1='$alt', judul1='-',skor1='-' WHERE nim='$nim'");
          if($upd_judul==TRUE){
            echo '<script languange="javascript"> 
              alert("Berhasil Edit");
            </script>';
            echo '<script>window.location.href="cek_seminar.php";
            </script>';
          }
        else {
            echo 'Gagal Input';
            echo '<script>window.location.href="cek_seminar.php";
          </script>';
          
        }
      
      }

      //else dosen rekomendasi  
    else{

      //proses ambil judul
          $query =  str_replace(" ", "%20", $a);
          $json=file_get_contents("http://localhost:5000/search?q=$query");
          $data = json_decode($json, true);
          foreach ($data as $value) {
            foreach ($value['details'] as $key) {
                $cari = substr($key['pembimbing'],0,9);        
                $skor = $key['score'];
                $s = mysqli_fetch_array(mysqli_query($konek_db,"SELECT * FROM dosen WHERE nama_dosen LIKE '%$cari%' "));
                $z = mysqli_query($konek_db,"INSERT INTO temp_judul (dosen,judul,skor) VALUES ('$s[nama_dosen]','$key[judul]','$skor')");
            }
      } //poses ambil judul dari api
              $g = mysqli_query($konek_db,"SELECT * FROM temp_judul GROUP BY dosen ORDER BY skor DESC");
              foreach ($g as $keyz) {
                $b = $keyz['dosen'];
                $ck = mysqli_fetch_array(mysqli_query($konek_db,"SELECT nidn FROM dosen WHERE nama_dosen='$b'"));

                if($ck['nidn']==$cek_dos['nidn']){
                  $judul = $keyz['judul'];
                  $skor = $keyz['skor'];
                  $dosen = $cek_dos['nidn'];
                  $upd_skripsi =mysqli_query($konek_db,"UPDATE skripsi SET penguji1='$dosen', status='$status' WHERE nim='$nim' ");
                  $upd_judul=mysqli_query($konek_db,"UPDATE judul_dosen SET penguji1='$dosen', judul1='$judul',skor1='$skor' WHERE nim='$nim'");
                }
              }

          mysqli_query($konek_db,"TRUNCATE TABLE temp_judul");
          if($upd_judul==TRUE){
            echo '<script languange="javascript"> 
              alert("Berhasil Edit");
            </script>';
            echo '<script>window.location.href="cek_seminar.php";
            </script>';
          }
        else {
            echo 'Gagal Input';
            echo '<script>window.location.href="cek_seminar.php";
          </script>';
          
              }
        
    }
}

else{


?>
        <div class="table-responsive">
          <?php
include 'koneksi.php';
$nim = $_GET['nim'];
//echo $coba;
    
?>
          <form method="post" action="editsem.php">
          <table>
          	
            <?php 
            $j = mysqli_query($konek_db,"SELECT skripsi.* , mahasiswa.nama_mhs , dosen.nama_dosen FROM skripsi, mahasiswa, dosen WHERE skripsi.pembimbing=dosen.nidn AND skripsi.nim=mahasiswa.nim AND skripsi.nim='$nim'");
            $text = mysqli_fetch_array($j);
          $query =  str_replace(" ", "%20", $text['judul']);
//    echo $query."<br>";
    // echo "$query[judul]";
    $json=file_get_contents("http://localhost:5000/search?q=$query");
    $data = json_decode($json, true);
    $coba = [];
foreach ($data as $value) {

      foreach ($value['details'] as $key) {

        $cari = substr($key['pembimbing'],0,9);
        
        $sql = mysqli_query($konek_db,"SELECT * FROM dosen WHERE nama_dosen LIKE '%$cari%' ");
        $q = mysqli_fetch_array($sql);
        array_push($coba,$q['nama_dosen']);
      }

}


$coba1 = array_unique($coba);
            ?>
             <tr>
              <td>NIM</td>
              <td>:</td>
              <td><input type="text" class="form-control" name="nim"  readonly="readonly" value="<?php echo $nim; ?>"></td>
            </tr>
             <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" readonly="readonly" name="nama" class="form-control" value="<?php echo $text['nama_mhs']; ?>"></td>
            </tr>
            <tr>
              <td>Judul Tugas Akhir</td>
              <td>:</td>
              <td><textarea readonly="readonly" name="judul" class="form-control rounded-0" rows="3" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"><?php echo $text['judul']; ?></textarea></td>
            </tr>
         <?php 

         ?>
            
              
            <tr>
              <td>Rekomendasi Penguji</td>
              <td>:</td>
              <td> <select id="pembimbing" class="form-control" name="penguji1">
              	<?php
              	$i = 1;
              		foreach ($coba1 as $value){
                    if ($text['nama_dosen']!=$value) {
                  
              			$i=$i+1;
              			$isi = $text['judul']."?".$value;
					echo "<option value='$isi'>$value</option>";
					if ($i>5) {
						break;
					}
        }
}
              	 ?>
		                              
                   </select> 
                   </td>
                   
                   <td>
                  <span id="tooltip"></span>
                    </td>
            </tr>
            <tr>
              <td>Pilih Lainnya</td>
              <td>:</td>
              <td><select name="alt" class="form-control select2" id="alt"></select></td>
            </tr>
            <tr>
              <td>Status</td>
              <td>:</td>
              <td>
                <select name="status" class="form-control">
                  <option value="<?php echo $text['status']; ?>" ><?php echo $text['status']; ?></option>
                  <option value="Gagal">Gagal Seminar</option>
                  <option value="Skripsi">Lanjut Skripsi</option>
                </select>
              </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td><input type="submit" class="btn btn-primary" name="Kirim" value="Simpan"> </td>
            </tr>
          </table>
          </form>
          
        </div>
        <?php } ?>
      </div>
          </div>

      
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php
      require "footer.php";
       ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="tool.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
  <script type="text/javascript">
    $(function(){
       $('.select2').select2({
           minimumInputLength: 3,
           allowClear: true,
           placeholder: 'Penguji Alternatif',
           ajax: {
              dataType: 'json',
              url: 'getdos.php',
              delay: 800,
              data: function(params) {
                return {
                  search: params.term
                }
              },
              processResults: function (data, page) {
              return {
                results: data
              };
            },
          }
      })
 });
</script>
</body>

</html>
