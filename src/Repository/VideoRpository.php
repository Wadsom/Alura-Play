<?php

namespace src\Repository;

use src\Entity\VideoEntity;

class VideoRpository
{

    public function __construct(private \PDO $pdo)
    {

    }

    public function add(VideoEntity $video): VideoEntity
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

    public function delete(int $id): void
    {
        $sql = 'DELETE * FROM tb_novo_video WHERE id= :id;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
    }


    public function update(VideoEntity $video): bool
    {
        $sql = 'UPDATE tb_novo_video SET url = :url, title = :title WHERE id = :id;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':url', $video['url']);
        $statement->bindValue(':title', $video['title']);
        $statement->bindValue(':id', $video['id'], PDO::PARAM_INT);
        return $statement->execute();
    }

    /**
     * @return VideoEntity[]
     */

    public function getAll(): array
    {
        $sql = 'SELECT * FROM tb_novo_video;';
        $videoList = $this->pdo->query($sql)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return array_map(
            function (array $videoData) {
                $video = new VideoEntity($videoData['title'], $videoData['url']);
                $video->setId($videoData['id']);

                return $video;
            }, $videoList
        );

    }

}