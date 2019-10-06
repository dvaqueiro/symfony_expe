<?php

namespace App\Tests\Domain;

use App\Domain\ImageUrl;
use App\Domain\InvalidImageUrlException;
use PHPUnit\Framework\TestCase;

class ImageUrlTest extends TestCase
{
    public function testCreateWithValidUrl()
    {
        $imageUrl = ImageUrl::fromString("http://domain.com/path/image.jpg");
        $this->assertInstanceOf(ImageUrl::class, $imageUrl);
    }

    public function testCreateWithEmptyStringThrowException()
    {
        $this->expectException(InvalidImageUrlException::class);
        ImageUrl::fromString("");
    }
}
