<?php
$namaTabung = $_GET['n'];
$diameter = $_GET['d'];
$tinggi = $_GET['t'];
$luasTabung = (2*(0.25*(22/7)*$diameter*$diameter))+(2*(22/7)*($diameter/2)*$tinggi);

echo "Luas Tabung $namaTabung diameter $diameter dan $tinggi and tinggi $tinggi adalah $luasTabung satuan luas";
?>