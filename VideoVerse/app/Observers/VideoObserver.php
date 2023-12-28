<?php

namespace App\Observers;
use App\Models\Video;
use App\Notifications\NewVideoNotification;

class VideoObserver{
    public function created(Video $video){
        $canal = $video->canal;
        $seguidores = $canal->seguidores;

        foreach ($seguidores as $seguidor) {
            $seguidor->user->notify(new NewVideoNotification($video));
        }
    }
}
