<?php
$bil1 = $_POST['bil1'];
$bil2 = $_POST['bil2'];
$operasi = $_POST['operasi'];
switch($operasi){
    case 'tambah':
        $hasil = $bil1 + $bil2;
        echo $bil1. "+". $bil2. "=". $hasil;
    break;
    case 'kurang':
        $hasil = $bil1 - $bil2;
        echo $bil1. "-". $bil2. "=". $hasil;
    break;
    case 'kali':
        $hasil = $bil1 * $bil2;
        echo $bil1. "*". $bil2. "=". $hasil;
    break;
    case 'bagi':
        $hasil = $bil1 / $bil2;
        echo $bil. "/". $bil2. "=". $hasil;
    break;
    case 'pangkat':
        $hasil = pow($bil1, $bil2);
        echo $bil1. "^". $bil2. "=". $hasil;
    break;
}
?>