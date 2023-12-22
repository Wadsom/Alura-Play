<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
$title = filter_input(INPUT_POST, 'title');
if ($title === false) {
    header('Location: /listagem-video.php?sucesso=0');
    exit();
}
if ($url === false) {
    header('Location: /Lista?sucesso=0');
    exit();
}
require_once './src/Database/Connect.php';
$pdo = new \src\Database\Connect();
$sql = 'UPDATE tb_novo_video SET url = :url,  title = :title WHERE id = :id;';
$state = $pdo->getInstance()->prepare($sql);
$state->bindValue(':title', $title);
$state->bindValue(':url', $url);
$state->bindValue(':id', $id, PDO::PARAM_INT);

if ($state->execute() === false) {
    header('Location: /Listagem-video.php?sucesso=0');
} else {
    header('Location: /Listagem-video.php?sucesso=1');
}
















