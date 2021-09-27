
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
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Mahasiswa</li>
        </ol>
<h2>Edit Mahasiswa Seminar</h2>
          <hr>
        <!-- DataTables Example -->
       <div class="card mb-3">
           
      <div class="card-body">
<?php 
if (isset($_POST['Kirim'])) {
            # code...
          
include "koneksi.php";
$nim = $_POST['nim'];
$nama =$_POST['nama'];
$mysql =mysqli_query($konek_db,"UPDATE mahasiswa SET nama='$nama' WHERE nim='$nim' ");
// $skripsi = mysqli_query($konek_db,"INSERT INTO skripsi (nim,judul,pembimbing,status) VALUES ('$judul','$nim','$dos','$status')");
if($mysql==TRUE){
  echo '<script languange="javascript"> 
    alert("Berhasil Edit");
  </script>';
  echo '<script>window.location.href="cek_pendadaran.php";
  </script>';
}
else {
    echo 'Gagal Input';
    echo '<script>window.location.href="cek_pendadaran.php";
  </script>';
  
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
          <form method="post" action="editmhs.php">
          <table>
            
            <?php 
          $sq = mysqli_query($konek_db,"SELECT * FROM mahasiswa WHERE nim ='$nim'");
            $sql = mysqli_fetch_array($sq);
            ?>
             <tr>
              <td>NIM</td>
              <td>:</td>
              <td><input type="text" class="form-control" name="nim" readonly="readonly" value="<?php echo $nim; ?>"></td>
            </tr>
             <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" name="nama" class="form-control" value="<?php echo $sql['nama_mhs']; ?>"></td>
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
  <script src="js/demo/datatables-demo.js">
</body>

</html>
