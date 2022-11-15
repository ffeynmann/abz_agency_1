<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\Api\V1\PhotoNotFound;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

class PhotoGetController extends Controller
{
    public function __invoke(Photo $photo)
    {
        if(!Storage::disk('photos_optimized')->exists($photo->name)) {
            throw new PhotoNotFound();
        }

        return Storage::disk('photos_optimized')->download($photo->name);
    }
}
