<?php

require_once 'config/Database.php';

class Comment
{
    public static function add($email, $name, $text)
    {

        $db = Database::getConnection();

        $sql = "INSERT INTO comments (email, name, text)
                VALUES (:email, :name, :text)";

        $stmt = $db->prepare($sql);
        $stmt->execute([
            ":email" => $email,
            ":name" => $name,
            ":text" => $text
        ]);
    }

    public static function getAll()
    {
        $db = Database::getConnection();

        $sql = "SELECT * FROM comments ORDER BY id DESC";

        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}