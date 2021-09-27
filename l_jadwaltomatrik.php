<?php 
include 'koneksi.php';
//deklarasi array untuk menampung jadwal dosen mengajar dan jadwal dosen menguji pendadaran
$matriksA = array();
$matriksB = array();
$matriksC = array();
$matriksD = array();
$matriksX = array();
$matriksY = array();
$matriksZ = array();
$waktu_awal=0;
$waktu_akhir=0;
$daftar_hari = array(
    'Sunday' => 'minggu',
    'Monday' => 'senin',
    'Tuesday' => 'selasa',
    'Wednesday' => 'rabu',
    'Thursday' => 'kamis',
    'Friday' => 'jumat',
    'Saturday' => 'sabtu'
   );

$tanggal=$_GET['tanggal'];
$namahari = date('l', strtotime($tanggal));

$dosen1 = $_GET['dosen1'];
$dosen2 = $_GET['dosen2'];
$dosen3 = $_GET['dosen3'];
$peng2 = mysqli_fetch_array(mysqli_query($konek_db,"SELECT nidn FROM dosen WHERE nama_dosen LIKE '%$dosen3%' "));
$dosen3_id=$peng2['nidn'];


for($s=1;$s<=6;$s++){
    for($t=1;$t<=15;$t++){
        $matriksA[$s][$t]=0;
        $matriksB[$s][$t]=0;
        $matriksC[$s][$t]=0;
        $matriksD[$s][$t]=0;
        $matriksX[$s][$t]=0;
        $matriksY[$s][$t]=0;
        $matriksZ[$s][$t]=0;
    }
}
//Mengambil jadwal dosen  mengajar dibuat ke array
            $ambil1 = mysqli_query($konek_db,"SELECT * FROM jadwal_dosen1 WHERE dosen ='$dosen1'");
            foreach ($ambil1 as $row){
                $hari;
                for($i=1;$i<=6;$i++){
                    if($i==1){
                        $hari="senin";
                    }
                    if($i==2){
                        $hari="selasa";
                    }
                    if($i==3){
                        $hari="rabu";
                    }
                    if($i==4){
                        $hari="kamis";
                    }
                    if($i==5){
                        $hari="jumat";
                    }
                    if($i==6){
                        $hari="sabtu";
                    }

                    if($row['hari']==$hari && $row['jam_mulai']=="07.00"){
                        $matriksA[$i][1]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="07.50"){
                        $matriksA[$i][2]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="08.45"){
                        $matriksA[$i][3]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="09.35"){
                        $matriksA[$i][4]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="10.30"){
                        $matriksA[$i][5]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="11.20"){
                        $matriksA[$i][6]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="12.30"){
                        $matriksA[$i][7]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="13.20"){
                        $matriksA[$i][8]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="14.15"){
                        $matriksA[$i][9]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="15.15"){
                        $matriksA[$i][10]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="16.10"){
                        $matriksA[$i][11]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="17.00"){
                        $matriksA[$i][12]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="18.30"){
                        $matriksA[$i][13]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="19.20"){
                        $matriksA[$i][14]=1;
                    }
                    if($row['hari']==$hari && $row['jam_mulai']=="20.10"){
                        $matriksA[$i][15]=1;
                    }
                }
            }
            //Mengambil jadwal dosen  mengajar dibuat ke array(dosen2)
                $ambil2 = mysqli_query($konek_db,"SELECT * FROM jadwal_dosen1 WHERE dosen ='$dosen2'");
                foreach ($ambil2 as $row){
                    $hari;
                    for($i=1;$i<=6;$i++){
                        if($i==1){
                            $hari="senin";
                        }
                        if($i==2){
                            $hari="selasa";
                        }
                        if($i==3){
                            $hari="rabu";
                        }
                        if($i==4){
                            $hari="kamis";
                        }
                        if($i==5){
                            $hari="jumat";
                        }
                        if($i==6){
                            $hari="sabtu";
                        }
    
                        if($row['hari']==$hari && $row['jam_mulai']=="07.00"){
                            $matriksB[$i][1]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="07.50"){
                            $matriksB[$i][2]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="08.45"){
                            $matriksB[$i][3]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="09.35"){
                            $matriksB[$i][4]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="10.30"){
                            $matriksB[$i][5]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="11.20"){
                            $matriksB[$i][6]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="12.30"){
                            $matriksB[$i][7]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="13.20"){
                            $matriksB[$i][8]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="14.15"){
                            $matriksB[$i][9]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="15.15"){
                            $matriksB[$i][10]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="16.10"){
                            $matriksB[$i][11]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="17.00"){
                            $matriksB[$i][12]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="18.30"){
                            $matriksB[$i][13]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="19.20"){
                            $matriksB[$i][14]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="20.10"){
                            $matriksB[$i][15]=1;
                        }
                    }
                    
                      
                }
                //Mengambil jadwal dosen  mengajar dibuat ke array(dosen3)
                $ambil3 = mysqli_query($konek_db,"SELECT * FROM jadwal_dosen1 WHERE dosen ='$dosen3_id'");
                
                foreach ($ambil3 as $row){
                    $hari;
                    for($i=1;$i<=6;$i++){
                        if($i==1){
                            $hari="senin";
                        }
                        if($i==2){
                            $hari="selasa";
                        }
                        if($i==3){
                            $hari="rabu";
                        }
                        if($i==4){
                            $hari="kamis";
                        }
                        if($i==5){
                            $hari="jumat";
                        }
                        if($i==6){
                            $hari="sabtu";
                        }
    
                        if($row['hari']==$hari && $row['jam_mulai']=="07.00"){
                            $matriksC[$i][1]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="07.50"){
                            $matriksC[$i][2]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="08.45"){
                            $matriksC[$i][3]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="09.35"){
                            $matriksC[$i][4]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="10.30"){
                            $matriksC[$i][5]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="11.20"){
                            $matriksC[$i][6]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="12.30"){
                            $matriksC[$i][7]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="13.20"){
                            $matriksC[$i][8]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="14.15"){
                            $matriksC[$i][9]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="15.15"){
                            $matriksC[$i][10]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="16.10"){
                            $matriksC[$i][11]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="17.00"){
                            $matriksC[$i][12]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="18.30"){
                            $matriksC[$i][13]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="19.20"){
                            $matriksC[$i][14]=1;
                        }
                        if($row['hari']==$hari && $row['jam_mulai']=="20.10"){
                            $matriksC[$i][15]=1;
                        }
                    }
                }
                //Mengambil jadwal dosen menguji pendadaran dibuat ke array
                $ambil4 = mysqli_query($konek_db,"SELECT * FROM jadwal_pendadaran WHERE dosen ='$dosen1' AND tanggal ='$tanggal'");
                
                foreach ($ambil4 as $row){
                    $hari;
                    for($i=1;$i<=6;$i++){
                        if($i==1){
                            $hari="senin";
                        }
                        if($i==2){
                            $hari="selasa";
                        }
                        if($i==3){
                            $hari="rabu";
                        }
                        if($i==4){
                            $hari="kamis";
                        }
                        if($i==5){
                            $hari="jumat";
                        }
                        if($i==6){
                            $hari="sabtu";
                        }
    
                        if($row['hari']==$hari && $row['jam_mulai']=="07.00"){
                            $waktu_awal=1;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="07.50"){
                            $waktu_awal=2;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="08.45"){
                            $waktu_awal=3;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="09.35"){
                            $waktu_awal=4;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="10.30"){
                            $waktu_awal=5;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="11.20"){
                            $waktu_awal=6;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="12.30"){
                            $waktu_awal=7;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="13.20"){
                            $waktu_awal=8;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="14.15"){
                            $waktu_awal=9;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="15.15"){
                            $waktu_awal=10;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="16.10"){
                            $waktu_awal=11;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="17.00"){
                            $waktu_awal=12;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="18.30"){
                            $waktu_awal=13;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="19.20"){
                            $waktu_awal=14;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="20.10"){
                            $waktu_awal=15;
                        }
                        
                        if($row['hari']==$hari && $row['jam_selesai']=="07.50"){
                            $waktu_akhir=1;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="08.40"){
                            $waktu_akhir=2;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="09.35"){
                            $waktu_akhir=3;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="10.25"){
                            $waktu_akhir=4;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="11.20"){
                            $waktu_akhir=5;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="12.10"){
                            $waktu_akhir=6;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="13.20"){
                            $waktu_akhir=7;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="14.10"){
                            $waktu_akhir=8;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="15.05"){
                            $waktu_akhir=9;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="16.05"){
                            $waktu_akhir=10;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="17.00"){
                            $waktu_akhir=11;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="17.50"){
                            $waktu_akhir=12;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="19.20"){
                            $waktu_akhir=13;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="20.10"){
                            $waktu_akhir=14;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="21.00"){
                            $waktu_akhir=15;
                        }
                        
                        for($waktu_awal;$waktu_awal<=$waktu_akhir;$waktu_awal++){
                            $matriksX[$i][$waktu_awal]=1;
                        }
                    }
                }
                //Mengambil jadwal dosen menguji pendadaran dibuat ke array (dosen2)
                $ambil5 = mysqli_query($konek_db,"SELECT * FROM jadwal_pendadaran WHERE dosen ='$dosen2' AND tanggal ='$tanggal'");
                
                foreach ($ambil5 as $row){
                    $hari;
                    for($i=1;$i<=6;$i++){
                        if($i==1){
                            $hari="senin";
                        }
                        if($i==2){
                            $hari="selasa";
                        }
                        if($i==3){
                            $hari="rabu";
                        }
                        if($i==4){
                            $hari="kamis";
                        }
                        if($i==5){
                            $hari="jumat";
                        }
                        if($i==6){
                            $hari="sabtu";
                        }
    
                        if($row['hari']==$hari && $row['jam_mulai']=="07.00"){
                            $waktu_awal=1;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="07.50"){
                            $waktu_awal=2;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="08.45"){
                            $waktu_awal=3;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="09.35"){
                            $waktu_awal=4;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="10.30"){
                            $waktu_awal=5;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="11.20"){
                            $waktu_awal=6;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="12.30"){
                            $waktu_awal=7;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="13.20"){
                            $waktu_awal=8;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="14.15"){
                            $waktu_awal=9;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="15.15"){
                            $waktu_awal=10;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="16.10"){
                            $waktu_awal=11;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="17.00"){
                            $waktu_awal=12;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="18.30"){
                            $waktu_awal=13;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="19.20"){
                            $waktu_awal=14;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="20.10"){
                            $waktu_awal=15;
                        }
                        
                        if($row['hari']==$hari && $row['jam_selesai']=="07.50"){
                            $waktu_akhir=1;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="08.40"){
                            $waktu_akhir=2;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="09.35"){
                            $waktu_akhir=3;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="10.25"){
                            $waktu_akhir=4;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="11.20"){
                            $waktu_akhir=5;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="12.10"){
                            $waktu_akhir=6;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="13.20"){
                            $waktu_akhir=7;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="14.10"){
                            $waktu_akhir=8;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="15.05"){
                            $waktu_akhir=9;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="16.05"){
                            $waktu_akhir=10;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="17.00"){
                            $waktu_akhir=11;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="17.50"){
                            $waktu_akhir=12;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="19.20"){
                            $waktu_akhir=13;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="20.10"){
                            $waktu_akhir=14;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="21.00"){
                            $waktu_akhir=15;
                        }
                        for($waktu_awal;$waktu_awal<=$waktu_akhir;$waktu_awal++){
                            $matriksY[$i][$waktu_awal]=1;
                        }
                    }
                }
                //Mengambil jadwal dosen menguji pendadaran dibuat ke array (dosen3)
                $ambil6 = mysqli_query($konek_db,"SELECT * FROM jadwal_pendadaran WHERE dosen ='$dosen3_id' AND tanggal ='$tanggal'");
                
                foreach ($ambil6 as $row){
                    $hari;
                    for($i=1;$i<=6;$i++){
                        if($i==1){
                            $hari="senin";
                        }
                        if($i==2){
                            $hari="selasa";
                        }
                        if($i==3){
                            $hari="rabu";
                        }
                        if($i==4){
                            $hari="kamis";
                        }
                        if($i==5){
                            $hari="jumat";
                        }
                        if($i==6){
                            $hari="sabtu";
                        }
                        
                        
                        if($row['hari']==$hari && $row['jam_mulai']=="07.00"){
                            $waktu_awal=1;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="07.50"){
                            $waktu_awal=2;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="08.45"){
                            $waktu_awal=3;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="09.35"){
                            $waktu_awal=4;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="10.30"){
                            $waktu_awal=5;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="11.20"){
                            $waktu_awal=6;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="12.30"){
                            $waktu_awal=7;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="13.20"){
                            $waktu_awal=8;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="14.15"){
                            $waktu_awal=9;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="15.15"){
                            $waktu_awal=10;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="16.10"){
                            $waktu_awal=11;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="17.00"){
                            $waktu_awal=12;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="18.30"){
                            $waktu_awal=13;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="19.20"){
                            $waktu_awal=14;
                        }
                        else if($row['hari']==$hari && $row['jam_mulai']=="20.10"){
                            $waktu_awal=15;
                        }
                        
                        if($row['hari']==$hari && $row['jam_selesai']=="07.50"){
                            $waktu_akhir=1;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="08.40"){
                            $waktu_akhir=2;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="09.35"){
                            $waktu_akhir=3;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="10.25"){
                            $waktu_akhir=4;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="11.20"){
                            $waktu_akhir=5;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="12.10"){
                            $waktu_akhir=6;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="13.20"){
                            $waktu_akhir=7;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="14.10"){
                            $waktu_akhir=8;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="15.05"){
                            $waktu_akhir=9;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="16.05"){
                            $waktu_akhir=10;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="17.00"){
                            $waktu_akhir=11;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="17.50"){
                            $waktu_akhir=12;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="19.20"){
                            $waktu_akhir=13;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="20.10"){
                            $waktu_akhir=14;
                        }
                        else if($row['hari']==$hari && $row['jam_selesai']=="21.00"){
                            $waktu_akhir=15;
                        }
                        for($waktu_awal;$waktu_awal<=$waktu_akhir;$waktu_awal++){
                            $matriksZ[$i][$waktu_awal]=1;
                        }
                    }
                }        
         
