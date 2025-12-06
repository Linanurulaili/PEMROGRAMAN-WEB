<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "utspemweb";
    $koneksi = mysqli_connect($host, $username, $password, $database);

    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    function registrasi($data){
        global $koneksi;

        //upload foto ke dalam folder image
        $target_dir = "image/";
        $folder_npwp = $target_dir . basename($_FILES["scanNPWP"]["name"]);
        $folder_ktp = $target_dir . basename($_FILES["scanKTP"]["name"]);
    
        $nama_npwp = $_FILES["scanNPWP"]["name"];
        $nama_ktp = $_FILES["scanKTP"]["name"];
    
        $tempnama_npwp = $_FILES["scanNPWP"]["tmp_name"];
        $tempnama_ktp = $_FILES["scanKTP"]["tmp_name"];
     
        move_uploaded_file($tempnama_npwp, $folder_npwp);
        move_uploaded_file($tempnama_ktp, $folder_ktp);


        $username = strtolower($data["username"]);
        $password = mysqli_escape_string($koneksi, $data["password"]);
        $ulangi = mysqli_escape_string($koneksi, $data["ulangPassword"]);
        $nama_usaha = $data["namaUsaha"];
        $alamat_usaha = $data["alamat"];
        $gol_usaha = $data["golongan"];
        $modal_usaha = $data["modal"];
        $nama_pemilik = $data["namaPemilik"];
        $tempat_lahir = $data["tempatLahir"];
        $tanggal_lahir = $data["tanggalLahir"];
        $telepon = $data["nomorTelepon"];
        $email = $data["email"];
        //$foto_ktp = $data["scanKTP"];
        //$foto_npwp = $data["scanNPWP"];

        $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

        if(mysqli_fetch_assoc($result)){
            echo "<script>alert('username sudah terdaftar')</script>";
            return false;
        }
    
        if ( !preg_match('~[0-9]+~', $password) ) {
            echo "<script>alert('password harus mengandung angka, minimal satu angka')</script>";
            return false;
        }
    
        if( !preg_match('/[A-Z]/', $password) ){
            echo "<script>alert('password harus mengandung huruf kapital, minimal satu huruf kapital')</script>";
            return false;
        }
    
        if( strlen($password) < 8 ){
            echo "<script>alert('password kurang dari 8 karakter')</script>";
            return false;
        }

        if ($password != $ulangi) {
            echo "
                <script>
                    alert('konfirmasi password tidak sama')
                </script>
            ";
            return false;

        } else {
            $password = password_hash($password, PASSWORD_DEFAULT); //tambah parameter PASSWORD_DEFAULT
            $ulangi = password_hash($ulangi, PASSWORD_DEFAULT); //tambah parameter PASSWORD_DEFAULT            
            $result = mysqli_query($koneksi, "INSERT INTO user Values ('', '$username', '$password','$ulangi','$nama_usaha', '$alamat_usaha',
            '$gol_usaha', '$modal_usaha', '$nama_pemilik', '$tempat_lahir', '$tanggal_lahir', '$telepon', '$email', '$nama_ktp','$nama_npwp')");

            return mysqli_affected_rows($koneksi);
        }
    }
?>