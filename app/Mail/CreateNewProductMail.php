<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreateNewProductMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $userName;
    protected $productName;
    /**
     * Create a new message instance.
     */
    public function __construct($productName, $userName)
    {
        $this->userName = $userName;
        $this->productName = $productName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Создан новый продукт',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $items = ['userName' => $this->userName, 'productName' => $this->productName];
        $content =  new Content(
            view: 'mails.create-new-product-mail',
            with: $items,
        );
        return $content;
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        $items = ['userName' => $this->userName, 'productName' => $this->productName];
        return $this->from('sender@example.com')
            ->view('mails.create-new-product-mail')
            ->with(
                $items);
    }

}
