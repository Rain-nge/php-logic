<?php

$array1 = [3, 5, 6, 0, 7, 0, 1];
echo json_encode(transformedArray($array1)).'<br />';
//Output: [0,3,5,6,7,1,0]

$array2 = [5, 0, 0, 6, 0, 8];
echo json_encode(transformedArray($array2)).'<br />';
//Output: [0,0,5,6,8,0]

$array3 = [1, 2, 3, 0, 0, 0, 0];
//Output: [0,0,1,2,3,0,0]
echo json_encode(transformedArray($array3)).'<br />';

$array4 = [1, 2, 3];
//Output: [1,2,3]
echo json_encode(transformedArray($array4)).'<br />';

function transformedArray(array $inputArray):array{

	if (!in_array(0, $inputArray)) {
		return $inputArray;
	}

	$getNumbers = array_diff($inputArray, [0]);
	$totalZeros = count($inputArray)-count($getNumbers);

	$frontZeros = intval(round($totalZeros/2));
	$lastZeros  = $totalZeros-$frontZeros;

	$frontZeroArr = array_fill(0, $frontZeros, 0);
	$lastZeroArr  = array_fill(0, $lastZeros, 0);

	return array_merge($frontZeroArr, $getNumbers, $lastZeroArr);
}
?>
