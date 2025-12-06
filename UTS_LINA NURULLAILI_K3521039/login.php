<?php
    session_start();
    require('koneksi.php');
    
    $error = '';
    $validate = '';
    
    if( isset($_SESSION['username']) ) header('Location: index.php');
    
    if( isset($_POST['login']) ){
            
            $username = stripslashes($_POST['username']);
            $username = mysqli_real_escape_string($koneksi, $username);
            $password = stripslashes($_POST['password']);
            $password = mysqli_real_escape_string($koneksi, $password);
            
            if(!empty(trim($username)) && !empty(trim($password))){
    
                $query      = "SELECT * FROM user WHERE username = '$username'";
                $result     = mysqli_query($koneksi, $query);
                $rows       = mysqli_num_rows($result);
    
                if ($rows != 0) {
                    $hash   = mysqli_fetch_assoc($result)['password'];
                    if(password_verify($password, $hash)){
                        $_SESSION['username'] = $username;
                    
                        header('Location: index.php');
                    }
                                
                } else {
                    $error =  'Register User Gagal !!';
                }
                
            }else {
                $error =  'Data tidak boleh kosong !!';
            }
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style type="text/css">
        body {
  height: 100%;
}
body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="username"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
</head>
<body>
    <form class="form-signin" method="POST" action="">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="username" class="sr-only"></label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only"></label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <div class="form-group">
            <label for="captcha">Kode : <img src="captcha.php"></label><br>
            <input type="text" name="kcapt" maxlength="6"><br>                
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
        <div class="form-footer mt-2">
            <p> Belum punya account? <a href="register.php">Registrasi</a></p>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>