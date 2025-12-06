<?php

    include("koneksi.php");

    if(isset($_GET['id']))
    {
        $query="DELETE FROM tma WHERE id_tma = ".$_GET['id'];
        $exec = mysqli_query($koneksi, $query);
        if($exec) {
            header("Location: index.php");
        }
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    
    <title>Pertemuan 14 - Library</title>
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Client Side</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="serverside.php">Server Side</a>
                        </li>
                    </ul>
                </div>
            </div> 
        </nav>
    </header>   

    <main>
        <div class="container mt-3">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <center>
                            <h3 class="card-title">Tabel Tinggi Permukaan Air - Client Side</h3><hr>
                            </center>
                            <table id="tabel-data">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nilai</th>
                                        <th>Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include_once('koneksi.php');
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tma");
                                    foreach ($sql as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $row["id_tma"]; ?></td>
                                            <td><?= $row["nilai"]; ?></td>
                                            <td><?= $row["waktu"]; ?></td>
                                            <td>
                                                <button class="btn btn-primary" role="button" id="btn-info">Info</button>
                                                <a href="?id=<?= $row["id_tma"] ?>"><button class="btn btn-danger" role="button" id="btn-delete"  onclick="return confirm('Apakah Anda yakin ingin menghapus data dengan ID = ' + <?= $row['id_tma'] ?> + ' ?')">Hapus</button></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </main>

    <script type="text/javascript">
        $(document).ready(function() {

            //DataTable
            $('#tabel-data').DataTable( {
                "order": ([2, "desc"]),
                "bInfo": false,
                "bLengthChange": true,
                "searching": true,
            });

            //Info
            $('#tabel-data').on('click', '#btn-info', function() {
                var currentRow = $(this).closest("tr");
                var nilai = currentRow.find("td:eq(1)").text();

                if(nilai < 8.25) {
                    alert("Sungai Aman");

                } else {
                    alert("Sungai Impas");

                }
            });

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

  </body>
</html>