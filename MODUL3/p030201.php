<?php

$kolom=5;
$baris=4;
echo "<table border=1>";
for ($j=1; $j<=$baris; $j++) {
   echo "<tr>";
   for ($i=1; $i<=$kolom; $i++) {      
      echo "<td>";
      echo "Elemen $j - $i";
      echo "</td>";       
   }
  echo "</tr>";
}
echo "</table>";
?>