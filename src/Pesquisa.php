<?php
namespace SerasaSOAWeb;

class Pesquisa
{
    public $Documento;
    public $Credenciais;

    public function __construct($email,$senha)
    {
        $this->Credenciais   = new Credenciais($email,$senha);
    }

    public function setDocumento($documento)
    {
        $this->Documento = $documento;
        return $this;
    }

    public function consultar()
    {
        $serasa = new Serasa();
        return $serasa->getSerasaPefin($this)->PefinResult;
    }
}