<?php
session_start();
if (isset($_POST['beli'])) {
    $_SESSION['name'] = $_POST['nama'];
    $_SESSION['pilih'] = $_POST['ruang'];
    $kata = "Status Pengunjung : Sudah membeli tiket atas nama " . $_POST['nama'] . " di " . $_POST['ruang'];
    $_SESSION['login'] = $_POST['beli'];
}
if (!isset($_POST['beli'])) {
    $kata = "Status Pengunjung : Belum membeli tiket ";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Bioskop PTIK</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Bioskop PTIK</a>
                <button class="navbar-toggler" type="button" data-bs toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="p0701a.php">Home</a>
                        <a class="nav-link" href="p0701b.php">Ruang 1</a>
                        <a class="nav-link" href="p0701c.php">Ruang 2</a>
                        <a class="nav-link" href="p0701d.php">Ruang 3</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="row mt-3">
                <div class="card p-3">
                    <center>
                        <h1>Halaman Lobby</h1>
                        <p><?php echo $kata ?></p>
                    </center>
                </div>
            </div>
        </div>
        <br>
        <center>
            <form method="POST" action="">
                <label>Nama :</label>
                <input type="text" name="nama" placeholder="nama">
                <br><br>
                <label>Ruang :</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ruang1" name="ruang" value="Ruang1">
                    <label class="form-check-label" for="ruang1">Ruang 1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ruang2" name="ruang" value="Ruang2">
                    <label class="form-check-label" for="ruang2">Ruang 2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ruang3" name="ruang" value="Ruang3">
                    <label class="form-check-label" for="ruang3">Ruang 3</label>
                </div>
                <br>
                <div class="btn-group" role="group" aria-label="Basic mixed style example">
                    <button type="submit" class="btn btn-success" name="beli">Beli Tiket</button>
                </div>
            </form>
        </center>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>