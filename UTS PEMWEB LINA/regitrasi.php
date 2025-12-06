<?php
//menyertakan file program koneksi.php pada register
include('koneksi.php');
//inisialisasi session
session_start();
$error = '';
$validate = '';
//mengecek apakah form registrasi di submit atau tidak
if( isset($_POST['submit']) ){
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($con, $username);
        $name     = stripslashes($_POST['name']);
        $name     = mysqli_real_escape_string($con, $name);
        $email    = stripslashes($_POST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $repass   = stripslashes($_POST['repassword']);
        $repass   = mysqli_real_escape_string($con, $repass);
        $namaUsaha   = stripslashes($_POST['namaUsaha']);
        $namaUsaha   = mysqli_real_escape_string($con, $repass);
        $alamat   = stripslashes($_POST['alamat']);
        $alamat   = mysqli_real_escape_string($con, $repass);


        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass)) && !empty(trim($namaUsaha)) && !empty(trim($alamat))){
            //mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
            if($password == $repass){
                //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
                if( cek_nama($name,$con) == 0 ){
                    //hashing password sebelum disimpan didatabase
                    $pass  = password_hash($password, PASSWORD_DEFAULT);
                    //insert data ke database
                    $query = "INSERT INTO users (username,name,email, password,namaUsaha,alamat) VALUES ('$username','$nama','$email','$pass')";
                    $result   = mysqli_query($con, $query);
                    //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                    if ($result) {
                        $_SESSION['username'] = $username;
                        
                        header('Location: index.php');
                     
                    //jika gagal maka akan menampilkan pesan error
                    } else {
                        $error =  'Register User Gagal !!';
                    }
                }
                else{
                        $error =  'Username sudah terdaftar !!';
                }
            }else{
                $validate = 'Password tidak sama !!';
            }
             
        }
        else {
            $error =  'Data tidak boleh kosong !!';
        } 
    //fungsi untuk mengecek username apakah sudah terdaftar atau belum
    function cek_nama($username,$con){
        $nama = mysqli_real_escape_string($con, $username);
        $query = "SELECT * FROM users WHERE username = '$nama'";
        if( $result = mysqli_query($con, $query) ) {
            return mysqli_num_rows($result);
        }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Industri | Registrasi</title>
</head>
<body>
    <h1>Selamat Datang</h1>

    <form action="" method="POST">

        <label for="username">Username</label>
        <input type="text" name="username" id="username"><br>

        <label for="password">Password</label>
        <input type="number" name="password" id="password"><br>

        <label for="namaUsaha">Nama Usaha</label>
        <input type="text" name="namaUsaha" id="namaUsaha"><br>

        <label for="alamat">Alamat</label>
        <textarea type="alamat" id="alamat" cols="30" rows="10"></textarea><br>

        <label for="golongan">Golongan</label>
        <input type="radio" name="golongan" id="golongan" placeholder="mikro">Mikro
        <input type="radio" name="golongan" id="golongan" placeholder="kecil">Kecil
        <input type="radio" name="golongan" id="golongan" placeholder="menengah">Menengah<br>

        <label for="modal">Modal</label>
        <input type="checkbox" name="modal" id="modal"> Bank
        <input type="checkbox" name="modal" id="modal" value="teknologi"> Koperasi
        <input type="checkbox" name="modal" id="modal"> Bantuan Sosial<br>

        <label for="namaPemilik">Nama Pemilik</label>
        <input type="text" name="namaPemilik" id="namaPemilik"><br>

        <label for="tempatLahir">Tempat Lahir</label>
        <input type="text" name="tempatLahir" id="tempatLahir"><br>
        
        <label for="tanggalLahir">Tanggal Lahir</label>
        <input type="date" name="tanggalLahir" id="tanggalLahir"><br>

        <label for="nomorTelepon">Nomor Telepon</label>
        <input type="text" name="nomorTelepon" id="nomorTelepon"><br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>

        <label for="scanKTP">Scan KTP</label>
        <input type="file" name="scanKTP" id="scanKTP"><br>

        <label for="scanNPWP">Scan NPWP</label>
        <input type="file" name="scanNPWP" id="scanNPWP"><br>

        <button type="submit" name="submit" id="submit"> Registrasi </button>

    </form>
</body>
</html>