<?php 
include "koneksi.php";
$dosen = $_POST['alt'];
$judul = $_POST['judul'];
      $mysql =mysqli_query($konek_db,"INSERT INTO topik (judultopik,dosen) VALUES ('$judul','$dosen')");
      if($mysql==TRUE){
        echo '<script languange="javascript"> 
          alert("Berhasil Input");
        </script>';
        echo '<script>window.location.href="topik_dosen.php";
        </script>';
      }
      else {
        echo '<script languange="javascript"> 
          alert("Gagal Input");
        </script>';
        echo '<script>window.location=history.go(-1);
        </script>';
        
      }
        

?>