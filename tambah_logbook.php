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

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

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
          <li class="breadcrumb-item">Tugas Akhir</li>
          <li class="breadcrumb-item active">Pendaftaran</li>
        </ol>
<h2>Pendaftaran Metopen</h2>
          <hr>
        <!-- DataTables Example -->
       <div class="card mb-3">
           
      <div class="card-body">
        <div class="table-responsive">
          <?php 
          if (isset($_POST['Kirim'])) {
            # code...
          
include "koneksi.php";
$nim = $_POST['nim'];
$tgl = $_POST['tanggal']; 
$keg = $_POST['kegiatan'];
$pisah = explode("-",$tgl);
$tanggal = $pisah[2]."/".$pisah[1]."/".$pisah[0]; 


$sql = "INSERT INTO logbook (nim,tgl_bimbingan,kegiatan_bimbingan) VALUES ('$nim','$tanggal','$keg')";
$mysql =mysqli_query($konek_db,$sql);
if($mysql==TRUE){
  echo '<script languange="javascript"> 
    alert("Berhasil Input");
  </script>';
  echo '<script>window.location.href="logbook.php";
  </script>';
}
else {
    echo 'Gagal Input';
    echo '<script>window.location.href="logbook.php";
  </script>';
  
}
}

else{
include 'koneksi.php';
 $nim = $_GET['nim'];
 $sql = mysqli_query($konek_db,"SELECT * FROM logbook WHERE nim = '$nim'");
 $q = mysqli_fetch_array($sql);
?>
          <form method="post" action="tambah_logbook.php">
          <table>
            <tr>
              <td>NIM</td>
              <td>:</td>
              <td><input type="text" class="form-control" name="nim" readonly value="<?php echo"$nim";?>"></td>
            </tr>
            <tr>
              <td>Tanggal Bimbingan</td>
              <td>:</td>
              <td><input type="date" name="tanggal" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"></td>
            </tr>
           
            <tr>
              <td>Kegiatan Bimbingan</td>
              <td>:</td>
              <td><textarea name="kegiatan" class="form-control rounded-0" rows="3" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                </td>
            </tr>
          
            <tr>
              <td></td>
              <td></td>
              <td><input type="submit" class="btn btn-primary" name="Kirim" value="Simpan"> </td>
            </tr>
          </table>
          </form>
          <?php 
            }
          ?>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

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

</body>

</html>
