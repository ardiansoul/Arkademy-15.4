<?php 
function sequence($n)
{
	if (gettype($n) == "integer") {
	$array = [];
	$i = 0;
	while ($n > 1) {
	if ($n % 2 == 0) {
		$n = $n / 2;
		$n;
	} else {
		$n = ($n*3)+1;
		// ($n*=3)-1;
		$n;
	}
	$array[$i] = $n;
	$i++;
	}
	}
	return $array;
}
print_r(sequence(13));


 ?>