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
          <li class="breadcrumb-item active">Dosen</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Dosen</div>
          <div class="card-body">
            <div class="table-responsive">
            <?php
// Create database connection using config file
include_once("koneksi.php");

$nidn=$_GET['id'];
// Mengambil data dosen mengajar
$senin = array();
$selasa = array();
$rabu = array();
$kamis = array();
$jumat = array();
$sabtu = array();
for($a=1;$a<=6;$a++){
  if($a==1){
    $hari='senin';
  }
  if($a==2){
    $hari='selasa';
  }
  if($a==3){
    $hari='rabu';
  }
  if($a==4){
    $hari='kamis';
  }
  if($a==5){
    $hari='jumat';
  }
  if($a==6){
    $hari='sabtu';
}
//memasukkan data ke array sesuai dengan jadwal dosen yang ada
$result_set = mysqli_query($konek_db, "SELECT * FROM jadwal_dosen1 where dosen='$nidn' and hari ='$hari' ");
$isi = array();

 while($row = mysqli_fetch_array($result_set)){ 
   
      array_push($isi,$row['jam_mulai']);
   }
   for($x=0;$x<count($isi);$x++){
     if($isi[$x]=='07.00'){
       $isi[$x]=$hari.'1';
     }
     if($isi[$x]=='07.50'){
      $isi[$x]=$hari.'2';
    }
    if($isi[$x]=='08.45'){
      $isi[$x]=$hari.'3';
    }
    if($isi[$x]=='09.35'){
      $isi[$x]=$hari.'4';
    }
    if($isi[$x]=='10.30'){
      $isi[$x]=$hari.'5';
    }
    if($isi[$x]=='11.20'){
      $isi[$x]=$hari.'6';
    }
    if($isi[$x]=='12.30'){
      $isi[$x]=$hari.'7';
    }
    if($isi[$x]=='13.20'){
      $isi[$x]=$hari.'8';
    }
    if($isi[$x]=='14.15'){
      $isi[$x]=$hari.'9';
    }
    if($isi[$x]=='15.15'){
      $isi[$x]=$hari.'10';
    }
    if($isi[$x]=='16.10'){
      $isi[$x]=$hari.'11';
    }
    if($isi[$x]=='17.00'){
      $isi[$x]=$hari.'12';
    }
    if($isi[$x]=='18.30'){
      $isi[$x]=$hari.'13';
    }
    if($isi[$x]=='19.20'){
      $isi[$x]=$hari.'14';
    }
    if($isi[$x]=='20.10'){
      $isi[$x]=$hari.'15';
    }
    if($hari=='senin'){
      $senin=$isi;
    }
    if($hari=='selasa'){
      $selasa=$isi;
    }
    if($hari=='rabu'){
      $rabu=$isi;
    }
    if($hari=='kamis'){
      $kamis=$isi;
    }
    if($hari=='jumat'){
      $jumat=$isi;
    }
    if($hari=='sabtu'){
      $sabtu=$isi;
    }
    
  }
  unset($isi);
}


?>


<table class="table table-bordered" >

  <form method = 'post' action= "updatejadwaldosen.php">
 
 <?php
    $peng2 = mysqli_fetch_array(mysqli_query($konek_db, "SELECT * FROM dosen where nidn='$nidn'"));
    
    echo "JADWAL DOSEN";
    echo"<br>";
    echo $peng2['nama_dosen']; 
?>
 <thead>
  <tr>
    
   <td>No</td>
  <?php
    for ($i = 1; $i <= 15; $i++) {
    echo " <td>$i</td>" ;
}
?>
  </tr>
 </thead>
 <tbody>
  <tr>
   <td>Senin</td>
   <?php
    for ($i = 1; $i <= 15; $i++) {
    
    echo " <td><input type='checkbox' name='senin[]' value='senin$i'" ;
    if(in_array('senin'.$i, $senin))
      { 
        echo " checked=\"checked\""; 
      } 

    echo "></td>";
}
?>
  </tr>
  <tr>
   <td>Selasa</td>
   <?php
    for ($i = 1; $i <= 15; $i++) {
    echo " <td><input type='checkbox' name='selasa[]' value='selasa$i'" ;
     if(in_array('selasa'.$i, $selasa))
      { 
        echo " checked=\"checked\""; 
      } 

    echo "></td>";
}
?>
  </tr>
  <tr>
   <td>Rabu</td>
   <?php
    for ($i = 1; $i <= 15; $i++) {
    echo " <td><input type='checkbox' name='rabu[]' value='rabu$i'" ;
     if(in_array('rabu'.$i, $rabu))
      { 
        echo " checked=\"checked\""; 
      } 

    echo "></td>";
}
?>

  </tr>
  <tr>
   <td>Kamis</td>
   <?php
    for ($i = 1; $i <= 15; $i++) {
    echo " <td><input type='checkbox' name='kamis[]' value='kamis$i'" ;
     if(in_array('kamis'.$i, $kamis))
      { 
        echo " checked=\"checked\""; 
      } 

    echo "></td>";
}
?>
  </tr>
  <tr>
   <td>Jumat</td>
   <?php
    for ($i = 1; $i <= 15; $i++) {
    echo " <td><input type='checkbox' name='jumat[]' value='jumat$i'" ;
     if(in_array('jumat'.$i, $jumat))
      { 
        echo " checked=\"checked\""; 
      } 

    echo "></td>";
}
?>
  </tr>
  <tr>
   <td>Sabtu</td>
   <?php
    for ($i = 1; $i <= 15; $i++) {
    echo " <td><input type='checkbox' name='sabtu[]' value='sabtu$i'" ;
     if(in_array('sabtu'.$i, $sabtu))
      { 
        echo " checked=\"checked\""; 
      } 

    echo "></td>";
}

?>
<input type='hidden' name='nidn' value='<?php echo $nidn; ?>' >
  </tr>
 </tbody>

</table>
<button type="submit" value="simpan">SIMPAN</button>
</form>
            </div>
          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
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

