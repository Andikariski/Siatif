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
          <li class="breadcrumb-item">Data</li>
          <li class="breadcrumb-item active">Mahasiswa</li>
        </ol>

        <!-- DataTables Example -->
        <?php
            include "koneksi.php"; 
            $id = $_GET['id']; 
            $d = mysqli_fetch_array(mysqli_query($konek_db,"SELECT * FROM dosen WHERE nidn='$id'"));
         ?>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Bimbingan Dosen : <?php echo "$d[nama_dosen]"; ?></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Lama Bimbingan Skripsi</th>
                  </tr>
                </thead>
                
                <tbody>
                  
                 <?php 
                 
                   $hasil=mysqli_query ($konek_db, "SELECT mahasiswa.*,skripsi.* FROM mahasiswa JOIN skripsi ON mahasiswa.nim=skripsi.nim WHERE skripsi.pembimbing='$id'");
                   while ($data=mysqli_fetch_array($hasil)) {
                      # code...
                     echo "    
                    <tr>
                       <td>$data[nim]</td>
                       <td>$data[nama_mhs]</td>";
  
                       
                       $cek_tgl=mysqli_fetch_array(mysqli_query($konek_db,"SELECT * FROM seminar WHERE nim='$data[nim]'"));
                       $cek_sts=mysqli_fetch_array(mysqli_query($konek_db,"SELECT * FROM skripsi WHERE nim='$data[nim]'"));
                       $mulai = new DateTime("$cek_tgl[tanggal]");
                       $date = date('Y-m-d');
                       $selesai = new DateTime("$date");
                       $lama = $mulai->diff($selesai);
                        if($cek_sts['status']=='Skripsi'){
                          echo "<td>$lama->days Hari</td>
                         </tr>"; 
                        }
                        else{
                         echo "<td>Belum Seminar Proposal</td>
                         </tr>"; 
                        }                
                  }
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
