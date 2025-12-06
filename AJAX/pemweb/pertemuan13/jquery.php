<?php
    $activePage = "jquery";
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
                                <div class="spinner-border text-primary" role="status" id="load" style="position : absolute; top      : 50%; display  :none;">
                                </div>
                            </div>

                            <form method="post">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Provinsi :</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="provinsi" id="provinsi">
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
                                        <select class="form-control" name="kota" id="kota">
                                            <option>-- Pilih Kota/Kabupaten --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Kecamatan :</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="kecamatan" id="kecamatan">
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
                                        <button type="submit" id="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#submit').click(function () {
                var provinsi = $("#provinsi option:selected").text();
                var kota = $("#kota option:selected").text();
                var kecamatan = $("#kecamatan option:selected").text();
                var kelurahan = $("#kelurahan option:selected").text();
                alert(provinsi + ' - ' + kota + ' - ' + kecamatan + ' - ' + kelurahan);
            })

            $('#provinsi').click(function () {
                $('#load').show();
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "data.php?jenis=kota",
                    data: "id_provinsi=" + id,
                    success: function (msg) {
                        $('select#kota').html(msg);
                        $('#load').hide();
                        getKota();
                    }
                });
            });

            $("#kota").change(getKota);

            function getKota() {
                $("#load").show();
                var id = $("#kota").val();
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "data.php?jenis=kecamatan",
                    data: "id_kota=" + id,
                    success: function (msg) {
                        $("select#kecamatan").html(msg);
                        $("#load").hide();
                        getKecamatan();
                    }
                });
            }

            $("#kecamatan").click(getKecamatan);

            function getKecamatan() {
                $("#load").show();
                var id = $("#kecamatan").val();
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "data.php?jenis=kelurahan",
                    data: "id_kecamatan=" + id,
                    success: function (msg) {
                        $("select#kelurahan").html(msg);
                        $("#load").hide();
                    }
                });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


