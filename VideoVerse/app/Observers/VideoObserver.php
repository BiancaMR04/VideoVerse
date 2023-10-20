<?php

namespace App\Observers;
use App\Models\Video;
use App\Notifications\NewVideoNotification;

class VideoObserver
{
    public function created(Video $video)
{
    // Envia a notificação para os seguidores do canal
    $canal = $video->canal;
    $seguidores = $canal->seguidores;

    foreach ($seguidores as $seguidor) {
        $seguidor->notify(new NewVideoNotification($video));
    }
}
}
