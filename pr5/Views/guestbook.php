<!DOCTYPE html>
<html lang="uk">

<?php require_once "sectionHead.php"; ?>

<body>

<div class="container mt-4">
    <?php require_once "sectionNavbar.php"; ?>

    <div class="card">
        <div class="card-header bg-primary text-white">
            GuestBook
        </div>

        <div class="card-body">

            <?php if (!empty($message)): ?>
                <div class="alert alert-info">
                    <?= $message ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <input type="email" name="email" class="form-control mb-2" placeholder="Email">
                <input type="text" name="name" class="form-control mb-2" placeholder="Ім'я">
                <textarea name="text" class="form-control mb-2"></textarea>

                <button class="btn btn-primary">Надіслати</button>
            </form>

        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header bg-secondary text-white">
            Коментарі
        </div>

        <div class="card-body">
            <?php foreach ($comments as $comment): ?>
                <div class="border p-2 mb-2">
                    <b><?= htmlspecialchars($comment["name"]) ?></b>
                    <p><?= htmlspecialchars($comment["text"]) ?></p>
                    <small><?= $comment["date"] ?> ?></small>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

</body>
</html>