<?php 


$MAX = 100; 

function luDecomposition($mat, $n) 
{ 
	$lower; 
	$upper; 
	for($i = 0; $i < $n; $i++) 
	for($j = 0; $j < $n; $j++) 
	{ 
		$lower[$i][$j]= 0; 
		$upper[$i][$j]= 0; 
	} 
	
	
	for ($i = 0; $i < $n; $i++) 
	{ 

		
		for ($k = $i; $k < $n; $k++) 
		{ 

			
			
			$sum = 0; 
			for ($j = 0; $j < $i; $j++) 
				$sum += ($lower[$i][$j] * 
						$upper[$j][$k]); 

			
			$upper[$i][$k] = $mat[$i][$k] - $sum; 
		} 

		
		for ($k = $i; $k < $n; $k++) 
		{ 
			if ($i == $k) 
				$lower[$i][$i] = 1; 
			else
			{ 

				
				$sum = 0; 
				for ($j = 0; $j < $i; $j++) 
					$sum += ($lower[$k][$j] * 
							$upper[$j][$i]); 

				
				$lower[$k][$i] = (int)(($mat[$k][$i] - 
								$sum) / $upper[$i][$i]); 
			} 
		} 
	} 

	
	
	echo "\t\tLower Triangular"; 
	echo "\t\t\tUpper Triangular\n"; 

	
	for ($i = 0; $i < $n; $i++) 
	{ 
		
		for ($j = 0; $j < $n; $j++) 
			echo "\t" . $lower[$i][$j] . "\t"; 
		echo "\t"; 

		
		for ($j = 0; $j < $n; $j++) 
		echo $upper[$i][$j] . "\t"; 
		echo "\n"; 
	} 
} 


$mat = array(array(2, -1, -2), 
			array(-4, 6, 3), 
			array(-4, -2, 8)); 

luDecomposition($mat, 3); 

?> 
