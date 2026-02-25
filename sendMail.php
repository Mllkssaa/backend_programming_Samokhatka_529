<?php

$subject = "MY TEST EMAIL";

echo "============\n";
echo $subject . "\n";
echo "============\n";

$firstName = "Karina";
$text1 = "First Name: " . $firstName . "\n";
$text2 = "Date: " . date("Y-m-d") . "\n";
$text3 = "Time: " . date("H:i:s") . "\n";

$message = $text1 . $text2 . $text3;

echo $message;

$headers = "From: your_email@gmail.com";

mail("receiver_email@gmail.com", $subject, $message, $headers);

?>