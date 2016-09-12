<?php
namespace SerasaSOAWeb;

class Pesquisa
{
    public $Documento;
    public $Credenciais;
    public $active;

    public function __construct($email,$senha,$active = false)
    {
        $this->Credenciais   = new Credenciais($email,$senha);
        $this->active        = $active;
    }

    public function setDocumento($documento)
    {
        $this->Documento = $documento;
        return $this;
    }

    public function consultar()
    {
        $serasa = new Serasa($this->active);
        return $serasa->getSerasaPefin($this)->PefinResult;
    }
}
