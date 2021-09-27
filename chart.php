<?php
include 'koneksi.php';
// $penjualan = mysqli_query($konek_db, "SELECT Penjualan FROM smartphone order by ID asc");
// $merek = mysqli_query($konek_db, "SELECT Merk FROM smartphone order by ID asc");
$b=mysqli_query ($konek_db,"SELECT *, (SELECT count(skripsi.pembimbing) from skripsi WHERE skripsi.pembimbing=dosen.nidn) as jumlah FROM dosen GROUP BY dosen.nama_dosen");
$a=mysqli_query ($konek_db,"SELECT *, (SELECT count(skripsi.pembimbing) from skripsi WHERE skripsi.pembimbing=dosen.nidn) as jumlah FROM dosen GROUP BY dosen.nama_dosen");
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Demo Grafik Batang</title>
    <script src="js/chartjs/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>

    <div class="container">
            <canvas id="demobar" width="100" height="100"></canvas>
    </div>

      	<script  type="text/javascript">

    	  var ctx = document.getElementById("demobar").getContext("2d");
    	  var data = {
    	            labels: [<?php while ($p = mysqli_fetch_array($a)) { echo '"' . $p['nama_dosen'] . '",';}?>],
    	            datasets: [
    	            {
    	              label: "Penjualan Smartphone",
    	              data: [<?php while ($p = mysqli_fetch_array($b)) { echo '"' . $p['jumlah'] . '",';}?>],
                    backgroundColor: [
                      "rgba(59, 100, 222, 1)",
                      "rgba(203, 222, 225, 0.9)",
                      "rgba(102, 50, 179, 1)",
                      "rgba(201, 29, 29, 1)",
                      "rgba(81, 230, 153, 1)",
                      "rgba(246, 34, 19, 1)"]
    	            }
    	            ]
    	            };

    	  var myBarChart = new Chart(ctx, {
    	            type: 'bar',
    	            data: data,
    	            options: {
    	            barValueSpacing: 20,
    	            scales: {
    	              yAxes: [{
    	                  ticks: {
    	                      min: 0,
    	                  }
    	              }],
    	              xAxes: [{
    	                          gridLines: {
    	                              color: "rgba(0, 0, 0, 0)",
    	                          }
    	                      }]
    	              }
    	          }
    	        });
    	</script>

  </body>
</html>