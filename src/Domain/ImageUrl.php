<?php

namespace App\Domain;

class ImageUrl
{
    private $url;

    public static function fromString(string $url)
    {
        return new self($url);
    }

    private function __construct(string $url)
    {
        $this->setUrl($url);
    }

    private function setUrl($url)
    {
        $parseResult = parse_url($url);
        if (!isset($parseResult['host'])) {
            throw new InvalidImageUrlException();
        }

        if (!isset($parseResult['path']) && !isset($parseResult['query'])) {
            throw new InvalidImageUrlException();
        }

        $this->url = $url;
    }
}
