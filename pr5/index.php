<?php

require_once __DIR__ . '/Controllers/GuestbookController.php';

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$url = str_replace('/mail_project/pr5', '', $url);

switch ($url) {

    case '':
    case '/':
    case '/guestbook':
        $controller = new GuestbookController();
        $controller->execute();
        break;

    default:
        echo "404 Not Found";
        break;
}