<?php

$kolom=5;
$baris=4;
echo "<table border=1>";
for ($j=1; $j<=$baris; $j++) {
   echo "<tr>";
   for ($i=1; $i<=$kolom; $i++) {      
      if(($i + $j) %2 != 0){
        echo "<td style='color:red; border-color:red;'>";
        echo "Elemen $i-$j";
        echo "</td>";
      }
      else {
        echo "<td style='color:black; background-color:red;'>"; 
        echo "Elemen $i-$j";
        echo "</td>";
      }       
   }
  echo "</tr>";
}
echo "</table>";
?>