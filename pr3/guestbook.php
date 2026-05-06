<?php
session_start();

$fileName = "comments.csv";
$comments = [];
$message = "";

//ОБРОБКА POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        !empty($_POST["email"]) &&
        !empty($_POST["name"]) &&
        !empty($_POST["text"])
    ) {
        $email = trim($_POST["email"]);
        $name = trim($_POST["name"]);
        $text = trim($_POST["text"]);

        // валідація email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Невірний email!";
        } else {
            $comment = [
                "email" => $email,
                "name" => $name,
                "text" => $text,
                "date" => date("Y-m-d H:i:s")
            ];

            $jsonString = json_encode($comment, JSON_UNESCAPED_UNICODE);

            $fileStream = fopen($fileName, "a");
            fwrite($fileStream, $jsonString . "\n");
            fclose($fileStream);

            $message = "Коментар успішно додано!";
        }
    } else {
        $message = "Заповніть всі поля!";
    }
}

//ЧИТАННЯ З ФАЙЛУ
if (file_exists($fileName)) {
    $fileStream = fopen($fileName, "r");

    while (!feof($fileStream)) {
        $jsonString = fgets($fileStream);
        $comment = json_decode($jsonString, true);

        if (!empty($comment)) {
            $comments[] = $comment;
        }
    }

    fclose($fileStream);
}
?>

<!DOCTYPE html>
<html lang="uk">

<?php require_once "sectionHead.php"; ?>

<body>

<div class="container mt-4">
    <?php require_once "sectionNavbar.php"; ?>

    <br>

    <div class="card">
        <div class="card-header bg-primary text-white">
            GuestBook Form
        </div>
        <div class="card-body">

            <?php if (!empty($message)): ?>
                <div class="alert alert-info">
                    <?= $message ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Ім’я</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Коментар</label>
                    <textarea name="text" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Надіслати
                </button>
            </form>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header bg-secondary text-white">
            Коментарі
        </div>
        <div class="card-body">

            <?php if (!empty($comments)): ?>
                <?php foreach (array_reverse($comments) as $comment): ?>
                    <div class="border p-3 mb-3 rounded">
                        <h5><?= htmlspecialchars($comment["name"]) ?></h5>
                        <small><?= htmlspecialchars($comment["email"]) ?></small>
                        <p><?= htmlspecialchars($comment["text"]) ?></p>
                        <small class="text-muted"><?= $comment["date"] ?></small>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Коментарів поки немає.</p>
            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>