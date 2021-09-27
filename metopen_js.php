
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <title>Pengelolaan Tugas Akhir</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
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
<h2>Pendaftaran Metopen</h2>
          <hr>
        <!-- DataTables Example -->
       <div class="card mb-3">
           
      <div class="card-body">
        <div class="table-responsive">
          <?php
include 'koneksi.php';
$text = $_POST['judul'];
//echo $coba;
    
?>
          <form method="post" action="daftarmetopen.php">
          <table>
          	<tr>
              <td>Judul Tugas Akhir</td>
              <td>:</td>
              <td><textarea readonly="readonly" name="judul" class="form-control rounded-0" rows="3" ><?php echo $text;; ?></textarea></td>
            </tr>
            <?php 
$query =  str_replace(" ", "%20", $text);
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
              <td><input type="text" class="form-control" name="nim" onkeyup="Angka(this)" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"  autofocus="autofocus"></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" name="nama" class="form-control" onkeyup="Huruf(this)" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"></td>
            </tr>
            <tr>
              <td>Semester</td>
              <td>:</td>
              <td> 
              <?php 
              include "koneksi.php";
              $sql = mysqli_query($konek_db,"SELECT * FROM semester WHERE status='Open'");
              $q = mysqli_fetch_array($sql);
              echo "<input type='text' class='form-control' name='semester' value='$q[periode]' readonly>";
              ?> 
              </td>
            </tr>             
            <tr>
              <td>Rekomendasi Pembimbing</td>
              <td>:</td>
              <td> <select id="pembimbing" class="form-control" name="pembimbing"> 
              	<?php

              	$i = 1;
              		foreach ($coba1 as $value){
                    $h=mysqli_fetch_array(mysqli_query ($konek_db,"SELECT *, (SELECT count(skripsi.pembimbing) from skripsi WHERE skripsi.pembimbing=dosen.nidn) as jumlah FROM dosen  WHERE dosen.nama_dosen='$value' GROUP BY dosen.nama_dosen"));
              			$i=$i+1;
                    if ($value == $h['nama_dosen'] AND $h['jumlah'] >= 8) {
                      }
                    else{
              			$isi = $text."?".$value;
					echo "<option value='$isi'>$value</option>";}
					if ($i>5) {
						break;
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
              <td></td>
              <td></td>
              <td><input type="submit" class="btn btn-primary" name="Kirim" value="Simpan"> </td>
            </tr>
          </table>
          </form>
          
        </div>
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
