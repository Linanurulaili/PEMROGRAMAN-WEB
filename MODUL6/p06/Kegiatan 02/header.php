<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Halaman Mahasiswa</title>
  </head>
  <body>
    
  <?php
$namaHalaman = $_SERVER['PHP_SELF'];
$namaArray = explode('/',$namaHalaman);
$jumlah = count($namaArray);
$namaHalaman = $namaArray[$jumlah-1];
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Pertemuan06</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item" ><?php  if($thisPage == "index") echo "active"; ?>
            <a class="nav-link" href="index.php"><span class="sr-only">Mahasiswa</span></a>
          </li>
          <li class="nav-item"> <?php  if($thisPage == "akun") echo "active"; ?>
            <a class="nav-link" href="akun.php"><span class="sr-only">Akun</span></a>
          </li>
          <li class="nav-item"> <?php  if($thisPage == "user") echo "active"; ?>
            <a class="nav-link" href="user.php">User</a>
          </li>
        </ul>
      </div>
    </nav>


                

    


  </body>
</html>