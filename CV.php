<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CV dengan PHP</title>
</head>
<body>
	<?php
		$nama= "Lina Nurullaili";
		$ttl= "Ngawi, 02 Agustus 2003";
		$alamat= "Kedunggudel, Widodaren, Ngawi";
		$notelpon= "085755184900";
		$email= "linanurullaili@student.uns.ac.id";
		$hobby= "Suka Rebahan"
	?>
	<h1>CURICULUM VITAE</h1>
	<table border="4" cellpadding="2" cellspacing="2.5" width="400">
	    <tr>
	    	<td>Nama</td>
	    	<td><?= $nama ?></td> 
	    </tr>
	    <tr>
	    	<td>Tempat Tanggal Lahir</td>
	    	<td><?= $ttl ?></td>
	    </tr>
	    <tr>
	    	<td>Alamat</td>
	    	<td><?= $alamat ?></td>
	    </tr>
	    <tr>
	    	<td>Nomor Telepon</td>
	    	<td><?= $notelpon ?></td>
	    </tr>
	    <tr>
	    	<td>Email</td>
	    	<td><?= $email ?></td>
	    </tr>
	    <tr>
	    	<td>Hobby</td>
	    	<td><?= $hobby ?></td>
	    </tr>
	</table>
</body>
</html>