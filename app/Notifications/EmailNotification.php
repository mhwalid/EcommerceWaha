<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as bsd;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends bsd implements ShouldQueue
{
    use Queueable;


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Bonjour!')
            ->subject(__('Bienvenue chez WaHagsb ' . $notifiable->name))
            ->line(__('Vous avez reçu ce courriel parce que vous vous êtes récemment inscrit à votre site e-commerce Wahagsb'))
            ->action(
                __('Wahagsb'),
                url("/Store")
            );
    }
}
