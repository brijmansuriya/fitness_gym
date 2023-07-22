<?php

namespace App\Domain\Utility;

use Intervention\Image\Facades\Image;

class ImageUtil
{
    public static function compressImage($src, $dest)
    {
        if (\File::exists($src)) {
            $img = Image::make($src);
            $img->resize(230, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->encode('jpg', 90);
            $img->save($dest);
        }
    }
}