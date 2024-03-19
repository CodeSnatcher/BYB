<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class e1_app_reg extends Mailable
{
    public $e1_app_data;

    use Queueable, SerializesModels;

    // create a new message instance

    public function __construct($e1_app_data)
    {
        $this->e1_app_data=$e1_app_data;
    }

    // Get the message envelop

    public function envelope(): Envelope
    {

        return new Envelope(
            subject: 'Email Notification'
        );

    }

    // Get the message content defintion

    public function content(): content
    {

        return new Content(
            view: 'emails.E1_app_reg'
        );

    }

    /** 
     * get the attatchment for the message
     * 
     * @return array<int.\Illuminate\Mail\Mailables\Attatchment>

    */

    public function attachments(): array
    {
        return [];
    }


}
