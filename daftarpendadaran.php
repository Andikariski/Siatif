<?php 
include 'koneksi.php';
$nim = $_POST['nim'];
$pe1 = $_POST['penguji1'];
$pe2 = $_POST['penguji2'];
$date = $_POST['tanggal'];
$jam = $_POST['jam'];
$ruang = $_POST['ruang'];
$daftar_hari = array(
    'Sunday' => 'minggu',
    'Monday' => 'senin',
    'Tuesday' => 'selasa',
    'Wednesday' => 'rabu',
    'Thursday' => 'kamis',
    'Friday' => 'jumat',
    'Saturday' => 'sabtu'
   );

   $tang=$_POST['tanggal'];
   $namahari = date('l', strtotime($tang));


 $pecah = explode("-", $jam);
 //mencari element array 0
 $jam_mulai = trim($pecah[0]);
 $jam_selesai = trim($pecah[1]);
 //tampilkan hasil pemecahan

$tahun=date('Y');
list($a, $penguji2) = explode("?", $pe2);
list($hari,$bulan,$tahun) = explode("-", $date);
$tanggal = $hari."/".$bulan."/".$tahun;
// echo "$nim <br> $pe1 <br> $dos <br> $hari/$bulan/$tahun <br> $jadwal";

$cari = substr($penguji2,0,11);
$peng2 = mysqli_fetch_array(mysqli_query($konek_db,"SELECT nidn FROM dosen WHERE nama_dosen LIKE '%$cari%' "));
$penguji2=$peng2['nidn']; 
$pembimbing = mysqli_fetch_array(mysqli_query($konek_db,"SELECT pembimbing FROM skripsi WHERE nim LIKE '%$nim%' "));
$pembimbingnya=$pembimbing['pembimbing'];
if (isset($_POST['alt'])) {
$alt = $_POST['alt'];
$delete = mysqli_query($konek_db,"Delete from jadwal_pendadaran where mhs_terlibat='$nim'");
$insert_pendadaran1 = mysqli_query($konek_db,"INSERT INTO jadwal_pendadaran(tanggal,hari,dosen,mhs_terlibat,jam_mulai,jam_selesai) VALUES ('$date','$daftar_hari[$namahari]','$pembimbingnya','$nim','$jam_mulai','$jam_selesai')");
$insert_pendadaran2 = mysqli_query($konek_db,"INSERT INTO jadwal_pendadaran(tanggal,hari,dosen,mhs_terlibat,jam_mulai,jam_selesai) VALUES ('$date','$daftar_hari[$namahari]','$pe1','$nim','$jam_mulai','$jam_selesai')");
$insert_pendadaran3 = mysqli_query($konek_db,"INSERT INTO jadwal_pendadaran(tanggal,hari,dosen,mhs_terlibat,jam_mulai,jam_selesai) VALUES ('$date','$daftar_hari[$namahari]','$alt','$nim','$jam_mulai','$jam_selesai')");
$upd = mysqli_query($konek_db,"UPDATE skripsi SET penguji1='$pe1' ,penguji2='$alt' WHERE nim='$nim' ");
$peng2 = mysqli_query($konek_db,"SELECT  FROM pendadaran WHERE nim LIKE '%$nim%' ");
if($peng2==NULL){
  $jad = mysqli_query($konek_db,"INSERT INTO pendadaran (nim,tanggal,jam,ruang) VALUES ('$nim','$tanggal','$jam','$ruang')");
}
$jad = mysqli_query($konek_db,"UPDATE  pendadaran SET tanggal='$tanggal',jam='$jam',ruang='$ruang' where nim='$nim'");
  
 echo '<script languange="javascript"> 
    alert("Berhasil Daftar");
  </script>';
  echo '<script>window.location.href="cek_pendadaran.php";
  </script>';
}
else{
  $delete = mysqli_query($konek_db,"Delete from jadwal_pendadaran where mhs_terlibat='$nim'");
$insert_pendadaran1 = mysqli_query($konek_db,"INSERT INTO jadwal_pendadaran(tanggal,hari,dosen,mhs_terlibat,jam_mulai,jam_selesai) VALUES ('$date','$daftar_hari[$namahari]','$pembimbingnya','$nim','$jam_mulai','$jam_selesai')");
$insert_pendadaran2 = mysqli_query($konek_db,"INSERT INTO jadwal_pendadaran(tanggal,hari,dosen,mhs_terlibat,jam_mulai,jam_selesai) VALUES ('$date','$daftar_hari[$namahari]','$pe1','$nim','$jam_mulai','$jam_selesai')");
$insert_pendadaran3 = mysqli_query($konek_db,"INSERT INTO jadwal_pendadaran(tanggal,hari,dosen,mhs_terlibat,jam_mulai,jam_selesai) VALUES ('$date','$daftar_hari[$namahari]','$penguji2','$nim','$jam_mulai','$jam_selesai')");
  $upd = mysqli_query($konek_db,"UPDATE skripsi SET penguji1='$pe1' ,penguji2='$penguji2' WHERE nim='$nim' ");
  $peng2 = mysqli_query($konek_db,"SELECT  FROM pendadaran WHERE nim LIKE '%$nim%' ");
  if($peng2==NULL){
    $jad = mysqli_query($konek_db,"INSERT INTO pendadaran (nim,tanggal,jam,ruang) VALUES ('$nim','$tanggal','$jam','$ruang')");
  }
$jad = mysqli_query($konek_db,"UPDATE  pendadaran SET tanggal='$tanggal',jam='$jam',ruang='$ruang' where nim='$nim'");

  echo '<script languange="javascript"> 
    alert("Berhasil Daftar");
  </script>';
  echo '<script>window.location.href="cek_pendadaran.php";
  </script>';
} 
use PHPMailer\PHPMailer\PHPMailer;
    $e_pembimbing = mysqli_fetch_array(mysqli_query($konek_db,"SELECT email,nama_dosen FROM dosen WHERE nidn LIKE '%$pembimbingnya%'"));
    $e_penguji1 = mysqli_fetch_array(mysqli_query($konek_db,"SELECT email,nama_dosen FROM dosen WHERE nidn LIKE '%$pe1%'"));
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
   
    if (isset($_POST['alt'])) {
      $e_alt = mysqli_fetch_array(mysqli_query($konek_db,"SELECT email FROM dosen WHERE nidn LIKE '%$alt%'"));
      $em_alt=$e_alt['email']; 
      
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
        $mail->Subject = "JADWAL PENDADARAN";
        $mail->Body = "Pendadaran : ".$nama_mahasiswa."<br>NIM:".$nim."<br>Judul : ".$judul_skripsi."<br>Pada tanggal=".$date."<br> Pukul=".$jam."<br>Ruangan:".$ruang."<br>Pembimbing:".$nama_pembimbing."<br>Penguji 1 : ".$nama_penguji1."<br>Penguji 2 :".$nama_penguji2."<br><a href=http://127.0.0.1/siatifedit/editpend.php?nim=".$nim."><button>Klik Untuk Edit Jadwal</button></a>";
        $mail->addAddress($em_penguji1);
        $mail->addAddress($em_alt);
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
        $mail->Subject = "JADWAL PENDADARAN";
        $mail->Body = "Pendadaran : ".$nama_mahasiswa."<br>NIM:".$nim."<br>Judul : ".$judul_skripsi."<br>Pada tanggal=".$date."<br> Pukul=".$jam."<br>Ruangan:".$ruang."<br>Pembimbing:".$nama_pembimbing."<br>Penguji 1 : ".$nama_penguji1."<br>Penguji 2 :".$nama_penguji2;
        $mail->addAddress($em_mhs);
        //Email Settings
        $mail->send();
      
    }else{
      
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
        $mail->Subject = "JADWAL PENDADARAN";
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
        $mail->Subject = "JADWAL PENDADARAN";
        $mail->Body = "Pendadaran : ".$nama_mahasiswa."<br>NIM:".$nim."<br>Judul : ".$judul_skripsi."<br>Pada tanggal=".$date."<br> Pukul=".$jam."<br>Ruangan:".$ruang."<br>Pembimbing:".$nama_pembimbing."<br>Penguji 1 : ".$nama_penguji1."<br>Penguji 2 :".$nama_penguji2;
        $mail->addAddress($em_mhs);
        //Email Settings
        $mail->send();
        
        //SMTP Settings
        
      
    }
    

?>