<?php
$n = rand(0,28800);

echo "$n<br>";

$hours = intdiv($n,3600);

if ($hours > 1) {
    echo "Залишилось $hours годин";
} elseif ($hours == 1) {
    echo "Залишилась 1 година";
} else {
    echo "Залишилось менше години";
}
?>