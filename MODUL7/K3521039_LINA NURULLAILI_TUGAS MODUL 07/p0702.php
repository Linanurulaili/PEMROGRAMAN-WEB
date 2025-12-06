<?php
     $font_size = '15px';
     $background_color = '#4e79a0';
     
     if ($_POST) {
          $background_color = $_POST['background_color'];
          $font_size = $_POST['font_size'];
     } else {
          if (isset($_COOKIE['background-color'])) {
                $_POST['background_color'] = $background_color = $_COOKIE['background-color'];
          }
          if (isset($_COOKIE['font-size'])) {
                $_POST['font_size'] = $font_size = $_COOKIE['font-size'];
          }
     }
     

     $msg = false;
     if (isset($_POST['hapus_cookie']))
     {
          setcookie('background-color', '', time() - 1, '/');
          setcookie('font-size', '', time() -1, '/');
          $msg = 'Data cookie berhasil dihapus';
     }

    
     if (isset($_POST['remember']))
     {
          setcookie('background-color', $_POST['background_color'], strtotime('+1 days'), '/');
          setcookie('font-size', $_POST['font_size'], strtotime('+1 days'), '/');
          $msg = 'Data cookie berhasil disimpan';
     }
?>



<!doctype html> 
<html lang="en"> 
<head> 
     <title>Bermain dengan Tema</title> 
     <meta charset="utf-8"> 
     <meta name="viewport" content="width=device-width, initialscale=1">
     <style type="text/css">
          <?php include('style.css');?>
     </style>
</head> 
<body> 
     <div class="container"> 
     <form method="post" action=""> 
          <h3>SETTING</h3>
          <?php 
               if ($msg) {
                    echo '<div class="success">'.$msg.'</div>';
               }
          ?> 
          <div>Background</div> 
          <select name="background_color"> 
               <?php  
               $colors = array('#4e79a0' => 'Biru', '#75b14a' => 'Hijau', '#d06353;' => 'Merah'); 
               foreach ($colors as $name => $value) { 
                    $selected = $name == $_POST['background_color'] ? 'SELECTED="SELECTED"' : ''; 
                    echo '<option value="'.$name.'"'.$selected.'>'.$value.'</option>'; 
               } 
               ?> 
          </select> 
          <div>Font Size</div> 
          <select name="font_size"> 
               <?php  
               $font_sizes = array('15px', '17px', '20px', '25px'); 
               foreach ($font_sizes as $value) { 
                    $selected = $value == $_POST['font_size'] ? 'SELECTED="SELECTED"' : ''; 
                    echo '<option value="'.$value.'"'.$selected.'>'.$value.'</option>'; 
               } 
               ?> 
          </select> 
          <div class="remember"> 
               <input type="checkbox" id="remember" name="remember"/> 
               <label for="remember"> Remember</label> 
          </div> 
          <div class="tombol"> 
               <input type="submit" class="button blue" name="submit" value="Simpan"/> 
               <input type="submit" class="button red" name="hapus_cookie" value="Hapus Cookie"/> 
          </div> 
     </form> 
     </div> 
</body> 
</html>