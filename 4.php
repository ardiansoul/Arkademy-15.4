<?php 	
function randomize($n)
{
	$array = [];
	$a=0;
	for ($i=1; $i <= 30; $i++) { 
		$counter = 0;
		for ($k=1; $k <= $i; $k++) { 
			if ($i % $k == 0) {
				$counter++;
			}
		}
		if ($counter == 2) {
				$array[$a] = $i;
				$a++;		
		}
	}
	
	$n = array_sum($array);
	print_r($array);
	echo $n;
}
randomize(5);
 ?>