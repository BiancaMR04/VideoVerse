<?php

namespace App\Observers;

use App\Models\Favorito;
use App\Notifications\FavoriteNotification;

class FavoritoObserver
{
    public function created(Favorito $favorito)
    {
        // Envia a notificação para os seguidores do canal do vídeo favoritado
        $video = $favorito->video;
        $canal = $video->canal;
        $seguidores = $canal->seguidores;

        foreach ($seguidores as $seguidor) {
            $seguidor->notify(new FavoriteNotification($favorito));
        }
    }
}
