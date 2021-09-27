
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <script src="vendor/jquery/jquery-ui.js"></script>
  <script src="vendor/jquery/jquery.datetimepicker.full.js"></script>
  <style>
  .markholiday .ui-state-default
  {
    color:red;
  }
</style>
</head>
<?php
date_default_timezone_set("Asia/Jakarta");
?>
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
<h2>Edit Mahasiswa Seminar</h2>
          <hr>
        <!-- DataTables Example -->
       <div class="card mb-3">
           
      <div class="card-body">
<?php 
use PHPMailer\PHPMailer\PHPMailer;
if (isset($_POST['Kirim'])) {
            # code...
          
include "koneksi.php";

$nim = $_POST['nim'];
$status =$_POST['status'];

if($status=='Lulus' || $status=='Gagal'){
  $mysql =mysqli_query($konek_db,"UPDATE skripsi SET status='$status' WHERE nim='$nim' ");
// $skripsi = mysqli_query($konek_db,"INSERT INTO skripsi (nim,judul,pembimbing,status) VALUES ('$judul','$nim','$dos','$status')");
$mysqli=mysqli_query($konek_db,"UPDATE skripsi SET status='$status' WHERE nim='$nim' ");
if($status=="Gagal" || $status=="Lulus"){
  $delete = mysqli_query($konek_db,"Delete from jadwal_pendadaran where mhs_terlibat='$nim'");
  $deletelagi = mysqli_query($konek_db,"Delete from pendadaran where nim='$nim'");
  
}
  echo '<script languange="javascript"> 
  alert("Berhasil Edit");
</script>';
echo '<script>window.location.href="cek_pendadaran.php";
</script>';
return;
}
$pembimbing =$_POST['pembimbing'];
$penguji1 =$_POST['penguji1'];
$penguji2 =$_POST['penguji2'];
$date =$_POST['tanggal'];
$jam =$_POST['jam'];
$ruang =$_POST['ruang'];
$daftar_hari = array(
  'Sunday' => 'minggu',
  'Monday' => 'senin',
  'Tuesday' => 'selasa',
  'Wednesday' => 'rabu',
  'Thursday' => 'kamis',
  'Friday' => 'jumat',
  'Saturday' => 'sabtu'
 );
$namahari = date('l', strtotime($date));
$pecah = explode("-", $jam);
 //mencari element array 0
$jam_mulai = trim($pecah[0]);
$jam_selesai = trim($pecah[1]);
$tahun=date('Y');
list($hari,$bulan,$tahun) = explode("-", $date);
$tanggal = $hari."/".$bulan."/".$tahun;
$delete = mysqli_query($konek_db,"Delete from jadwal_pendadaran where mhs_terlibat='$nim'");
$insert_pendadaran1 = mysqli_query($konek_db,"INSERT INTO jadwal_pendadaran(tanggal,hari,dosen,mhs_terlibat,jam_mulai,jam_selesai) VALUES ('$date','$daftar_hari[$namahari]','$pembimbing','$nim','$jam_mulai','$jam_selesai')");
$insert_pendadaran2 = mysqli_query($konek_db,"INSERT INTO jadwal_pendadaran(tanggal,hari,dosen,mhs_terlibat,jam_mulai,jam_selesai) VALUES ('$date','$daftar_hari[$namahari]','$penguji1','$nim','$jam_mulai','$jam_selesai')");
$insert_pendadaran3 = mysqli_query($konek_db,"INSERT INTO jadwal_pendadaran(tanggal,hari,dosen,mhs_terlibat,jam_mulai,jam_selesai) VALUES ('$date','$daftar_hari[$namahari]','$penguji2','$nim','$jam_mulai','$jam_selesai')");
$updatependadaran =mysqli_query($konek_db,"UPDATE pendadaran SET tanggal='$tanggal',jam='$jam',ruang='$ruang' WHERE nim='$nim' ");

    
  

        $e_pembimbing = mysqli_fetch_array(mysqli_query($konek_db,"SELECT email,nama_dosen FROM dosen WHERE nidn LIKE '%$pembimbing%'"));
        $e_penguji1 = mysqli_fetch_array(mysqli_query($konek_db,"SELECT email,nama_dosen FROM dosen WHERE nidn LIKE '%$penguji1%'"));
        $e_penguji2 = mysqli_fetch_array(mysqli_query($konek_db,"SELECT email,nama_dosen FROM dosen WHERE nidn LIKE '%$penguji2%'"));
        $e_mhs = mysqli_fetch_array(mysqli_query($konek_db,"SELECT nama_mhs FROM mahasiswa WHERE nim LIKE '%$nim%'"));
        $e_judul=mysqli_fetch_array(mysqli_query($konek_db,"SELECT judul FROM skripsi WHERE nim LIKE '%$nim%'"));
        $nama_mahasiswa = $e_mhs['nama_mhs'];
        $judul_skripsi = $e_judul['judul'];
        $nama_pembimbing=$e_pembimbing['nama_dosen'];
        $nama_penguji1=$e_penguji1['nama_dosen'];
        $nama_penguji2=$e_penguji2['nama_dosen'];
        $em_pembimbing=$e_pembimbing['email']; 
        $em_penguji1=$e_penguji1['email'];
        $em_penguji2=$e_penguji2['email'];  
        $get_namalengkap = mysqli_fetch_array(mysqli_query($konek_db,"SELECT nama_mhs FROM mahasiswa WHERE nim LIKE '%$nim%'"));
        $namalengkap=$get_namalengkap['nama_mhs'];
        $nama_awal = explode(" ",$namalengkap);
        $em_mhs = $nama_awal[0].$nim.'@webmail.uad.ac.id';
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();
        
        //SMTP Settings
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->isHTML();
        $mail->Username = "siatifuad@gmail.com"; //enter you email address
        $mail->Password = 'almamaterorange'; //enter you email password
        $mail->setFrom('adminpedadaran@uad.ac.id');
        $mail->Subject = "JADWAL PENDADARAN GANTI";
        $mail->Body = "Pendadaran : ".$nama_mahasiswa."<br>NIM:".$nim."<br>Judul : ".$judul_skripsi."<br>Pada tanggal=".$date."<br> Pukul=".$jam."<br>Ruangan:".$ruang."<br>Pembimbing:".$nama_pembimbing."<br>Penguji 1 : ".$nama_penguji1."<br>Penguji 2 :".$nama_penguji2."<br><a href=http://127.0.0.1/siatifedit/editpend.php?nim=".$nim."><button>Klik Untuk Edit Jadwal</button></a>";
        $mail->addAddress($em_penguji1); 
        $mail->addAddress($em_penguji2); 
        $mail->addAddress($em_pembimbing); 
        
        
        //Email Settings
        $mail->send();
        $mail = new PHPMailer();
        
        //SMTP Settings
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->isHTML();
        $mail->Username = "siatifuad@gmail.com"; //enter you email address
        $mail->Password = 'almamaterorange'; //enter you email password
        $mail->setFrom('adminpedadaran@uad.ac.id');
        $mail->Subject = "JADWAL PENDADARAN GANTI";
        $mail->Body = "Pendadaran : ".$nama_mahasiswa."<br>NIM:".$nim."<br>Judul : ".$judul_skripsi."<br>Pada tanggal=".$date."<br> Pukul=".$jam."<br>Ruangan:".$ruang."<br>Pembimbing:".$nama_pembimbing."<br>Penguji 1 : ".$nama_penguji1."<br>Penguji 2 :".$nama_penguji2;
        $mail->addAddress($em_mhs);
        //Email Settings
        $mail->send();
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

<script>
var gettanggal = new Date();
var tahunnya=gettanggal.getFullYear();
//api tanggal merah
  $(document).ready(function() {
    var tgl_merah=[];
    $.getJSON('https://calendarific.com/api/v2/holidays?&api_key=79673d8ffb4b6374f3d1f40a4ed60813ea2251f5&country=ID&year='+tahunnya, function(data) {
    //data is the JSON string    
    var i;
    for (i = 0; i < data.response.holidays.length; i++) {
    tgl_merah.push(data.response.holidays[i].date.iso.substring(0,10));
    }
    
  });
  var holidays =tgl_merah;
    $("#tanggal").datepicker({
     dateFormat:"dd-mm-yy",
     beforeShowDay: function(date){
       var day = date.getDay();
       var month = date.getMonth()+1;
       var currDate = date.getDate();
       //var formattedDate = jQuery.datepicker.formatDate("yy-mm-dd",date);
       var year = date.getFullYear();
       if(currDate<10){currDate='0'+currDate} if(month<10){month='0'+month}
       var filter = year+'-'+month+'-'+currDate;
       for (var i=0; i < holidays.length; ++i){
       if (filter==holidays[i]){
         return [false,"markholiday"];
       }
       }
            
       if(day==0){
         return [false,"markholiday"];
       }
       else{
         return [true];
       }
        
     }
	  });
    var val_seleksi1 = $('#pembimbing').val();
    var val_seleksi2 = $('#penguji1').val();
    var val_seleksi3 = $('#penguji2a').val();
    var today = new Date();
    today.setDate(today.getDate()+1);
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm}
    today = yyyy+"-"+mm+"-"+dd;
    todaya = dd+"-"+mm+"-"+yyyy;
    document.getElementById("tanggal").value = todaya;
    document.getElementById("tanggalhide").value = today;
    let val_tanggal = document.getElementById("tanggal").value;
    $.ajax({
        type: "GET",
        url: "l_jadwaltomatrik.php",
        data: {dosen1:val_seleksi1,dosen2:val_seleksi2,dosen3:val_seleksi3,tanggal:val_tanggal},
        cache: false,
        success: function(data){
            var tes = JSON.parse(data);
            var $el = $('#jam');
            var prevValue = $el.val();
            $el.empty();
            $.each(tes, function(key, value) {
                var hari_tampil = (value.hari==0) ? "senin" : (value.hari==1) ? "selasa" : (value.hari==2) ? "rabu" : (value.hari==3) ? "kamis" : (value.hari==4) ? "jumat" : (value.hari==5) ? "sabtu" : "something wrong";
                $el.append($('<option></option>').attr('value', value.hari_waktu_awal+' - '+value.hari_waktu_akhir).text(hari_tampil+" "+value.hari_waktu_awal+'-'+value.hari_waktu_akhir));
                if (value === prevValue){
                    $el.val(value);
                }
            });
            var jam = $('jam').val();
    if(jam==""){
      uptanggal();
    }
        }
        
    });
   
    
  });
  
    
    var max=0;
    function uptanggal() {
    var val_seleksi1 = $('#pembimbing').val();
    var val_seleksi2 = $('#penguji1').val();
    var val_seleksi3 = $('#penguji2a').val();
    var date = new Date($('#tanggalhide').val());
    var wasw = date.setDate(date.getDate()+1);
    var tanggal=date.getDate();
    var bulan=date.getMonth()+1;
    var tahun=date.getFullYear();
    if(tanggal<10){tanggal='0'+tanggal} if(bulan<10){bulan='0'+bulan}
    var hasil = tahun+"-"+bulan+"-"+tanggal;
    var hasil2 = tanggal+"-"+bulan+"-"+tahun;
    document.getElementById("tanggal").value = hasil2;
    document.getElementById("tanggalhide").value = hasil;
    let val_tanggala = document.getElementById("tanggal").value;     
    $.ajax({
        type: "GET",
        url: "l_jadwaltomatrik.php",
        data: {dosen1:val_seleksi1,dosen2:val_seleksi2,dosen3:val_seleksi3,tanggal:val_tanggala},
        cache: false,
        success: function(data){
            var tes = JSON.parse(data);
            var $el = $('#jam');
            var prevValue = $el.val();
            $el.empty();
            $.each(tes, function(key, value) {
                var hari_tampil = (value.hari==0) ? "senin" : (value.hari==1) ? "selasa" : (value.hari==2) ? "rabu" : (value.hari==3) ? "kamis" : (value.hari==4) ? "jumat" : (value.hari==5) ? "sabtu" : "something wrong";
                $el.append($('<option></option>').attr('value', value.hari_waktu_awal+' - '+value.hari_waktu_akhir).text(hari_tampil+" "+value.hari_waktu_awal+'-'+value.hari_waktu_akhir));
                if (value === prevValue){
                    $el.val(value);
                }
            });
            var val_jamcek = document.getElementById("jam").text;
            if(max==6){
              return;
            }
            else if(val_jamcek==""){
              
              max = 1+max;
              uptanggal();
            }
        }
    });
    }
    
  
   
    
    function ubahseleksi() {
    var val_seleksi1 = $('#pembimbing').val();
    var val_seleksi2 = $('#penguji1').val();
    var val_seleksi3 = $('#penguji2a').val();
    let val_tanggal = document.getElementById("tanggal").value;
      $.ajax({
        type: "GET",
        url: "l_jadwaltomatrik.php",
        data: {dosen1:val_seleksi1,dosen2:val_seleksi2,dosen3:val_seleksi3,tanggal:val_tanggal},
        cache: false,
        success: function(data){
            var tes = JSON.parse(data);
            var $el = $('#jam');
            var prevValue = $el.val();
            $el.empty();
            $.each(tes, function(key, value) {
                var hari_tampil = (value.hari==0) ? "senin" : (value.hari==1) ? "selasa" : (value.hari==2) ? "rabu" : (value.hari==3) ? "kamis" : (value.hari==4) ? "jumat" : (value.hari==5) ? "sabtu" : "something wrong";
                $el.append($('<option></option>').attr('value', value.hari_waktu_awal+' - '+value.hari_waktu_akhir).text(hari_tampil+" "+value.hari_waktu_awal+'-'+value.hari_waktu_akhir));
                if (value === prevValue){
                    $el.val(value);
                }
            });
        }
    });
   }
   function ubahruang(){
  let val_tanggal = document.getElementById("tanggal").value;
  var e = document.getElementById("jam");
  var val_jam = e.options[e.selectedIndex].value;
  $.ajax({
        type: "GET",
        url: "filter_ruangan.php",
        data: {tanggal:val_tanggal,jam:val_jam},
        cache: false,
        success: function(data){
            var tes = JSON.parse(data);
            var $el = $('#ruang');
            var prevValue = $el.val();
            $el.empty();
            $.each(tes, function(key, value) {
                $el.append($('<option></option>').attr('value', value).text(value));
                if (value === prevValue){
                    $el.val(value);
                }
            });
        }
    });
}
</script>              
          <form method="post" action="editpend.php" >
          <table>
            
            <?php 
            $sq = mysqli_query($konek_db,"SELECT skripsi.* , mahasiswa.nama_mhs , dosen.nama_dosen FROM skripsi, mahasiswa, dosen WHERE skripsi.pembimbing=dosen.nidn AND skripsi.nim=mahasiswa.nim AND skripsi.nim='$nim'");
            $sql = mysqli_fetch_array($sq);
            $nidn_pembimbing=$sql['pembimbing'];
            $nidn_penguji1=$sql['penguji1'];
            $nidn_penguji2=$sql['penguji2'];
            $pembimbing = mysqli_fetch_array(mysqli_query($konek_db,"SELECT nama_dosen FROM dosen WHERE nidn LIKE '%$nidn_pembimbing%'"));
            $penguji1 = mysqli_fetch_array(mysqli_query($konek_db,"SELECT nama_dosen FROM dosen WHERE nidn LIKE '%$nidn_penguji1%'"));
            $penguji2 = mysqli_fetch_array(mysqli_query($konek_db,"SELECT nama_dosen FROM dosen WHERE nidn LIKE '%$nidn_penguji2%'"));
            $nama_pembimbing=$pembimbing['nama_dosen'];
            $nama_penguji1=$penguji1['nama_dosen'];
            $nama_penguji2=$penguji2['nama_dosen'];
            

            ?>
            
             <tr>
              <td>NIM</td>
              <td>:</td>
              <td><input type="text" class="form-control" name="nim"  readonly="readonly" value="<?php echo $nim; ?>"></td>
            </tr>
             <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" readonly="readonly" name="nama" class="form-control" value="<?php echo $sql['nama_mhs']; ?>"></td>
            </tr>
            <tr>
              <td>Judul</td>
              <td>:</td>
              <td>
              <textarea readonly="readonly" name="nama" class="form-control rounded-0" rows="3" style="width: 400px;" value="<?php echo $sql['judul']; ?>"><?php echo $sql['judul']; ?></textarea>
              
              </td>
            </tr>
            <tr>
              <td>Pembimbing</td>
              <td>:</td>
              <td><input type="hidden" readonly="readonly" id ="pembimbing" name="pembimbing" class="form-control" value="<?php echo $nidn_pembimbing; ?>">
              <input type="text" readonly="readonly" id ="pembimbinga" name="pembimbinga" class="form-control" value="<?php echo $nama_pembimbing; ?>"></td>
            </tr>
            <tr>
              <td>Penguji 1</td>
              <td>:</td>
              <td>
              <input type="hidden" readonly="readonly" id="penguji1" name="penguji1" class="form-control" value="<?php echo $nidn_penguji1; ?>">
              <input type="text" readonly="readonly" id="penguji1a" name="penguji1a" class="form-control" value="<?php echo $nama_penguji1; ?>"></td>
            </tr>
            <tr>
              <td>Penguji 2</td>
              <td>:</td>
              <td><input type="hidden" readonly="readonly" id="penguji2" name="penguji2" class="form-control" value="<?php echo $nidn_penguji2; ?>">
              <input type="text" readonly="readonly" id="penguji2a" name="penguji2a" class="form-control" value="<?php echo $nama_penguji2; ?>"></td>
            </tr>
            
            <tr>
              <input type="hidden" id="tanggalhide">
              <td>Tanggal</td>
              <td>:</td>
              <td>
              <?php $tanggalujian = mysqli_fetch_array(mysqli_query($konek_db,"SELECT tanggal FROM jadwal_pendadaran WHERE mhs_terlibat LIKE '%$nim%'Limit 1"));
            $tgl=$tanggalujian['tanggal'];
            $tglsekarang=date("d-m-Y");
            $d=strtotime("+1 Days");
            $e=strtotime("+2 Days");
            $tgl_1=date("d-m-Y", $d);
            $tgl_2=date("d-m-Y", $e);

            if($tgl_1==$tgl||$tgl_2==$tgl){
              echo "<input type='text' name='tanggaldisabled' id='tanggaldisabled' class='form-control'  disabled value='$tgl'>";
            }
            else{
              echo "<input type='text' name='tanggal' id='tanggal' class='form-control' onchange='ubahseleksi();'>";
            }
            ?>
              </td>
            </tr>                             
            <tr>
              <td>Jam</td>
              <td>:</td>
              <td>
              <?php $tanggalujian = mysqli_fetch_array(mysqli_query($konek_db,"SELECT tanggal FROM jadwal_pendadaran WHERE mhs_terlibat LIKE '%$nim%'Limit 1"));
              $jamujian = mysqli_fetch_array(mysqli_query($konek_db,"SELECT jam FROM pendadaran WHERE nim LIKE '%$nim%'Limit 1"));
              $jam=$jamujian['jam'];
            $tgl=$tanggalujian['tanggal'];
            $tglsekarang=date("d-m-Y");
            $d=strtotime("+1 Days");
            $e=strtotime("+2 Days");
            $tgl_1=date("d-m-Y", $d);
            $tgl_2=date("d-m-Y", $e);
            if($tgl_1==$tgl||$tgl_2==$tgl){
              echo "<input type='text' name='jamdisabled' id='jamdisabled' class='form-control'  disabled value='$jam'>";
            }
            else{
              echo "<select class ='form-control' name ='jam' id='jam' onchange='ubahruang();'></select>";
            }
            ?>
              </td>
            </tr> 
            <tr>
              <td>Ruang</td>
              <td>:</td>
              <?php $tanggalujian = mysqli_fetch_array(mysqli_query($konek_db,"SELECT tanggal FROM jadwal_pendadaran WHERE mhs_terlibat LIKE '%$nim%'Limit 1"));
              $ruangujian = mysqli_fetch_array(mysqli_query($konek_db,"SELECT ruang FROM pendadaran WHERE nim LIKE '%$nim%'Limit 1"));
              $ruang=$ruangujian['ruang'];
            $tgl=$tanggalujian['tanggal'];
            $tglsekarang=date("d-m-Y");
            $d=strtotime("+1 Days");
            $e=strtotime("+2 Days");
            $tgl_1=date("d-m-Y", $d);
            $tgl_2=date("d-m-Y", $e);
            if($tgl_1==$tgl||$tgl_2==$tgl){
              echo "<td><input type='text' name='ruangdisabled' id='ruangdisabled' class='form-control'  disabled value='$ruang'></td>";
            }
            else{
              echo "<td>
              <select class='form-control' name='ruang' id='ruang'>
                <option value='Ruang 1'>Ruang 1</option>
                <option value='Ruang 2'>Ruang 2</option>
                <option value='Ruang 3'>Ruang 3</option>
                <option value='Ruang 4'>Ruang 4</option>
                <option value='Ruang 5'>Ruang 5</option>
                <option value='Ruang 6'>Ruang 6</option>
                <option value='Ruang 7'>Ruang 7</option>
              </select>
              </td>";
            }
            ?>
              
            </tr>                               
            <tr>
            <tr>
              <td>Status</td>
              <td>:</td>
              <td>
                <select name="status" class="form-control">
                  <option value="<?php echo $sql['status']; ?>" ><?php echo $sql['status']; ?></option>
                  <option value="Gagal">Gagal Pendadaran</option>
                  <option value="Lulus">Lulus</option>
                </select>
              </td>
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
</body>

</html>
