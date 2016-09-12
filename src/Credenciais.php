<?php

namespace SerasaSOAWeb;

class Credenciais
{
    public $Email;
    public $Senha;

    public function __construct($email,$senha)
    {
        $this->Email = $email;
        $this->Senha = $senha;
    }
}