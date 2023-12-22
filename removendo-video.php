<?php
require __DIR__. "/src/Database/Connect.php";
$id = $_GET['id'];
$query = "DELETE  FROM tb_novo_video WHERE id= :id";
$pdo = new \src\Database\Connect();
$state = $pdo->getInstance()->prepare($query);
$state->bindValue(':id', $id);
$state->execute();
if ($state->execute() === false) {
    header(
        'Location: ./listagem-video.php?sucesso=0'
    );
} else {
    header('Location: ./listagem-video.php?sucesso=1'
    );
}