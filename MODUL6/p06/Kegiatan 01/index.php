<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Pertemuan06</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="index.php">Mahasiswa</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="akun.php">Akun</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="row">
		<div class="col-lg-6 offset-lg-3 mt-3">
			<div class="card">
				<table class="table table-striped table-bordered">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>NIM</th>
						<th>email</th>
					</tr>

					<?php
					include ("koneksi.php");
					$no = 1;
					$query = mysqli_query($koneksi, "select * from mahasiswa order by id_mahasiswa desc");
					while ($item = mysqli_fetch_array($query)){?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $item['nama']; ?></td>
						<td><?= $item['nim']; ?></td>
						<td><?= $item['email']; ?></td>
					</tr>
					<?php }; ?>

				</table>
			</div>
		</div>
	</div>

</body>
</html>