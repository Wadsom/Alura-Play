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
$updateVideo = new \src\Entity\VideoEntity($url, $title);
$updateVideo->setId($id);
$pdo = (new \src\Database\Connect())->getInstance();
$sql = 'UPDATE tb_novo_video SET url = :url,  title = :title WHERE id = :id;';
$repo = new \src\Repository\VideoRpository($pdo);
$repo->update($updateVideo);

if ($repo->update($updateVideo) === false) {
    header('Location: /Listagem-video.php?sucesso=0');
} else {
    header('Location: /Listagem-video.php?sucesso=1');
}
