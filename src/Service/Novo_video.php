<?php
require __DIR__ . "/../../vendor/autoload.php";

$pdo = (new src\Database\Connect)->getInstance();
$createTable = "CREATE TABLE tb_novo_video(id int PRIMARY KEY UNIQUE, url TEXT ,title TEXT)";
$sql = 'INSERT INTO tb_novo_video(url,title) VALUES (:url , :title)';
$statement = $pdo->prepare($sql);
$statement->bindValue(':url', $_POST['url']);
$statement->bindValue(':title', $_POST['title']);
var_dump($statement);
if ($statement->execute() === false) {
    header(
        'Location: ./listagem-video.php?sucesso=0'
    );
} else {
    header('Location: ./listagem-video.php?sucesso=1'
    );
}
