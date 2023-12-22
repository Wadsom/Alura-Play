<?php

namespace src\Entity;

 class VideoEntity
{
    public string $url;
    public int $id;


    public function setUrl(string $url): void
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException("Url invalida!");
        }
        $this->url = $url;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function __construct(
        public readonly string $title, $url
    )
    {
        $this->setUrl($url);

    }
}