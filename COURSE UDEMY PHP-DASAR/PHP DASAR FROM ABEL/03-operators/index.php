<?php
/*-----------------------------
	Operator
-----------------------------*/
$bil1 = 1;
$bil2 = 3;


// 1. Aritmatika (+, -, *, /, %)
// echo $bil1 + $bil2;
// echo $bil1 - $bil2;
// echo $bil1 * $bil2;
// echo $bil1 / $bil2;
// echo $bil1 % $bil2;

// 2. Pengabung String / Concatenation / concat (.)
// $result = $bil1 + $bil2;
// echo "hasil dari " . $bil1 . " + " . $bil2 . " = " . $result;

// 3. Penugasan / Assignment (=, +=, -=, *=, %=, .=)
// $bil1 += 5; // $bil1 = $bil1 + 2
// echo $bil1;
// $name = "abel";
// $name .= " ";
// $name .= "yoshuara";
// echo $name;

// 4. Relasi / Pembanding / Comparison (<, >, <=, >=, ==, !=)
// var_dump($bil1 > $bil2); 1 > 3 // false
// var_dump(1 > 1);    // false
// var_dump(1 >= 1);   // true
// var_dump(1 == "1"); // true

// 5. Identitas / identity (===, !===)
// var_dump(1 === "1"); // false
// var_dump(1 !== "1"); // true

// 6. Logika / Logic (&&, ||, !)
// var_dump(10 < 20 && 10 % 2 == 0); // (true && true) = true
// var_dump(30 < 20 && 10 % 2 == 0); // (false && true) = false
// var_dump(10 < 20 || 10 % 2 == 0); // (true && true) = true
// var_dump(30 < 20 || 10 % 2 == 0); // (false && true) = true
// var_dump(!true); // = false

// 7. Ternary (?) => (condition) ? true : false;
$result = ($bil1 < $bil2) ? "corret" : "incorret";
echo $result;
