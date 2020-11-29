<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClienteEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $dados;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dados = $dados;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->dados->email,$this->dados->name)
        ->subject("Cntato do cliente")->view('view.clientecontato');
    }
}
