<?php
    //inisialisasi session
    session_start();
    
    $nama_usaha = $_SESSION["username"];
    
    //mengecek username pada session
    if( !isset($_SESSION['username']) ){
    header('Location: login.php');
    exit;
    }
    
    require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
    <center><h1>Halaman Dashboard</h1>
        <form method="POST" name="frmpost" action="" enctype="multipart/form-data">
        <table align="center" border="3" cellpadding="3" cellspacing="2"> 
        <tr align="center"><td><h2><b>Halo, <?php echo $nama_usaha; ?></b></h2></h2></td></tr>
        <tr> 
        <td>
        <table width="450" border="0" cellpadding="0" cellspacing="10" align="center">
            <?php
                global $koneksi;
                $no=1;
                $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$nama_usaha'");
              
                    while ($item = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td>Nama Usaha</td>
                            <td> : </td>
                            <td><?= $item['namaUsaha']; ?></td>
                        </tr>

                        <tr>
                            <td>Alamat</td>
                            <td> : </td>
                            <td><?= $item['alamat']; ?></td>
                        </tr>

                        <tr>
                            <td>Golongan</td>
                            <td> : </td>
                            <td><?= $item['golongan']; ?></td>
                        </tr>

                        <tr>
                            <td>Modal Usaha</td>
                            <td> : </td>
                            <td><?= $item['modal']; ?></td>
                        </tr>

                        <tr>
                            <td>Nama Pemilik</td>
                            <td> : </td>
                            <td><?= $item['namaPemilik']; ?></td>
                        </tr>

                        <tr>
                            <td>Tempat Lahir</td>
                            <td> : </td>
                            <td><?= $item['tempatLahir']; ?></td>
                        </tr>

                        <tr>
                            <td>tanggal Lahir</td>
                            <td> : </td>
                            <td><?= $item['tanggalLahir']; ?></td>
                        </tr>

                        <tr>
                            <td>Nomor Telepon</td>
                            <td> : </td>
                            <td><?= $item['nomorTelepon']; ?></td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td> : </td>
                            <td><?= $item['email']; ?></td>
                        </tr>

                        <tr>
                            <td>Scan KTP</td>
                            <td> : </td>
                            <td align=center><?="<img src='image/".$item['scanKTP']."'style='width:70px; height:90px;'>"?></td>
                        </tr>

                        <tr>
                            <td>Scan NPWP</td>
                            <td> : </td>
                            <td align=center><?="<img src='image/".$item['scanNPWP']."'style='width:70px; height:90px;'>"?></td>
                        </tr>

            <?php } ?>
        </table>
        </td>
        </tr>
        </table>
        </form>
        <br>
        <a href="logout.php"><button class="btn btn-lg btn-primary btn-block">Logout</button></a>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>