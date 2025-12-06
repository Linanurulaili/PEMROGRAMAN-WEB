<?php
require_once("config.php");

$id = $_GET['id'];

if (isset($_POST['update'])){
    $varnama    = $_POST['nama'];
    $varnip = $_POST['nip'];
    $varemail   = $_POST['email'];
   

    $result = mysqli_query($koneksi, "UPDATE dosen SET nama='$varnama', nip='$varnip', email='$varemail' WHERE id_dosen='$id'");
    
    if ($result){
        header("Location: indexdsn.php");
    }
}

    $result = mysqli_query($koneksi, "SELECT * FROM dosen WHERE id_dosen='$id'");
    while($item = mysqli_fetch_array($result)){
        $varnama    = $item['nama'];
        $varnip     = $item['nip'];
        $varemail   = $item['email'];
    }
?>

<!doctype html>
<html>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Edit Mahasiswa</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #91b806;">
		<div class="container">
			<a class="navbar-brand" href="#">CRUD</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
                    <li class="nav-item">
						<a class="nav-link active" href="index.php">Mahasiswa</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="indexdsn.php">Dosen</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link active" href="indexkls.php">Kelas</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link active" href="indexjdwl.php">Jadwal</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

    <div class="container" style="margin-top:20px">
        <a href="indexdsn.php" class="btn btn-info">Kembali</a>
        
        <form action="edit_dsn.php?id=<?= $id ?>" method="post">
            <table width="50%">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="<?= $varnama ?>"></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td><input type="nip" name="nip" value="<?= $varnip ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="<?= $varemail?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="update" value="Update data"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>