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
          <li class="breadcrumb-item active">Pendaftaran</li>
        </ol>
        <h2>Pendaftaran Metopen</h2>
          <hr>
        <!-- DataTables Example -->
       <div class="card mb-3">
           
      <div class="card-body">
        <div class="table-responsive">
          
          <form method="post" action="metopen_js.php">
          <table>

            <tr>
              <td>Judul Tugas Akhir</td>
              <td>:</td>
              <td><textarea name="judul" class="form-control rounded-0" rows="3" style="width: 200px; height: 120px;" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"></textarea></td>
            </tr>

            <tr>
              <td></td>
              <td></td>
              <td><input type="submit" class="btn btn-primary" name="Kirim" value="Cek"> </td>
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

</body>

</html>
