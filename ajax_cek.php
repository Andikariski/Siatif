<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link href="css/jquery-ui.css" rel="stylesheet" />
</head>


<script src="vendor/jquery/jquery-ui.js"></script>
<script src="vendor/jquery/jquery.datetimepicker.full.js"></script>
<style>
  .markholiday .ui-state-default
  {
    color:red;
  }
</style>
<?php

date_default_timezone_set("Asia/Jakarta");
require_once('koneksi.php');
$action = $_REQUEST['action'];
if($action == "show-all"){

	$stmt=$konek_db->prepare('SELECT * FROM skripsi');
	$stmt->execute();
  ?>
  <table>
            
            <tr>
              <td>Semester</td>
              <td>:</td>
              <td> 
              <input type="text" name="semester" class="form-control" readonly="readonly" style="width: 346px;">
              </td>
            </tr> 
            <tr>
              <td>Judul Tugas Akhir</td>
              <td>:</td>
              <td><textarea name="judul" class="form-control rounded-0" rows="3" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" readonly="readonly"></textarea></td>
            </tr>              
            <tr>
              <td>Dosen Pembimbing</td>
              <td>:</td>
              <td> <select class="form-control" name="dosbing" style="width: 346px;">
                <option>--Pilih--</option>
                                
                   </select> </td>
            </tr>
            <tr>
              <td>Dosen Penguji 1</td>
              <td>:</td>
              <td> <select class="form-control" name="dosbing" style="width: 346px;">
                <option>--Pilih--</option>
                                  
                   </select> </td>
            </tr>  
            <tr>
              <td>Rekomendasi Dosen Penguji 2</td>
              <td>:</td>
              <td> <select class="form-control" name="dosbing" >
                <option>--Pilih--</option>
                                 
                   </select> </td>
            </tr>   
            <tr>
              <td>Tanggal</td>
              <td>:</td>
              <td><input type="date" name="tanggal" class="form-control"></td>
            </tr>
            <tr>
              <td>Jam</td>
              <td>:</td>
              <td><select class="form-control" name="jam"></select></td>
            </tr> 
      
             
            <tr>
              <td>Ruang</td>
              <td>:</td>
              <td><input type="text" name="ruang" placeholder="Ruang" class="form-control"></td>
            </tr>                               
            <tr>
              <td></td>
              <td></td>
              <td><input type="submit" class="btn btn-primary" name="Kirim" value="Simpan"> </td>
            </tr>
          </table>
  <?php 
}
else{

  $stmt=mysqli_query($konek_db,"SELECT skripsi.*, dosen.* FROM skripsi, dosen WHERE skripsi.pembimbing=dosen.nidn AND skripsi.nim='$action'");
	$data = mysqli_fetch_array($stmt);



?>
<form method="post" action="daftarpendadaran.php">
  <table>
    <input type="hidden" name="nim" value="<?php echo $data['nim'] ?>">
              <tr>
              <td>Semester</td>
              <td>:</td>
              <td> 
              <input type="text" name="semester" value="<?php echo $data['semester'] ?>" style="width: 346px;" class="form-control" readonly="readonly">
              </td>
            </tr> 
            <tr>
              <td>Judul Tugas Akhir</td>
              <td>:</td>
              <td><textarea name="judul" class="form-control rounded-0" rows="3" style="width: 346px;" readonly="readonly" ><?php echo $data['judul'] ?></textarea></td>
            </tr> 
            <?php 
            //proses ambil API
            $text = $data['judul'];
            $query = str_replace(" ", "%20", $text);
            $json=file_get_contents("http://localhost:5000/search?q=$query");
            $dt = json_decode($json, true);
            $sv = [];
      foreach ($dt as $value) {
           foreach ($value['details'] as $key) {
              $cari = substr($key['pembimbing'],0,9);        
              $sql = mysqli_query($konek_db,"SELECT * FROM dosen WHERE nama_dosen LIKE '%$cari%' ");
              $q = mysqli_fetch_array($sql);
        array_push($sv,$q['nama_dosen']);
                  }
              }   
            $save = array_unique($sv);

            ?>             
            <tr>
              <td>Dosen Pembimbing</td>
              <td>:</td>
              <td>
              <input type="hidden" id="dosen" value="<?php echo $data['nidn']; ?>">
              <input type="text" class="form-control"  value="<?php echo $data['nama_dosen']; ?>" name="" readonly> 
                <!-- <select class="form-control" name="pembimbing" style="width: 346px;" >
                <?php 
               
                      ?>        
                   </select> --> </td>
            </tr>
            <tr>
              <td>Dosen Penguji 1</td>
              <td>:</td>
              <td> <select class="form-control" style="width: 346px;" id="penguji1" name="penguji1" onchange="ubahseleksi();">
                <?php
                $p1 = mysqli_query($konek_db,"SELECT skripsi.penguji1, dosen.* FROM dosen,skripsi WHERE skripsi.penguji1=dosen.nidn AND skripsi.nim = '$data[nim]' ");
                      $d1 = mysqli_fetch_array($p1);
                      echo "<option value='$d1[penguji1]'>$d1[nama_dosen]</option>"; //penguji dari db
                $p2 = mysqli_query($konek_db,"SELECT * FROM dosen WHERE jabfung='$d1[jabfung]'");
                  foreach ($p2 as $key) {
                    if($d1['penguji1'] != $key['nidn'])
                    echo "<option value='$key[nidn]'>$key[nama_dosen]</option>";
                  }
                      ?>               
                   </select> </td>
            </tr>  
            <tr>
              <td>Rekomendasi Dosen Penguji 2</td>
              <td>:</td>
              <td> <select id="pembimbing" class="form-control" name="penguji2" onchange="ubahseleksi();";>
                <?php
                $i = 1;
                  foreach ($save as $value){
                    if ($value != $data['nama_dosen'] AND $value != $d1['nama_dosen']) {
                      $cek = mysqli_fetch_array(mysqli_query($konek_db,"SELECT * FROM dosen WHERE nidn='$value'"));
                    $i=$i+1;
                    $isi = $text."?".$value;
          echo "<option value='$isi'>$value</option>";
          if ($i>5) {
            break;
          }
        }
}

                 ?>

<script>
//API tanggal merah yang di dapat dari calendarific ada batasan 1000 kali menggunakan api selebihnya harus bayar
var gettanggal = new Date();
var tahunnya=gettanggal.getFullYear();
  $(document).ready(function() {
    var tgl_merah=[];
    $.getJSON('https://calendarific.com/api/v2/holidays?&api_key=79673d8ffb4b6374f3d1f40a4ed60813ea2251f5&country=ID&year='+tahunnya, function(data) {
    var i;
    for (i = 0; i < data.response.holidays.length; i++) {
    tgl_merah.push(data.response.holidays[i].date.iso.substring(0,10));
    }
    
  });
 //menandai tanggal merah 
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
    
  });
    //merekomendasikan 7 hari setelah pendaftaran pendadaran sebagai waktu ujian
    var val_seleksi1 = $('#dosen').val();
    var val_seleksi2 = $('#penguji1').val();
    var val_seleksi3 = $('#pembimbing option:selected').text();
    var today = new Date();
    today.setDate(today.getDate()+6);
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm}
    today = yyyy+"-"+mm+"-"+dd;
    todaya = dd+"-"+mm+"-"+yyyy;
    document.getElementById("tanggal").value = todaya;
    document.getElementById("tanggalhide").value = today;
    let val_tanggal = document.getElementById("tanggal").value;
    //mengambil hasil rekomendasi di l_jadwaltomatrik.php
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
            
            
           var jam = $('jam').text();
         
        if(jam==""){
      uptanggal();
      }
        }
    });
    
    
  
    
    var max=0;
    //menambahkan tanggal otomatis jika hari yang direkomendasikan ternyata kosong jadwalnya
    function uptanggal() {
    var val_seleksi1 = $('#dosen').val();
    var val_seleksi2 = $('#penguji1').val();
    var val_seleksi3 = $('#pembimbing option:selected').text();
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
    var cektanggal = $('#tanggalhide').val();
    // api tanggal merah
    var tgl_meraha=[];
    $.getJSON('https://calendarific.com/api/v2/holidays?&api_key=79673d8ffb4b6374f3d1f40a4ed60813ea2251f5&country=ID&year='+tahunnya, function(data) {
    //data is the JSON string    
    var i;
    for (i = 0; i < data.response.holidays.length; i++) {
    tgl_meraha.push(data.response.holidays[i].date.iso.substring(0,10));
    }
    for (var i=0; i < tgl_meraha.length; ++i){
       if (cektanggal==tgl_meraha[i]){
         uptanggal();
       }
       }
    
    });
    
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
            var val_jamcek = document.getElementById("jam").value;
            if(max==6){
              max=0;
              return;
            }
            else if(val_jamcek==""){
              uptanggal();
              max = 1+max;
            }
        }
    });
    }

    
