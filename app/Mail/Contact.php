<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Dados do e-mail.
     *
     * @var array
     */
    public $data;

    /**
     * Cria uma nova instância.
     *
     * @param  array  $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Define o envelope do e-mail.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(    
            from: new Address($this->data['adminEmail'], $this->data['adminName']),
            subject: $this->data['subject'],
        );
    }

    /**
     * Define o conteúdo do e-mail.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content(): Content
    {
        return new Content(
            text: 'mails.contact',
        );
    }

    /**
     * Anexos do e-mail.
     *
     * @return array
     */
    public function attachments(): array
    {
        return [];
    }
}