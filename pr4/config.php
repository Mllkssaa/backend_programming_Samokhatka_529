<?php
return [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'name' => 'guestbook'
];
?>


<?php
$config = require 'config.php';

$db = mysqli_connect(
    $config['host'],
    $config['user'],
    $config['pass'],
    $config['name']
);

if (!$db) {
    die("Помилка підключення");
}
?>


<?php
$email = $_POST['email'];
$name = $_POST['name'];
$text = $_POST['text'];

$query = "INSERT INTO comments (email, name, text)
VALUES ('$email', '$name', '$text')";

mysqli_query($db, $query);
?>


<?php
$query = "SELECT * FROM comments";
$result = mysqli_query($db, $query);

$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($comments as $comment) {
    echo $comment['name'] . "<br>";
    echo $comment['email'] . "<br>";
    echo $comment['text'] . "<br>";
    echo $comment['date'] . "<br>";
    echo "<hr>";
}
?>