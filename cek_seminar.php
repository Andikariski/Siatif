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
          <li class="breadcrumb-item active">Seminar Proposal</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Mahasiswa Metopen         
            

          </div>

          <div class="card-body">
           <!-- <form method="post" action="coba.php"> -->
            <!-- <form method="post" action="proses_seminar.php"> -->
              <!-- <input type="submit" name="kirim" value="Generate"> -->
              <!-- <button onclick="klik()">Generate</button>
              <p class="alert-success" id="status"></p> -->
              <!-- <div class="progress">
                      <div class="progress-bar" id="pro" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <br> -->
                    <!-- <button class="btn btn-primary" onclick="klik()"> GENERATE </button> <br> <br> -->
                    <!-- <p class="alert-success" id="status"></p> -->
<!--             </form> -->
<i>SET Jadwal Seminar Proposal</i>
<form action ="proses_seminar.php" method="post" name="postform">
  
 <table border="0">
    <tr>
        <td width="125"> <b> Dari Tanggal </b></td>
        <td ><input class="form-control" type="date" name ="tanggal_awal"></td>
        <td style="padding: 20px;"> <b> Sampai Tanggal </b></td>
        <td ><input type="date" class="form-control" name ="tanggal_akhir"></td>
        <td ><input class="btn btn-primary btn-sm" type="submit" value="GENERATE" name="generate"></td>
        <td ><a href="laporanbulan.php"> 
            
    </a></td>
        </tr>
        </table>
        </form>
            
            <hr>
            <div class="table-responsive">
              <?php 
              include 'koneksi.php';
              $cek = mysqli_query($konek_db,"SELECT * FROM seminar");

              if (mysqli_num_rows($cek)>0) {
                include "isi_sem.php";
                } 
else{
                include "kosong_sem.php";
               } ?>
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
 
        <script type="text/javascript">
 
            function klik() {
              var pro = document.getElementById("pro");   
              var width = 1;
              var id = setInterval(kondisiPro, 30000);
 
              function kondisiPro() {
                if (width >= 100) {
                  clearInterval(id);
                } else {
                  width++; 
                  pro.style.width = width + '%'; 
                  pro.innerHTML = width + "%"; 
                }
 
                if (width == 100 ) {
 
                    document.getElementById("status").innerHTML = " Berhasil Di Generate ";
                }
              }
            }
        </script>
</body>

</html>
