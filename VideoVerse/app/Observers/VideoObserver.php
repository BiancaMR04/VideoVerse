<?php

namespace App\Observers;

use App\Models\Video;

class VideoObserver
{
    /**
     * Handle the Video "created" event.
     */
    public function created(Video $video): void
    {
        echo "Um novo vídeo foi criado com o título: " . $video->title;
    }

    /**
     * Handle the Video "updated" event.
     */
    public function updated(Video $video): void
    {
        echo "Um vídeo foi editado: " . $video->title;
    }

    /**
     * Handle the Video "deleted" event.
     */
    public function deleted(Video $video): void
    {
        echo "Um vídeo foi deletado: " . $video->title;
    }

    /**
     * Handle the Video "restored" event.
     */
    public function restored(Video $video): void
    {
        //
    }

    /**
     * Handle the Video "force deleted" event.
     */
    public function forceDeleted(Video $video): void
    {
        //
    }
}
