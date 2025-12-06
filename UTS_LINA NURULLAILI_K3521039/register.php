<?php

    require 'koneksi.php';

    if (isset($_POST["registrasi"])) {
        if (registrasi($_POST) > 0) {
            echo "
            <script>
                alert('Registrasi berhasil');
                document.location.href = 'index.php';
            </script>
            ";
         } else {
            echo mysqli_error($koneksi);
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Industri Rumah Tangga di Kementerian PANRB </title>

    <style type="text/css">
        body{
            background-color: darkgray;
        }
    </style>

</head>
<body >

    <form method="POST" name="frmpost" action="" enctype="multipart/form-data">
    <table align="center" border="2" cellpadding="2" cellspacing="2"> 
    <tr align="center"><td><h2> <b>Registrasi Industri Rumah Tangga di Kementerian PANRB</b></h2></td></tr>

    <tr> 
      <td>
      <table width="450" border="0" cellpadding="0" cellspacing="10" align="center">
        <tr>
          <td>Username</td>
          <td> : </td>
          <td><input name="username" type="username" size="40" /></td>
        </tr>

        <tr>
          <td>Password</td>
          <td> : </td>
          <td><input name="password" type="password" size="40" /></td>
        </tr>

        <tr>
          <td>Ulangi Password</td>
          <td> : </td>
          <td><input name="ulangPassword" type="password" size="40" /></td>
        </tr>

         <tr>
          <td>Nama Usaha</td>
          <td> : </td>
          <td><input name="namaUsaha" type="text" size="40" /></td>
        </tr>

        <tr>
          <td>Alamat</td>
          <td> : </td>
          <td><input name="alamat" type="alamat" size="40" /></td>
        </tr>

        <tr>
          <td>Golongan Usaha</td>
          <td> : </td>
          <td>
            <input type="radio" name="golongan" value="mikro"><label for="mikro">mikro</label>

            <input type="radio" name="golongan" value="kecil"><label for="kecil">kecil</label>

            <input type="radio" name="golongan" value="menengah"><label for="menengah">menengah</label>

          </td>
        </tr>

         <tr>
          <td>Modal</td>
          <td> : </td>
          <td>
            <input type="checkbox" name="modal" value="bank"><label for="bank">Bank</label>

            <input type="checkbox" name="modal" value="koperasi"><label for="koperasi">Koperasi</label>

            <input type="checkbox" name="modal" value="bantuansosial"><label for="bantuansosial">Bantuan Sosial</label>
          </td>
        </tr>
        
        <tr>
          <td>Nama Pemilik</td>
          <td> : </td>
          <td><input name="namaPemilik" type="text" size="40" /></td>
        </tr>

        <tr>
          <td>Tempat Lahir</td>
          <td> : </td>
          <td><input name="tempatLahir" type="text" size="40" /></td>
        </tr>

        <tr>
          <td>Tanggal Lahir</td>
          <td> : </td>
          <td><input name="tanggalLahir" type="date" size="40" /></td>
        </tr>

         <tr>
          <td>Nomor Telepon</td>
          <td> : </td>
          <td><input name="nomorTelepon" type="text" size="40" /></td>
        </tr>

         <tr>
          <td>Email</td>
          <td> : </td>
          <td><input name="email" type="email" size="40" /></td>
        </tr>

        
        <tr>
          <td>Scan KTP</td>
          <td> : </td>
          <td>
            <input name="scanKTP" type="file" size="40" /><br>
            <small>wajib png/jpg/jpeg</small><br>
          </td>
        </tr>

        <tr>
          <td>Scan NPWP</td>
          <td> : </td>
          <td>
            <input name="scanNPWP" type="file" size="40" /><br>
            <small>wajib png/jpg/jpeg</small><br>
          </td>
        </tr>


        <tr>
          <td colspan="4" align="center"><input type="submit" name="registrasi" value="Registrasi"/></td>
        </tr>
      </table>
      </td>
    </tr>
  </table>
</form>
</body>
</html>