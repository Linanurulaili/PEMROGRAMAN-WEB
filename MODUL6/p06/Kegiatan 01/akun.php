<!DOCTYPE html>
<html lang="en">
<head>
	<title>Halaman mahasiswa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS only -->
		<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
	<!-- JavaScript Bundle with Popper -->
		<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>



	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light bg-light ">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Pertemuan06</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"data-bs-target="#navbarSupportContent" aria-controls="navbarSupportContent" arial-expanded="false" aeial-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="index.php">Mahasiswa</a>

						<li class="nav-item">
						<a class="nav-link" aria-current="page" href="akun.php">Akun</a></li>
						
					</li>
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
					<th>Username</th>
					<th>Password</th>
					<th>Waktu Pembuatan</th>
				</tr>
				<?php
				include 'koneksi.php';
				$no=1;
				$query = mysqli_query($koneksi,"select * from user order by  id_mahasiswa desc");
				while ($item = mysqli_fetch_array($query)) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $item['username']; ?></td>
					<td><?= $item['password']; ?></td>
					<td><?= $item['created_at']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>			
	</div>
	</div>

</body>
</html>