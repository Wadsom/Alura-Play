<?php
require __DIR__ ."/../Database/Connect.php";
$pdo = (new src\Database\Connect)->getInstance();
$createTable = "CREATE TABLE tb_novo_video(id int PRIMARY KEY UNIQUE, url TEXT ,title TEXT)";
$sql = 'INSERT INTO tb_novo_video(url,title) VALUES (:url , :title)';
$statement = $pdo->prepare($sql);
$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_EMAIL);
$statement->bindValue(':url', $url);
$statement->bindValue(':title', $title);
if ($statement->execute() === false) {
    header(
        'Location: ./Lista?sucesso=0'
    );
} else {
    header('Location: ./Lista?sucesso=1'
    );
}