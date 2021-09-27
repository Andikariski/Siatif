<?php 
include 'koneksi.php';
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

$tanggal=$_POST['tanggal'];
$namahari = date('l', strtotime($tanggal));

$dosen1 = $_POST['dosen1'];
$dosen2 = $_POST['dosen2'];
$dosen3 = $_POST['dosen3'];



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
                $ambil3 = mysqli_query($konek_db,"SELECT * FROM jadwal_dosen1 WHERE dosen ='$dosen3'");
                
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
                $ambil6 = mysqli_query($konek_db,"SELECT * FROM jadwal_pendadaran WHERE dosen ='$dosen3' AND tanggal ='$tanggal'");
                
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
for( $i = 1; $i <= 6; $i++ ) :
    for( $j = 1; $j <= 15; $j++ ) :
         echo $matriksD[$i][$j]=$matriksA[$i][$j]+$matriksB[$i][$j]+$matriksC[$i][$j]+$matriksX[$i][$j]+$matriksY[$i][$j]+$matriksZ[$i][$j]."&nbsp;&nbsp;&nbsp";
    endfor;
    echo "<br>";
    ;
endfor;



?>