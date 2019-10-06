<?php

namespace App\Domain;

class ImageUrl
{
    private $url;

    public function __construct(string $url)
    {
        $this->setUrl($url);
    }

    private function setUrl($url)
    {
        if (empty($url)) {
            throw new InvalidImageUrlException();
        }

        $this->url = $url;
    }
}
