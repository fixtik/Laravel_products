<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateProductNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    protected $product_name;
    protected $user_name;
    public function __construct($product_name, $user_name)
    {
        $this->product_name = $product_name;
        $this->user_name = $user_name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase(object $notifiable)
    {
        return [
            'product_name' => $this->product_name,
            'user_name' => $this->user_name
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        //
    }
    /**
     * Получить содержимое почтового уведомления.
     */
    public function toMail(object $notifiable): MailMessage
    {
        //
    }

}
