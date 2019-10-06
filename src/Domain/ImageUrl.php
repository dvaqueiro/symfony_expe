<?php

namespace App\Domain;

class ImageUrl
{
    private $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }
}
