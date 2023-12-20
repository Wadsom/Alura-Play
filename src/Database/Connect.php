<?php

namespace src\Database;

use PDO;
use PDOException;

class Connect
{

    private const HOST = "127.0.0.1";
    private const USER = "root";
    private const PASSWD = "";
    private const DBNAME = "alura_mysql";
    private static $instance;
    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_CASE => PDO::CASE_NATURAL,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    public function getInstance(): PDO
    {
        if (empty(self::$instance)) {
            self::$instance = new PDO(
                "mysql:host=" . self::HOST . "; dbname=" . self::DBNAME,
                self::USER, self::PASSWD, self::OPTIONS
            );
        }
       return self::$instance;
    }


}