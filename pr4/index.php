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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $text = $_POST['text'];

    $query = "INSERT INTO comments (email, name, text)
              VALUES ('$email', '$name', '$text')";
    mysqli_query($db, $query);
}

$query = "SELECT * FROM comments";
$result = mysqli_query($db, $query);
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guestbook</title>
</head>
<body>

<h2>Додати коментар</h2>
<form method="POST">
    Email: <input type="text" name="email"><br>
    Ім'я: <input type="text" name="name"><br>
    Коментар: <br>
    <textarea name="text"></textarea><br>
    <button type="submit">Відправити</button>
</form>

<hr>

<h2>Коментарі</h2>

<?php foreach ($comments as $comment): ?>
    <p>
        <b><?= $comment['name'] ?></b><br>
        <?= $comment['email'] ?><br>
        <?= $comment['text'] ?><br>
        <?= $comment['date'] ?>
    </p>
    <hr>
<?php endforeach; ?>

</body>
</html>