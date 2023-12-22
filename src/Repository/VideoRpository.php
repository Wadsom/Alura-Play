<?php

namespace src\Repository;

use src\Entity\VideoEntity;

class VideoRpository
{

    public function __construct(private \PDO $pdo)
    {

    }

    public function add(VideoEntity $video):VideoEntity
    {
        $sql = 'INSERT INTO tb_novo_video(url,title) VALUES :url , :title;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':url', $video['url']);
        $statement->bindValue(':title', $video['title']);
        $statement->execute();
        if ($statement->execute() === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }

        $id = $this->pdo->lastInsertId();
        $video->setId(intval($id));
        return $video;

    }


}