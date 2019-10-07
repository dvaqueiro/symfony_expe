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
        $parseResult = $this->parseUrl($url);
        if (!isset($parseResult['host'])) {
            throw new InvalidImageUrlException();
        }

        if (!isset($parseResult['scheme'])) {
            throw new InvalidImageUrlException();
        }

        if (!in_array($parseResult['scheme'], ['http', 'https'])) {
            throw new InvalidImageUrlException();
        }

        if (!isset($parseResult['path']) && !isset($parseResult['query'])) {
            throw new InvalidImageUrlException();
        }

        if (strpos($parseResult['host'], ".") === false) {
            throw new InvalidImageUrlException();
        }

        $this->url = $url;
    }

    private function parseUrl($url)
    {
        if (!preg_match("@\w+://@", $url)) {
            $url = "http://{$url}";
        }

        return parse_url($url);
    }
}
