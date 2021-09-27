<?php 
include "koneksi.php";
$nim = $_POST['nim'];
$nama = $_POST['nama']; 
$judul = $_POST['judul'];
$pe = $_POST['pembimbing'];
$sem = $_POST['semester'];
$status ="Metopen";
$tgl=date('d/m/Y');
list($a, $dos) = explode("?", $pe);
$cek = mysqli_fetch_array(mysqli_query($konek_db,"SELECT nidn FROM dosen WHERE nama_dosen = '$dos'"));
      if (isset($_POST['alt'])) {
        $alt = $_POST['alt'];
          $mysql =mysqli_query($konek_db,"INSERT INTO mahasiswa (nim,nama_mhs) VALUES ('$nim','$nama')");
      $skripsi = mysqli_query($konek_db,"INSERT INTO skripsi (nim,judul,pembimbing,tgl_mulai_meto,semester,status) VALUES ('$nim','$judul','$alt','$tgl','$sem','$status')");         
      if($mysql==TRUE){
        echo '<script languange="javascript"> 
          alert("Berhasil Input");
        </script>';
        echo '<script>window.location.href="cek_mhs.php";
        </script>';
      }
      else {
        echo '<script languange="javascript"> 
          alert("Gagal Input NIM Telah Terdaftar");
        </script>';
        echo '<script>window.location.href="metopen.php";
        </script>';        
      }
        }
        else{         
          $mysql =mysqli_query($konek_db,"INSERT INTO mahasiswa (nim,nama_mhs) VALUES ('$nim','$nama')");
      $skripsi = mysqli_query($konek_db,"INSERT INTO skripsi (nim,judul,pembimbing,tgl_mulai_meto,semester,status) VALUES ('$nim','$judul','$cek[nidn]','$tgl','$sem','$status')");
      if($mysql==TRUE){
        echo '<script languange="javascript"> 
          alert("Berhasil Input");
        </script>';
        echo '<script>window.location.href="cek_mhs.php";
        </script>';
      }
      else {
        echo '<script languange="javascript"> 
          alert("Gagal Input NIM Telah Terdaftar");
        </script>';
        echo '<script>window.location.href="metopen.php";
        </script>';
        
      }
        }

?>