</script>                                
                   </select>  </td>
                    <td>
                  <span id="tooltip"></span>
                    </td>
            </tr>
            <tr>
              <td>Penguji Lainnya</td>
              <td>:</td>
              <td><select name="alt" class="form-control select2" id="alt" onchange="ubahseleksi();"></select></td>
            </tr>
            <tr>
              <input type="hidden" id="tanggalhide">
              <td>Tanggal</td>
              <td>:</td>
              <td><input type="text" name="tanggal" id="tanggal" class="form-control" onchange="ubahseleksi();" ></td>
            </tr>                             
            <tr>
              
              <td>Jam</td>
              <td>:</td>
              <td><select class ="form-control" name ="jam" id="jam" onchange="ubahruang();"></select></td>
            </tr> 
            <tr>
              <td>Ruang</td>
              <td>:</td>
              <td><select class="form-control" name="ruang" id="ruang">
                <option value="Ruang 1">Ruang 1</option>
                <option value="Ruang 2">Ruang 2</option>
                <option value="Ruang 3">Ruang 3</option>
                <option value="Ruang 4">Ruang 4</option>
                <option value="Ruang 5">Ruang 5</option>
                <option value="Ruang 6">Ruang 6</option>
                <option value="Ruang 7">Ruang 7</option>
              </select></td>
            </tr>                               
            <tr>
              <td></td>
              <td></td>
              <td><input type="submit" class="btn btn-primary" name="Kirim" value="Simpan"> </td>
            </tr>
          </table>
  </table>
  </form>

  <script type="text/javascript" language="javascript">
  //untuk mengubah jadwal rekomendasi berdasarkan dosen yang dipilih
   function ubahseleksi() {
    var val_seleksi1 = $('#dosen').val();
    var val_seleksi2 = $('#penguji1').val();
    var val_seleksi3 = $('#pembimbing option:selected').text();
    var val_seleksi4 = $('#alt option:selected').text();
    let val_tanggal = document.getElementById("tanggal").value;
    if(val_seleksi4 == ""){
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
   else{
    $.ajax({
        type: "GET",
        url: "l_jadwaltomatrik.php",
        data: {dosen1:val_seleksi1,dosen2:val_seleksi2,dosen3:val_seleksi4,tanggal:val_tanggal},
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
      
   
    
    
   
}
function ubahruang(){
  //mendapatkan hasil rekomendasi ruangan
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

 
    document.querySelectorAll('input[type=number]')
  .forEach(e => e.oninput = () => {
    // Always 2 digits
    if (e.value.length >= 2) e.value = e.value.slice(0, 2);
    // 0 on the left (doesn't work on FF)
    if (e.value.length === 1) e.value = '0' + e.value;
    // Avoiding letters on FF
    if (!e.value) e.value = '00';
  });

        </script>
        <script src="tool.js"></script>
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
           placeholder: 'Penguji Alternatif',
           ajax: {
              dataType: 'json',
              url: 'getdos.php',
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
<?php } ?>