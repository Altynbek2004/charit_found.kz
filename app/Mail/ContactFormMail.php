<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Данные из контактной формы
     *
     * @var array
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @param  array  $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = '';

        // Определяем тему письма в зависимости от выбранной опции
        switch ($this->data['subject']) {
            case 'general':
                $subject = 'Общий вопрос';
                break;
            case 'support':
                $subject = 'Техническая поддержка';
                break;
            case 'billing':
                $subject = 'Вопрос оплаты';
                break;
            case 'other':
                $subject = 'Другое';
                break;
            default:
                $subject = 'Сообщение с контактной формы';
        }

        return new Envelope(
            from: new Address('altynaleuetdinov@gmail.com', 'Форма обратной связи'),
//            to: [new Address('aaleuetdinov@gmail.com', 'Animals Company')],
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $subject = '';

        // Определяем тему письма для шаблона
        switch ($this->data['subject']) {
            case 'general':
                $subject = 'Общий вопрос';
                break;
            case 'support':
                $subject = 'Техническая поддержка';
                break;
            case 'billing':
                $subject = 'Вопрос оплаты';
                break;
            case 'other':
                $subject = 'Другое';
                break;
            default:
                $subject = 'Сообщение с контактной формы';
        }

        return new Content(
            view: 'emails.contact-form',
            with: [
                'name' => $this->data['name'],
                'email' => $this->data['email'],
                'phone' => $this->data['phone'],
                'subjectType' => $subject,
                'userMessage' => $this->data['message'],
            ],
        );
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
}
