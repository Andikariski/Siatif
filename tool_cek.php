<head>

</head>
<?php
require_once('koneksi.php');
$action = $_REQUEST['action'];


if($action == "show-all"){
?>
<a href="#" data-toggle="tooltip"  data-placement="top" title="...">
                    <img src="info.png" style="width: 15px; height: 15px;"></a>
<?php
	// $stmt=$konek_db->prepare('SELECT * FROM skripsi');
	// $stmt->execute();
  ?>
  <?php 
}
else{
//echo "$action";
list($a, $dos) = explode("?", $action);
  $query =  str_replace(" ", "%20", $a);
 $json=file_get_contents("http://localhost:5000/search?q=$query");
     $data = json_decode($json, true);
    
 foreach ($data as $value) {

       foreach ($value['details'] as $key) {
          $cari = substr($key['pembimbing'],0,9);        
         $sql = mysqli_query($konek_db,"SELECT * FROM dosen WHERE nama_dosen LIKE '%$cari%' ");
         $q = mysqli_fetch_array($sql);
          if ($q['nama_dosen']==$dos) {
           ?>
           
                   <a href="#" data-toggle="tooltip"  data-placement="top" title="<?php echo "$key[score] - $key[judul]"; ?>">
                    <img src="info.png" style="width: 15px; height: 15px;"></a>
                   
                    

          <?php

          break;
          }

         
       }}
}
?>
