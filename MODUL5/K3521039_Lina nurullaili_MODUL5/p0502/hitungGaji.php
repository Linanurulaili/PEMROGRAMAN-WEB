<?php

    $nama = $_POST['namaPegawai'];
    $jabatan = $_POST['jabatan'];
    $kinerja = $_POST['kinerja'];


    switch($jabatan) {

        case "junProg" :
            $gaji = 4000000;
        break;

        case "senProg" :
            $gaji = 6000000;
        break;

        case "ct" :
            $gaji = 8000000;
        break;

        case "manager" :
            $gaji = 10000000;
        break;
    }


    if($kinerja <= 50) {
        $persentase = 50;

    }elseif($kinerja > 50 && $kinerja <= 60) {
        $persentase = 60;

    }elseif($kinerja > 60 && $kinerja <= 70) {
        $persentase = 70;

    }elseif($kinerja > 70 && $kinerja <= 80) {
        $persentase = 80;

    }elseif($kinerja > 80 && $kinerja <= 90) {
        $persentase = 90;

    }elseif($kinerja > 90 && $kinerja <= 100) {
        $persentase = 100;

    }

    $totalGaji = $gaji * $persentase / 100;

    echo "Nama Pegawai : $nama" . "<br>";
    echo "Jabatan : $jabatan" . "<br>";
    echo "Gaji Bulan Ini : $totalGaji" . "<br>";

    //header("Location:gaji.php?nama=$nama&jabatan=$jabatan&gaji=$totalGaji");
?>