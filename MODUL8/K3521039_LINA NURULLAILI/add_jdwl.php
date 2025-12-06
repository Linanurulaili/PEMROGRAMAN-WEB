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

        <form action="add_jdwl.php" method="post">
            <table width="50%">
                <tr>
                    <td>Nama Matkul</td>
                    <td>
                    <select id="matkul" name="matkul">
                        <?php
                            include "config.php";
                            
                            $matkul = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY id_kelas DESC") or die(mysqli_error($koneksi));
                            foreach ($matkul as $data)
                                echo '
                                <option value="'.$data['id_kelas'].'">'.$data['nama'].'</option>';
                        ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td>
                    <select id="mahasiswa" name="mahasiswa">
                        <?php
                            include "config.php";
                            
                            $mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC") or die(mysqli_error($koneksi));
                            foreach ($mahasiswa as $data)
                                echo '
                                <option value="'.$data['id_mahasiswa'].'">'.$data['nama'].$data['dosen'].'</option>';
                        ?>
                    </select>
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Add data" class="btn btn-success"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $matkul     = $_POST['matkul'];
                $mahasiswa  = $_POST['mahasiswa'];

                include_once("config.php");
                $result = mysqli_query($koneksi, "SELECT * FROM klsmhs WHERE id_kelas=$matkul AND id_mahasiswa=$mahasiswa");

                $sql = mysqli_query($koneksi, "INSERT INTO klsmhs(id_kelas,id_mahasiswa) VALUES('$matkul', '$mahasiswa')") or die(mysqli_error($koneksi));
                
                if($result){
                    echo '<br>Data berhasil ditambahkan! <a href="indexjdwl.php" class="btn btn-primary btn-sm">View Data</a>';
                }
            }
        ?>
    </div>
</body>
</html>