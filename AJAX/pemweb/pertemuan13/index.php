<?php
    $activePage = "index";
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 13</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage == 'index') ? 'text-dark fw-semibold':'text-secondary fw-light'; ?>" aria-current="page" href="index.php">Javascript AJAX</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage == 'jquery') ? 'text-dark fw-semibold':'text-secondary fw-light'; ?>" href="jquery.php">Jquery AJAX</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    </header>

    <main>
        <div class="container-fluid mt-3">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h5 class="card-title">DEPENDET DROPDOWN WILAYAH INDONESIA</h5>
                            </center>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border text-primary" role="status" id="load" style="position: absolute; top: 50%; display: none;"></div>
                            </div>
                            <form method="post">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Provinsi :</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="provinsi" id="provinsi" onchange="getProvinsi()">
                                            <option>-- Pilih Provinsi --</option>
                                            <?php
                                                $query = mysqli_query($koneksi,"SELECT * FROM provinces ORDER BY name ASC");
                                                foreach ($query as $provinsi)
                                                    echo '<option value="'.$provinsi['id'].'">'.$provinsi['name'].'</option>';
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Kota/Kabupaten :</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="kota" id="kota" onchange="getKota()">
                                            <option>-- Pilih Kota/Kabupaten --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Kecamatan :</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="kecamatan" id="kecamatan" onchange="getKecamatan()">
                                            <option>-- Pilih Kecamatan --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Kelurahan :</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="kelurahan" id="kelurahan">
                                            <option>-- Pilih Kelurahan --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-12 mt-3">
                                        <button type="submit" class="btn btn-success" onclick="getAlert()">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script>
        // Fungsi untuk menampilkan data provinsi
        const getProvinsi = () => {
            const xhttp = new XMLHttpRequest();
            var spinner = document.getElementById("load");
            spinner.style.display = "inline";
            xhttp.onload = function () {
                document.getElementById("kota").innerHTML = this.responseText;
                spinner.style.display = "none";
                getKota();
            }
            var id = document.getElementById("provinsi").value
            xhttp.open("POST", "data.php?jenis=kota");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id_provinsi=" + id);
        }

        // Fungsi untuk menampilkan data kota
        const getKota = () => {
            const xhttp = new XMLHttpRequest();
            var spinner = document.getElementById("load");
            spinner.style.display = "inline";
            xhttp.onload = function () {
                document.getElementById("kecamatan").innerHTML = this.responseText;
                spinner.style.display = "none";
                getKecamatan();
            }
            var id = document.getElementById("kota").value
            xhttp.open("POST", "data.php?jenis=kecamatan");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id_kota=" + id);
        }   

        // Fungsi untuk menampilkan data kecamatan
        const getKecamatan = () => {
            const xhttp = new XMLHttpRequest();
            var spinner = document.getElementById("load");
            spinner.style.display = "inline";
            xhttp.onload = function () {
                document.getElementById("kelurahan").innerHTML = this.responseText;
                spinner.style.display = "none";
            }
            var id = document.getElementById("kecamatan").value
            xhttp.open("POST", "data.php?jenis=kelurahan");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id_kecamatan=" + id);
        }

        // Fungsi untuk menampilkan alert
        const getAlert = () => {
            var provinsi = document.getElementById("provinsi");
            var kota = document.getElementById("kota");
            var kecamatan = document.getElementById("kecamatan");
            var kelurahan = document.getElementById("kelurahan");
            var provinsi = provinsi.options[provinsi.selectedIndex].text;
            var kota = kota.options[kota.selectedIndex].text;
            var kecamatan = kecamatan.options[kecamatan.selectedIndex].text;
            var kelurahan = kelurahan.options[kelurahan.selectedIndex].text;
            alert(provinsi + ' - ' + kota + ' - ' + kecamatan + ' - ' + kelurahan);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
