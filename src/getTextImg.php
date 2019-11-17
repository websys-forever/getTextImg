<?php

namespace WebsysForever;

class GetTextImg
{
    private $img;

    public function __construct(
        string $text = 'Hello World!',
        int $x = 100,
        int $y = 50
    )
    {
        $text = substr($_REQUEST['text'], 0, 30);
        $x = (int) $x;
        $y = (int) $y;
        $this->img = imageCreate($x, $y);
        $bgColor = imageColorAllocate($this->img, 255, 255, 255);
        $txtColor = imageColorAllocate($this->img, 0, 230, 0);
        imageFill($this->img, 1, 1, $bgColor);
        $px = (imageSX($this->img) - 6 * strlen($text))/2;
        imageString($this->img, 3, 1, 1, $text, $txtColor);
    }

    public function sendImg()
    {
        header("Content-type: image/gif");
        imageGif($this->img);
        imageDestroy($this->img);
    }
}
