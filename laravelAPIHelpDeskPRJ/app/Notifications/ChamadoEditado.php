<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\Chamado;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Messages\SimpleMessage;
use Illuminate\Notifications\Messages\NexmoMessage;


class ChamadoEditado extends Notification implements ShouldQueue
{
    use Queueable;

    public $chamado;
    public $mensagem;
    public $linkweb;
    public $linkapi;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Chamado $chamado)
    {
        $this->chamado = $chamado;
        $this->mensagem = "O chamado #" . $interacao->chamado_id . " foi editado. Clique para visualizar.";
        $this->linkweb = route("chamado.edit", $interacao->chamado_id);
        $this->linkapi = route("chamado.show_api", $interacao->chamado_id);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ["broadcast", "database"];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'chamado' => $this->chamado,
            'mensagem' => $this->mensagem,
            'linkweb' => $this->linkweb,
            'linkapi' => $this->linkapi,
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return $this->toArray($notifiable);
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage($this->toArray($notifiable));
    }

    /**
     * Get the Nexmo / SMS representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return NexmoMessage
     */
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
                    ->content('Your SMS message content');
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
                    ->content('Your Slack Message Content');
    }
}
