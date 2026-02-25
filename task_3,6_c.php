<?php
if ($argc != 4) {
    echo "Введіть три числа\n";
    exit;
}

$a = abs($argv[1]);
$b = abs($argv[2]);
$c = abs($argv[3]);

$min = min($a, $b, $c);

echo "Менше за модулем: $min\n";
?>