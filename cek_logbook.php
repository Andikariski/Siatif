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
          <li class="breadcrumb-item">Metopen</li>
          <li class="breadcrumb-item active"><a href="logbook.php">Logbook</a></li>
        </ol>
       
        <table>
<?php   
              include "koneksi.php";
              $nim = $_GET['nim'];
              $sql = mysqli_query($konek_db,"SELECT skripsi.* , dosen.nama_dosen FROM skripsi JOIN dosen ON skripsi.pembimbing=dosen.nidn WHERE skripsi.nim = '$nim'");
              $data = mysqli_fetch_array($sql);
              echo "<tr>
                      <td style='width:100px; height:30px;'>NIM</td>
                      <td style='width:20px;'>:</td>
                      <td>$data[nim]</td>
                    </tr>
                    <tr>
                      <td style='width:100px; height:30px;'>Judul</td>
                      <td>:</td>
                      <td>$data[judul]</td>
                    </tr>
                    <tr>
                      <td style='width:100px; height:50px;'>Pembimbing</td>
                      <td>:</td>
                      <td>$data[nama_dosen]</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td><a href='tambah_logbook.php?nim=$data[nim]'><button class='btn btn-primary'>Tambah Logbook</button></a></td>
                    </tr>
                    ";
              ?>
        
      </table>
      <br>
        <!-- DataTables Example -->
        <div class="card mb-3">

          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Mahasiswa Metopen</div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Tanggal Bimbingan</th>
                    <th>Kegiatan</th>
                  </tr>
                </thead>
                
                <tbody>
                  
                 <?php 
                 include "koneksi.php";    
                   $hasil=mysqli_query ($konek_db, "SELECT * FROM logbook WHERE nim='$nim'");
                   while ($data=mysqli_fetch_array($hasil)) {
                      # code...
                     echo "    
                    <tr>
                       <td>$data[tgl_bimbingan]</td>
                       <td>$data[kegiatan_bimbingan]</td>
                         </tr>"; }

                 ?>
                </tbody>
              </table>
            </div>
          </div>
      <!--     <div class="card-footer small text-muted"></div> -->
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
