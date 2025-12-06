<?php
	function buatBintangReverse($n){
    	for ( $i = 1; $i <= $n; $i++) {
        	for ($j = $n; $j >= $i; $j-=1) {
            	echo("*");
        	}
       	echo("<br>");
    	}
	}
	echo (buatBintangReverse(4));
	echo (buatBintangReverse(5));
?>