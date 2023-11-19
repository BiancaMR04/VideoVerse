<?php

namespace App\Observers;
use App\Models\Seguidor;
use App\Notifications\NewFollowerNotification;

class SeguidorObserver
{
    public function created(Seguidor $inscricao)
    {
        $canal = $inscricao->canal;

        $proprietario = $canal->user;

        $proprietario->notify(new NewFollowerNotification($inscricao));
    }
}
