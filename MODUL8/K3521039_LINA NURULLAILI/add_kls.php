<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Add Mahasiswa</title>
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
        <a href="indexkls.php" class="btn btn-info">Kembali</a>

        <form action="add_kls.php" method="post">
            <table width="50%">
                <tr>
                    <td>Nama Matkul</td>
                    <td><input type="text" name="matkul"></td>
                </tr>
                <tr>
                    <td>Dosen Pengampu</td>
                    <td>
                    <select id="dosen" name="dosen">
                        <?php
                            include "config.php";
                            
                            $query    =mysqli_query($koneksi, "SELECT * FROM dosen ORDER BY id_dosen");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?=$data['nama'];?>"><?php echo $data['nama'];?></option>
                            
                            <?php
                            }
                        ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>SKS</td>
                    <td><input type="sks" name="sks"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="textarea" name="deskripsi"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Add data" class="btn btn-success"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $varmatkul      = $_POST['matkul'];
                $vardosen       = $_POST['dosen'];
                $varsks         = $_POST['sks'];
                $vardeskripsi   = $_POST['deskripsi'];

                include_once("config.php");
                $result = mysqli_query($koneksi, "INSERT INTO kelas(nama,dosen,sks,deskripsi) VALUES ('$varmatkul','$vardosen','$varsks','$vardeskripsi')");

                if($result){
                    echo '<br>Kelas berhasil ditambahkan! <a href="indexkls.php" class="btn btn-primary btn-sm">View Kelas</a>';
                }
            }
        ?>
    </div>
</body>
</html>