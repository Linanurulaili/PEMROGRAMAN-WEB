 <?php

/* function menghitung luas segitiga */

function luasSegitiga($alas,$tinggi)
{
	$luas = ($alas)/2 * $tinggi;
	
	return $luas;
}
echo luasSegitiga(4,8);
echo("<br>");



/* function menghitung volume balok */

function volumeBalok($panjang, $lebar, $tinggi)
{
	$volume = ($panjang * $lebar * $tinggi);
	
	return $volume;
}
echo volumeBalok(4, 8, 6);
echo("<br>");


 
/*menghitungselisihharidenganhariini */

function selisihHari($hari){
	$hariIni = date("Y/m/d", strtotime("-$hari days"));
	return $hariIni;
}
echo selisihHari(100);
echo("<br>");



/* menghitung jarak hari dengan hari ini */

	function selisihJarak($hari){
		$hariIni = time();
		$tanggal = strtotime($hari);
		$selisih = $hariIni - $tanggal;
		echo($selisih / (60 * 60 * 24));
	}
	selisihJarak("2022/09/14");
?>