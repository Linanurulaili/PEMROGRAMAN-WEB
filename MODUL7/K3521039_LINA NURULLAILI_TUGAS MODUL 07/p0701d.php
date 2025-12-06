<?php
session_start();
if ($_SESSION['pilih']=="Ruang3") {
    $jawaban = "Hai " . $_SESSION['name'] . ", Selamat Menonton";
    $youtube = "<iframe width='560' height='315' src='https://www.youtube.com/embed/dA88aGa1GsM' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
} else {
    $jawaban = "Anda Tidak Diizinkan Masuk Ruangan";
    $youtube = " ";
}
if (isset($_POST['keluar'])) {
    session_destroy();
    header("Location: p0701a.php");
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
                        <h1>Ruang Bioskop 3</h1>
                        <form action="" method="post">
                            <p><?php echo $jawaban; ?></p>
                            <br>
                            <?php echo $youtube; ?>
                            <br>
                            <button type="submit" class="btn btn-danger" name="keluar" id="keluar">Keluar</button>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
</html>