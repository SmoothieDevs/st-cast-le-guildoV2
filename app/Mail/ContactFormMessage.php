<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFormMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactFormRequest $message)
    {
        $this->name = $message->name;
        $this->email = $message->email;
        $this->message = $message->message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Formulaire de contact: nouveau message !')->markdown('emails.contact-form-message', [
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);
    }
}
