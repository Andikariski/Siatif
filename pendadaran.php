<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

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
<h2>Pendaftaran Ujian Pendadaran</h2>
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
$nama = $_POST['nama']; 
$jk = $_POST['gender'];
$judul = $_POST['judul'];
$dos = $_POST['dosbing'];
$sem = $_POST['semester'];
// $sem = $_POST['semester'];
$status ="metopen";
$sql = "INSERT INTO mahasiswa (nim,nama_mhs,gender,semester) VALUES ('$nim','$nama','$jk','$sem')";
$mysql =mysqli_query($konek_db,$sql);
$skripsi = mysqli_query($konek_db,"INSERT INTO skripsi (nim,judul,pembimbing,status) VALUES ('$judul','$nim','$dos','$status')");
if($mysql==TRUE){
  echo '<script languange="javascript"> 
    alert("Berhasil Input");
  </script>';
  echo '<script>window.location.href="lihat_mhs.php";
  </script>';
}
else {
    echo 'Gagal Input';
    echo '<script>window.location.href="daftarmetopen.php";
  </script>';
  
}
}

else{


?>
          <form method="post" action="daftarpendadaran.php">
          <table>
            <tr>
              <td>NIM</td>
              <td style="padding-left: 183px;">:</td>
              <td>
                <select class="form-control select2" id="nim" name="nim" style="width: 346px;" required="required">
                  <option value="show-all"> </option>
                </select>
              </td>
            </tr>
          </table>
                <div id="tampildata">
            </div>
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
  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <!-- <script src="js/demo/datatables-demo.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="app.js"></script>
  <!-- <script type="text/javascript">
            function isi_otomatis(){
                var nim = $("#nim").val();
                $.ajax({
                    url: 'pendadaran_js.php',
                    data:"nim="+nim ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#judul').val(obj.judul);
                    $('#semester').val(obj.semester);
                    $('#pembimbing').val(obj.pembimbing);
                    $('#penguji1').val(obj.penguji1);
                    
                    var opt = "<option value="+obj.penguji1+">"+obj.penguji1+"</option>";
                    $("#penguji1").empty();
                    $("#penguji1").prepend(opt);

                });
            }
        </script> -->
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
           placeholder: 'NIM',
           ajax: {
              dataType: 'json',
              url: 'getnim.php',
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
