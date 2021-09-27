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
          <li class="breadcrumb-item">Skripsi</li>
          <li class="breadcrumb-item active">Pendadaran</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Mahasiswa Pendadaran         
            

          </div>

          <div class="card-body">
            
            <hr>
              <div class="table-responsive">
              
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th rowspan="2">NIM</th>
                    <th rowspan="2">Judul</th>
                    <th rowspan="2">Pembimbing</th>
                    <th rowspan="2">Penguji</th>
                    <th rowspan="2">Penguji2</th>
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
                   $hasil=mysqli_query ($konek_db, "SELECT skripsi.* ,dosen.* FROM  skripsi, dosen WHERE dosen.nidn=skripsi.pembimbing AND skripsi.status='Skripsi' AND skripsi.penguji2!='' ");
                   while ($data=mysqli_fetch_array($hasil)) {
                      $p1 = mysqli_query($konek_db,"SELECT skripsi.penguji1, dosen.nama_dosen as penguji1 FROM dosen,skripsi WHERE skripsi.penguji1=dosen.nidn AND skripsi.nim = '$data[nim]' ");
                      $d1 = mysqli_fetch_array($p1);
                      $p2 = mysqli_query($konek_db,"SELECT skripsi.penguji2, dosen.nama_dosen as penguji2 FROM dosen,skripsi WHERE skripsi.penguji2=dosen.nidn AND skripsi.nim = '$data[nim]' ");
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
                        <td>$jad[tanggal]</td>
                        <td>$jad[jam]</td>
                        <td>$jad[ruang]</td>
                      <td><a href='editpend.php?nim=$data[nim]' type='button' class='btn btn-primary btn-md'>Edit</a></td>

                         </tr>"; }

                 ?>
                </tbody>
              </table>
                
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
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
 
</body>

</html>
