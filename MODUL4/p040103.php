<?php
	function buatBintangAdv($n,$m){
		if ($m == true){
			for ( $i = $n; $i > 0; $i--) {
        		for ($j = $n; $j >= $i; $j--) {
            		echo("*");
        		}
       		echo("<br>");
    		}
		}
		else {
			for ( $i = 1; $i <= $n; $i++) {
        		for ($j = $n; $j >= $i; $j-=1) {
            		echo("*");
        		}
       		echo("<br>");
    		}
		}
	}
	echo (buatBintangAdv(4,true));
	echo("<br>");
	echo (buatBintangAdv(5, false));
?>