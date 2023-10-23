<?php

namespace App\Observers;

use App\Models\Comentario;
use App\Models\Video;
use App\Notifications\CommentNotification;

class ComentarioObserver
{
    public function created(Comentario $comentario)
    {
        // Envia a notificação para os seguidores do canal do vídeo
        $video = $comentario->video;
        $canal = $video->canal;
        $seguidores = $canal->seguidores;

        foreach ($seguidores as $seguidor) {
            $seguidor->notify(new CommentNotification($comentario));
        }
    }
}
