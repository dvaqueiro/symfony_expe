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
        $this->checkHostExist($parseResult);
        $this->checkSchemeExist($parseResult);
        $this->checkAllowedScheme($parseResult);
        $this->checkQueryOrPathExist($parseResult);
        $this->checkHostHasDot($parseResult);

        $this->url = $url;
    }

    private function parseUrl($url)
    {
        if (!preg_match("@\w+://@", $url)) {
            $url = "http://{$url}";
        }

        return parse_url($url);
    }

    private function checkHostExist($parseResult)
    {
        if (!isset($parseResult['host'])) {
            throw new InvalidImageUrlException("Host is required");
        }
    }

    private function checkSchemeExist($parseResult)
    {
        if (!isset($parseResult['scheme'])) {
            throw new InvalidImageUrlException("Schema is required");
        }
    }

    private function checkAllowedScheme($parseResult)
    {
        if (!in_array($parseResult['scheme'], ['http', 'https'])) {
            throw new InvalidImageUrlException("Scheme is not allowed");
        }
    }

    private function checkQueryOrPathExist($parseResult)
    {
        if (!isset($parseResult['path']) && !isset($parseResult['query'])) {
            throw new InvalidImageUrlException("Path or query is required");
        }
    }

    private function checkHostHasDot($parseResult)
    {
        if (strpos($parseResult['host'], ".") === false) {
            throw new InvalidImageUrlException("Host not has dot");
        }
    }
}
