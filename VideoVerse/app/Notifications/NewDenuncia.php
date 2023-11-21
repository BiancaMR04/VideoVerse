<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use VideoVerse\VideoVerse\Models\Video;

class NewDenuncia extends Notification
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
                    ->line('Uma denúncia foi feita no vídeo do canal' . $this->video->canal->nome . ':')
                    ->line($this->video->titulo)
                    ->line('Verifique a denúncia e tome as medidas necessárias.')
                    ->action('Ir para o vídeo', url('/videos/' . $this->video->id));
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
