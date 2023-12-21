<?php
require __DIR__ . "/../../vendor/autoload.php";

use src\Database\Connect as DbConnect;
echo "olá";
$pdo = new DbConnect();
$url = $_POST['url'];
$title = $_POST['title'];
$statement = $pdo->getInstance()->prepare("INSERT INTO novo_video(url,title) VALUES (url = :url , title = :title)");
$statement ->bindValue(':url', $url);
$statement->bindValue(':title', $title);
$statement->execute();
var_dump($statement->execute());
