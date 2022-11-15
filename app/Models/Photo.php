<?php

namespace App\Models;

use App\Observers\PhotoObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'original_path',
        'optimizing_start_at',
        'optimizing_finish_at'
    ];


    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        self::observe(PhotoObserver::class);
    }

    public function getUrl()
    {
        if(!$this->optimizing_finish_at) {
            return null;
        }

        return route('web.images.users', ['photo' => $this->name]);
    }
}