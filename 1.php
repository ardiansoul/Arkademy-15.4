<?php 
function json()
{
	$bio = array('name' => "ardiyana saputra",
				 'age' => 18,
				 'address' => "Jl.Pabuaran-jeungjing RT.01 RW.01, Ds.Jeungjing, Kec.Cisoka, Kab.Tangerang - Banten",
				 'hobbie' => ['ngoding', 'mendesain','research'],
				 'is_married' =>false,
				 'list_school' => [
				 	'SMA' => [
				 				'name' => 'SMKN 4 Kab.Tangerang',
				 				'year_in' => '2015',
				 				'year_out' => '2018',
				 				'Major' => NULL
				 				]],
				 'Skills' => [
				 	'Design' => ['Advanced'],
				 	'Web programming' => ['Advanced'],
					 ],

				 'interest_in_coding' => TRUE
				);
	 $fp = fopen('result.json', 'w');
	 fwrite($fp, json_encode($bio));
	 fclose($fp);
	 $fp1 = fopen('result.json', 'r');
	 $bio = fgets($fp1);
	 return $bio;
	 


}
echo json();

 ?>