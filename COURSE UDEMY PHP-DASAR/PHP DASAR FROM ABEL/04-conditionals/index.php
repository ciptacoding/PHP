<?php
/* Pengkondisian / Percabangan / Condition
---------------------------------------------
- if
- if else
- if elseif else
- switch
---------------------------------------------
*/

// $n = 90;
// if ($n > 20) {
// 	echo "passed";
// }
// echo "failed";

// if ($n > 75) {
// 	echo "passed";
// } else {
// 	echo "failed";
// }

// if ($n >= 90 && $n <= 100) {
// 	$grade = "A";
// } elseif ($n >= 80 && $n <= 90) {
// 	$grade = "B";
// } elseif ($n >= 75 && $n <= 80) {
// 	$grade = "C";
// } else {
// 	$grade = "incorret";
// }
// echo $grade;

/* OR */

// if ($n >= 90 && $n <= 100)
// 	$grade = "A";
// elseif ($n >= 80 && $n <= 90)
// 	$grade = "B";
// elseif ($n >= 75 && $n <= 80)
// 	$grade = "C";
// else
// 	$grade = "incorret";
// echo $grade;

// if ($n >= 90 && $n <= 100):
// 	$grade = "A";
// elseif ($n >= 80 && $n <= 90):
// 	$grade = "B";
// elseif ($n >= 75 && $n <= 80):
// 	$grade = "C";
// else:
// 	$grade = "incorret";
// endif;
// echo $grade;

$order = "juice";
switch ($order) {
	case 'sandwich':
		echo "You ordered a sandwich!";
		break;
	case 'juice':
		echo "You ordered a juice!";
		break;
	case 'pizza':
		echo "You ordered a sandwich!";
		break;
	case 'pork':
		echo "You ordered a pork!";
		break;
	case 'beaf':
		echo "You ordered a sandwich!";
		break;
	default:
		echo "Your order is not available!";
		break;
}

?>