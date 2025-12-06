<?php
function hitungDenda($tglHarusKembali, $tglKembali) {
	$tgl1 = strtotime("$tglKembali");
	$tgl2 = strtotime("$tglHarusKembali");

	$selisih = $tgl1 - $tgl2;

	$hari = ($selisih /60/60/24) * 5000;
	return $hari;
}

echo ("Besarnya denda adalah: Rp ".hitungDenda("2021-01-03", "2021-01-05"));
?>

