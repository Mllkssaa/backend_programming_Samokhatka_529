<?php
$word = strtolower($argv[1] ?? "");

if (strlen($word) != 5) {
    echo "Помилка: слово має бути з 5 літер";
} elseif ($word == strrev($word)) {
    echo "Це паліндром";
} else {
    echo "Не паліндром";
}
?>