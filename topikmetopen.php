
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
            <?php 
          if (ISSET($_POST['Kirim'])) {
            include "koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama']; 
$judul = $_POST['judul'];
$pe = $_POST['pembimbing'];
$sem = $_POST['semester'];
$status ="Metopen";
$tgl=date('d/m/Y');
$cek = mysqli_fetch_array(mysqli_query($konek_db,"SELECT nidn FROM dosen WHERE nama_dosen = '$pe'"));
      if (isset($_POST['alt'])) {
        $alt = $_POST['alt'];
          $mysql =mysqli_query($konek_db,"INSERT INTO mahasiswa (nim,nama_mhs) VALUES ('$nim','$nama')");
      $skripsi = mysqli_query($konek_db,"INSERT INTO skripsi (nim,judul,pembimbing,tgl_mulai_meto,semester,status) VALUES ('$nim','$judul','$alt','$tgl','$sem','$status')");         
      if($mysql==TRUE){
        echo '<script languange="javascript"> 
          alert("Berhasil Input");
        </script>';
        echo '<script>window.location.href="cek_mhs.php";
        </script>';
      }
      else {
        echo '<script languange="javascript"> 
          alert("Gagal Input");
        </script>';
        echo '<script>window.location=history.go(-1);
        </script>';        
      }
        }
        else{         
          $mysql =mysqli_query($konek_db,"INSERT INTO mahasiswa (nim,nama_mhs) VALUES ('$nim','$nama')");
      $skripsi = mysqli_query($konek_db,"INSERT INTO skripsi (nim,judul,pembimbing,tgl_mulai_meto,semester,status) VALUES ('$nim','$judul','$cek[nidn]','$tgl','$sem','$status')");
          $delete=mysqli_query($konek_db,"DELETE FROM topik WHERE judultopik='$judul'");
      if($mysql==TRUE){
        echo '<script languange="javascript"> 
          alert("Berhasil Input");
        </script>';
        echo '<script>window.location.href="cek_mhs.php";
        </script>';
      }
      else {
        echo '<script languange="javascript"> 
          alert("Gagal Input");
        </script>';
        echo '<script>window.location=history.go(-1);
        </script>';
        
      }
        }
          }
          ?>
      <div class="card-body">
        <div class="table-responsive">
          <?php
          
include 'koneksi.php';
$id = $_GET['id'];
$jd = mysqli_fetch_array(mysqli_query($konek_db,"SELECT * FROM topik WHERE id='$id'"));
$ds = mysqli_fetch_array(mysqli_query($konek_db,"SELECT dosen.nama_dosen,topik.dosen from topik JOIN dosen ON topik.dosen=dosen.nidn"));

?>
          <form method="post" action="topikmetopen.php">
          <table>
          	<tr>
              <td>Judul Tugas Akhir</td>
              <td>:</td>
              <td><textarea readonly="readonly" name="judul" class="form-control rounded-0" rows="3" ><?php echo $jd['judultopik']; ?></textarea></td>
            </tr>
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
              <td>Dosen Pembimbing</td>
              <td>:</td>
              <td><input type="text" name="pembimbing" class="form-control" value="<?php echo $ds['nama_dosen']; ?>" readonly></td>
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
