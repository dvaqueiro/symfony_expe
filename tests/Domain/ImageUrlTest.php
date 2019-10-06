<?php

namespace App\Tests\Domain;

use App\Domain\ImageUrl;
use PHPUnit\Framework\TestCase;

class ImageUrlTest extends TestCase
{
    public function testCreateWithValidUrl()
    {
        $imageUrl = new ImageUrl("http://domain.com/path/image.jpg");
        $this->assertInstanceOf(ImageUrl::class, $imageUrl);
    }
}
