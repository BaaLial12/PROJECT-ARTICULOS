<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoMailable extends Mailable
{
    use Queueable, SerializesModels;


    public string $nombre;
    public string $contenido;
    public string $email;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $datos)
    {
        //

        //HAY QUE ESPECIFICARLE QUE LE VA A LLEGAR UN ARRAY

        $this->nombre = $datos['nombre'];
        $this->contenido = $datos['contenido'];
        $this->email = auth()->user()->email ? auth()->user()->email : $this->email;




    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address (auth()->user()->email , $this->nombre), //Cogeremos el email del usuario que esta autenticado y el nombre de quien lo manda
            subject: 'Contacto ', //Le asigamos un asunto al email
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
            markdown: 'correo.contacto',
            with:[
                'nombre' => $this->nombre,
                'email' => $this->email,
                'contenido' => $this->contenido,
            ]
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
