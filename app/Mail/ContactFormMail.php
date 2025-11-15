<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address; // Belangrijk voor de afzender
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    // Publieke eigenschappen om de data van het formulier op te slaan
    public string $senderName;
    public string $senderEmail;
    public string $senderMessage;

    /**
     * Create a new message instance.
     * We vullen de data via de constructor
     */
    public function __construct(array $details)
    {
        $this->senderName = $details['name'];
        $this->senderEmail = $details['email'];
        $this->senderMessage = $details['message'];
    }

    /**
     * Get the message envelope.
     * Hier bepalen we het onderwerp en de afzender
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            
            from: new Address('noreply@bakkerij.test', 'Bakkerij Website'),
            replyTo: [
                new Address($this->senderEmail, $this->senderName),
            ],
            subject: 'Nieuw Contactbericht van ' . $this->senderName,
        );
    }

    /**
     * Get the message content definition.
     * Hier bepalen we welke view (template) de e-mail moet gebruiken
     */
    public function content(): Content
    {
        return new Content(

            view: 'emails.contact-form',
            with: [
                'name' => $this->senderName,
                'email' => $this->senderEmail,
                'messageContent' => $this->senderMessage,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}