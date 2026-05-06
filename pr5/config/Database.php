<?php
class Database
{

    private static $instance = null;

    public static function getConnection()
    {
        if (self::$instance === null) {

            $dsn = "mysql:host=localhost;dbname=guestbook;charset=utf8";
            $user = "root";
            $password = "";

            self::$instance = new PDO($dsn, $user, $password);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }

        return self::$instance;
    }
}