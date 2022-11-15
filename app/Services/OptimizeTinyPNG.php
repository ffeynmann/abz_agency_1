<?php

namespace App\Services;

use Tinify\Source;
use Tinify\Tinify;

class OptimizeTinyPNG
{
    private static string $apiKey = 'cFfQtgCDcx7Y1hRKY1szwxKYsmQJ1nYb';
    private static int $width = 70;
    private static int $height = 70;
    private static string $method = 'cover';

    public static function getBlob(string $blob): string
    {
        Tinify::setKey('cFfQtgCDcx7Y1hRKY1szwxKYsmQJ1nYb');

        $response = Source::fromBuffer($blob)->resize([
            'method' => self::$method,
            'width'  => self::$width,
            'height' => self::$height
        ]);

        return $response->result()->data();
    }

}
