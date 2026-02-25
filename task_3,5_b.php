<?php
$n = rand(100,999);

$hundreds = intdiv($n,100);
$tens = intdiv($n%100,10);
$ones = $n%10;

$max = max($hundreds, $tens, $ones);

echo "Число: $n<br>";
echo "Найбільша цифра: $max";
?>