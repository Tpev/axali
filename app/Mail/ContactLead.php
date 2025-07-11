<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactLead extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $reply;
    public string $body;

    public function __construct(string $name, string $reply, string $body)
    {
        $this->name  = $name;
        $this->reply = $reply;
        $this->body  = $body;
    }

    public function build()
    {
        return $this->subject('New website lead – '.$this->name)
                    ->replyTo($this->reply)
                    ->view('emails.contact-lead');
    }
}
