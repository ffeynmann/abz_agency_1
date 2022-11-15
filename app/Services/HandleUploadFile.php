<?php

namespace App\Services;

use App\Models\Photo;

class HandleUploadFile
{
    public static function getPhoto(): Photo
    {
        $imageName = request()->file('photo')->getClientOriginalName();
        $imageName = sprintf('%s-%s', time(), $imageName);
        $imageName = \Str::ascii($imageName);

        request()->file('photo')->storeAs('/', $imageName, ['disk' => 'photos_original']);

        return Photo::create(['name' => $imageName]);
    }
}
