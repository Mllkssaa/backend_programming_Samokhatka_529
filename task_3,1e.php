<?php
$n = 123;

$hundreds = intdiv($n, 100);
$tens = intdiv($n % 100, 10);
$ones = $n % 10;

$sum = $hundreds + $tens + $ones;

echo "Сума цифр: " . $sum;
?>