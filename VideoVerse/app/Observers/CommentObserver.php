<?php

namespace App\Observers;
use App\Notifications\NewComment;
use App\Models\Comentario;

class CommentObserver
{
    public function created(Comentario $comment)
    {
        $video = $comment->video->canal->user;

        $video->notify(new NewComment($comment));
    }
}