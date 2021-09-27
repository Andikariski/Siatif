<?php 
// require('koneksi.php');
// $q = $_GET['q'];

// $sql = mysqli_query($konek_db,"SELECT nim FROM skripsi WHERE nim LIKE '%$q%'");
// $json = [];

// while ($row = $sql->fetch_assoc()) {
// 	$json[]=['nim'=>$row['nim']];
// }
// // $num = mysqli_num_rows($sql);
// // if($num > 0){
// // 	while ($data = mysqli_fetch_assoc($sql)) {
// // 		$tmp[]=$data;
// // 	}
//  // }
// // else $tmp = array();

// echo json_encode($json);
?>

<?php
if($_SERVER['REQUEST_METHOD']=="GET"){
 require 'koneksi.php';
 getNim($_GET['search']);
}
 
function getNim($search){
 global $konek_db;
 
 if ($konek_db->connect_error) {
     die("Koneksi Gagal: " . $conn->connect_error);
 }
 
 $sql = "SELECT * FROM skripsi WHERE nim LIKE '%$search%' AND status='Skripsi' ORDER BY nim ASC";
 $result = $konek_db->query($sql);
 
 if ($result->num_rows > 0) {
     $list = array();
     $key=0;
     while($row = $result->fetch_assoc()) {
         $list[$key]['id'] = $row['nim'];
         $list[$key]['text'] = $row['nim']; 
     $key++;
     }
     echo json_encode($list);
 } else {
     echo "hasil kosong";
 }
 $konek_db->close();
}
 
?>