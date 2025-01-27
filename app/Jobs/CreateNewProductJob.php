<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateNewProductMail;

class CreateNewProductJob implements ShouldQueue
{
    use Queueable;

    protected $mail;

    /**
     * Create a new job instance.
     */

    public function __construct($mail = null)
    {
        $this->mail = $mail == null ? config('products.email') : $mail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::all();
        foreach ($users as $user) {
            $notification = $user->unreadNotifications->first();
            if ($notification) {
                $mailText = new CreateNewProductMail($notification->data['product_name'],
                    $notification->data['user_name']);
                Mail::to($this->mail)->send($mailText);
            }
        }

        }

}
