<?php

namespace App\Notifications;

use App\Models\Seguidor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewFollowerNotification extends Notification
{
    use Queueable;
    public $inscricao;

    /**
     * Create a new notification instance.
     */
    public function __construct(Seguidor $inscricao)
    {
        $this->inscricao = $inscricao;
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
            ->line('Você tem uma nova inscrição no seu canal.')
            ->line($this->inscricao->canal->nome)
            ->line('Agora você tem ' . $this->inscricao->canal->inscritos . ' inscritos em seu canal.')
            ->line('Obrigado por usar nosso site!');
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
