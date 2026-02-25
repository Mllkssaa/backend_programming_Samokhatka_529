<?php
$n = 45;

$firstDigit = intdiv($n, 10);
$secondDigit = $n % 10;

$sum = $firstDigit + $secondDigit;

echo "Сума цифр: " . $sum;
?>