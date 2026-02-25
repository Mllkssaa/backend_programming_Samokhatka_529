<?php
$n = $argv[1] ?? 13;

if (!is_numeric($n) || intval($n) != $n) {
    echo "Помилка: введіть ціле число";
} elseif ($n % 2 == 0) {
    echo "Парне";
} else {
    echo "Непарне";
}
?>