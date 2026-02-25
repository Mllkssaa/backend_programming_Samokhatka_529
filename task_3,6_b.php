<?php
$a = $argv[1] ?? null;
$b = $argv[2] ?? null;

if (!is_numeric($a) || !is_numeric($b)) {
    echo "Помилка";
} else {
    echo "Сума: " . ($a + $b);
}
?>