<?php

namespace App\Notifications;

use App\Models\Comentario;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCommentNotification extends Notification
{
    use Queueable;
    protected $comentario, $video;

    /**
     * Create a new notification instance.
     */
    public function __construct(Comentario $comentario)
    {
        $this->$comentario = $comentario;
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Novo comentário em seu vídeo: Comentário: '{$this->comentario}'",
            //'link' => route('videos.show', ['video' => $this->video->id]),
        ];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Você recebeu um novo comentário no seu vídeo.')
            ->line('Obrigado por usar nossa aplicação!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}