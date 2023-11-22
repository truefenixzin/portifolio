<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;

class contactform extends Controller
{
    private $nome;
    private $assunto;
    private $mensagem;
    public function __construct(Request $request)
    {
        $this->nome = $request->name;
        $this->assunto = $request->subject;
        $this->mensagem = $request->message;
    }

    public function sendMail()
    {
        $data = array(
            'nome' => $this->nome,
            'assunto' => $this->assunto,
            'mensagem' => $this->mensagem
        );

        Mail::to(config('mail.from.address'))
            ->send(new SendMail($data));
    }
}
