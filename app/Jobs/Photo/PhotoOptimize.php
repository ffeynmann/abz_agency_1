<?php

namespace App\Jobs\Photo;

use App\Models\Photo;
use App\Services\OptimizeTinyPNG;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Tinify\Source;
use Tinify\Tinify;
use function Tinify\fromUrl;

class PhotoOptimize implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Photo $model;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Photo $model)
    {
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->model->update(['optimizing_start_at' => now()]);

        Storage::disk('photos_optimized')->put(
            '/'. $this->model->name,
            OptimizeTinyPNG::getBlob(Storage::disk('photos_original')->get($this->model->name))
        );

        $this->model->update(['optimizing_finish_at' => now()]);
    }
}
