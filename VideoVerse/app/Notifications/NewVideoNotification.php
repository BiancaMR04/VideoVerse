<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewVideoNotification extends Notification
{
    use Queueable;
    protected $video;

    /**
     * Create a new notification instance.
     */
    public function __construct($video)
    {
        $this->video = $video;
    }

    public function toDatabase($notifiable)
    {
        return [
            'video_id' => $this->video->id,
            'video_titulo' => $this->video->titulo,
            'canal_nome' => $this->video->canal->nome,
        ];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Um novo vídeo foi postado no canal ' . $this->video->canal->nome . ':')
            ->line($this->video->titulo)
            ->action('Assistir ao Vídeo', url('/videos/' . $this->video->id))
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