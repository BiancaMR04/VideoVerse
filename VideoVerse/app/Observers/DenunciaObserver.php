<?php

namespace App\Observers;
use App\Models\Denuncia;
use App\Notifications\NewDenuncia;
class DenunciaObserver
{
    public function created(Denuncia $denuncia)
    {
        $video = $denuncia->video->canal->user;

        $video->notify(new NewDenuncia($denuncia));
    }

}
