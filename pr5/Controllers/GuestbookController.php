<?php

require_once 'Models/Comment.php';

class GuestbookController
{
    public function execute()
    {
        session_start();

        $message ="";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

                if (!empty($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["text"])) {

                    $email = trim($_POST["email"]);
                    $name = trim($_POST["name"]);
                    $text = trim($_POST["text"]);

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $message = "Невірний email!";
                    } else {
                        Comment::add($email, $name, $text);
                        $message = "Коментар додано!";
                    }
                } else {
                    $message = "Заповніть всі поля!";
                }
            }

            $comments = Comment::getAll();

            $this->renderView([
                "comments" => $comments,
                "message" => $message
            ]);
        }

        public function renderView($arguments = [])
        {
            extract($arguments);
            require 'Views/guestbook.php';
        }
    }
