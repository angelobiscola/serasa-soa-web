<?php

namespace SerasaSOAWeb;

class Serasa extends WebService
{
    /* URL de Test-Drive */
    private $uriLocation      = 'http://www.soawebservices.com.br/webservices/test-drive/serasa/pefin.asmx';
    private $uriLocationWSDL = 'http://www.soawebservices.com.br/webservices/test-drive/serasa/pefin.asmx?WSDL';
    private $_traceEnabled  = 1;

    public function __construct($production = false)
    {
        $this->production($production);
        $options = array
        (
            'location' => $this->uriLocation,
            'trace'    => $this->_traceEnabled,
            'style'    => SOAP_RPC,
            'use'      => SOAP_ENCODED,
        );
        parent::__construct($this->uriLocationWSDL, $options);
    }

    private function production($active)
    {
        if($active)
        {
            $this->uriLocation     = 'http://www.soawebservices.com.br/webservices/producao/serasa/pefin.asmx';
            $this->uriLocationWSDL = 'http://www.soawebservices.com.br/webservices/producao/serasa/pefin.asmx?WSDL';
        }
    }

    public function getSerasaPefin(Pesquisa $pesquisa)
    {
        $result = $this->callMethod('Pefin', array('parameters' => $this->objectToArray($pesquisa)));
        return $result;
    }

    public function objectToArray($object)
    {
        $array = array();
        $list = (is_object($object)) ? get_object_vars($object) : $object;
        foreach ($list as $key => $val) {
            $val = (is_array($val) || is_object($val)) ? $this->objectToArray($val) : $val;
            $array[$key] = $val;
        }
        return $array;
    }
}


