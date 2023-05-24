<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Usuario;
use App\Models\Receta;
use App\Models\Orden;

class Confirmacion extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $orden; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Usuario $usuario, Orden $orden)
    {
        $this->usuario = $usuario;
        $this->orden = $orden; 
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Confirmación de Pago - Vision y Estilo',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email_confirmacion',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
