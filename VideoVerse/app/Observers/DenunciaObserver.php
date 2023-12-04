<?php

namespace App\Observers;
use App\Models\Denuncia;
use App\Notifications\NewDenuncia;
use App\Models\User;
class DenunciaObserver
{
    public function created(Denuncia $denuncia)
    {
        $adm = User::find(33);
        
        $adm->notify(new NewDenuncia($denuncia));
    }

}
