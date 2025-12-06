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

	<?php 
  	$thisPage = "index";
  	?>

	<div class="card text-center">
    <?php include 'header.php'; ?>
    <div class="card-body">
        <h5 class="card-title">Data Mahasiswa</h5>

	</div>
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
				include 'koneksi.php';
				$no=1;
				$query = "select * from mahasiswa order by  id_mahasiswa desc";
				$data = $conn->query($query);
				foreach ($data as $item) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $item['nama']; ?></td>
					<td><?= $item['nim']; ?></td>
					<td><?= $item['email']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>			
	</div>
	<?php include 'footer.php'; ?>
	</div>

</body>
</html>