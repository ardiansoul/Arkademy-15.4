<?php 
function triangle($n)
 {for ($k=$n; $k > 0; $k--) { 
 	for ($i = 1; $i <= $k; $i++) { 
 		echo "&nbsp";
 		echo "&nbsp";
 	}for ($j=$n; $j >= $k; $j--) { 
 		echo "*";
 	} 
 	echo "<br>";
 }
 }
 triangle(5); ?>