?>
    

<?php
//Membuat matriks akumulasi dari matriks yang telah di dapatkan
for( $i = 1; $i <= 6; $i++ ) :
    for( $j = 1; $j <= 15; $j++ ) :
         $matriksD[$i][$j]=$matriksA[$i][$j]+$matriksB[$i][$j]+$matriksC[$i][$j]+$matriksX[$i][$j]+$matriksY[$i][$j]+$matriksZ[$i][$j]."&nbsp;&nbsp;&nbsp";
    endfor;
endfor;



$seninawal=array();
$seninakhir=array();
$selasaawal=array();
$selasaakhir=array();
$rabuawal=array();
$rabuakhir=array();
$kamisawal=array();
$kamisakhir=array();
$jumatawal=array();
$jumatakhir=array();
$sabtuawal=array();
$sabtuakhir=array();
//mencari jadwal yang kosong dari sebuah matriks
for( $i = 1; $i <= 6; $i++ ){
    for( $j = 1; $j <= 11; $j++ ){
       if($matriksD[$i][$j]==0 && $matriksD[$i][$j+1]==0 && $matriksD[$i][$j+2]==0 && $j+2<=11){
        if($i==1){
            array_push($seninawal,$j);
            array_push($seninakhir,$j+2);
        }
        if($i==2){
            array_push($selasaawal,$j);
            array_push($selasaakhir,$j+2);
        }
        if($i==3){
            array_push($rabuawal,$j);
            array_push($rabuakhir,$j+2);
        }
        if($i==4){
            array_push($kamisawal,$j);
            array_push($kamisakhir,$j+2);
        }
        if($i==5){
            array_push($jumatawal,$j);
            array_push($jumatakhir,$j+2);
        }
        if($i==6){
            array_push($sabtuawal,$j);
            array_push($sabtuakhir,$j+2);
        }
        }
       }   
    }
    //menentukan jam mulai dan jam berakhir dari hasil yang telah di dapat dari matriks
    $tempawal=array();
    $tempakhir=array();
    for($a=1;$a<=6;$a++){
		if($a==1){
			$tempawal=$seninawal;
            $tempakhir=$seninakhir;
        }
        
		if($a==2){
			$tempawal=$selasaawal;
            $tempakhir=$selasaakhir;
        }
		if($a==3){
			$tempawal=$rabuawal;
            $tempakhir=$rabuakhir;
        }
        
        if($a==4){
			$tempawal=$kamisawal;
            $tempakhir=$kamisakhir;
		}
		if($a==5){
			$tempawal=$jumatawal;
            $tempakhir=$jumatakhir;
		}
		if($a==6){
            $tempawal=$sabtuawal;
            $tempakhir=$sabtuakhir;
        }
      
            $jumlahnya=count($tempawal);
            for($b=0;$b<$jumlahnya;$b++){
            if($tempawal[$b]==1){
                $tempawal[$b]='07.00';
            }
            else if($tempawal[$b]==2){
                $tempawal[$b]='07.50';
            }
            else if($tempawal[$b]==3){
                $tempawal[$b]='08.45';  
            }
            else if($tempawal[$b]==4){
                $tempawal[$b]='09.35'; 
            }
            else if($tempawal[$b]==5){
                $tempawal[$b]='10.30'; 
            }
            else if($tempawal[$b]==6){
                $tempawal[$b]='11.20';  
            }
            else if($tempawal[$b]==7){
                $tempawal[$b]='12.30';   
            }
            else if($tempawal[$b]==8){
                $tempawal[$b]='13.20';   
            }
            else if($tempawal[$b]==9){
                $tempawal[$b]='14.15';
            }
            else if($tempawal[$b]==10){
                $tempawal[$b]='15.15';  
            }
            else if($tempawal[$b]==11){
                $tempawal[$b]='16.10';
            }

            if($tempakhir[$b]==1){ 
                $tempakhir[$b]='07.50';
            }
            else if($tempakhir[$b]==2){   
                $tempakhir[$b]='08.40';
            }
            else if($tempakhir[$b]==3){  
                $tempakhir[$b]='09.35';
            }
            else if($tempakhir[$b]==4){  
                $tempakhir[$b]='10.25';
            }
            else if($tempakhir[$b]==5){    
                $tempakhir[$b]='11.20';
            }
            else if($tempakhir[$b]==6){      
                $tempakhir[$b]='12.10';
            }
            else if($tempakhir[$b]==7){               
                $tempakhir[$b]='13.20';
            }
            else if($tempakhir[$b]==8){ 
                $tempakhir[$b]='14.10';
            }
            else if($tempakhir[$b]==9){
                $tempakhir[$b]='15.05';
            }
            else if($tempakhir[$b]==10){
                $tempakhir[$b]='16.05';
            }
            else if($tempakhir[$b]==11){
                $tempakhir[$b]='17.00';
            }    
        }
        if($a==1){
			$seninawal=$tempawal;
            $seninakhir=$tempakhir;
        }
        
		if($a==2){
			$selasaawal=$tempawal;
            $selasaakhir=$tempakhir;
        }
		if($a==3){
			$rabuawal=$tempawal;
            $rabuakhir=$tempakhir;
        }
        
        if($a==4){
  
			$kamisawal=$tempawal;
            $kamisakhir=$tempakhir;
		}
		if($a==5){
			$jumatawal=$tempawal;
            $jumatakhir=$tempakhir;
            
		}
		if($a==6){
            $sabtuawal=$tempawal;
            $sabtuakhir=$tempakhir;
        }
        }
        
    //mengirimkan data agar bisa ditampilkan
    $data_send = [];
    if($daftar_hari[$namahari]=='senin'){
        for ($a=0;$a<count($seninawal);$a++){
            array_push($data_send,array("hari"=>0,"hari_waktu_awal"=>$seninawal[$a],"hari_waktu_akhir"=>$seninakhir[$a]));
        }
    }
    if($daftar_hari[$namahari]=='selasa'){
        for ($a=0;$a<count($selasaawal);$a++){
            array_push($data_send,array("hari"=>1,"hari_waktu_awal"=>$selasaawal[$a],"hari_waktu_akhir"=>$selasaakhir[$a]));
        }
    }
    if($daftar_hari[$namahari]=='rabu'){
        for ($a=0;$a<count($rabuawal);$a++){
        array_push($data_send,array("hari"=>2,"hari_waktu_awal"=>$rabuawal[$a],"hari_waktu_akhir"=>$rabuakhir[$a]));
        }
    }
    if($daftar_hari[$namahari]=='kamis'){
    for ($a=0;$a<count($kamisawal);$a++){
        array_push($data_send,array("hari"=>3,"hari_waktu_awal"=>$kamisawal[$a],"hari_waktu_akhir"=>$kamisakhir[$a]));
    }}
    if($daftar_hari[$namahari]=='jumat'){
    for ($a=0;$a<count($jumatawal);$a++){
        array_push($data_send,array("hari"=>4,"hari_waktu_awal"=>$jumatawal[$a],"hari_waktu_akhir"=>$jumatakhir[$a]));
    }}
    if($daftar_hari[$namahari]=='sabtu'){
    for ($a=0;$a<count($sabtuawal);$a++){
        array_push($data_send,array("hari"=>5,"hari_waktu_awal"=>$sabtuawal[$a],"hari_waktu_akhir"=>$sabtuakhir[$a]));
    }}

    echo json_encode($data_send);
?>