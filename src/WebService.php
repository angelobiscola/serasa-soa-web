<?php

namespace SerasaSOAWeb;

class WebService
{

    private $_wsSoapHeader      = NULL;
    private $_wsSoapClient      = NULL;

    private $_authCredentials   = false;
    private $_authNamespace     = NULL;
    private $_authVarName       = NULL;
    private $_authVars          = array();

    private $_wsUriLocationWsdl = NULL;
    private $_wsOptions         = array();

    private $_wsCalledMethod    = NULL;

    public function __construct($wsUriLocationWsdl = NULL, $wsOptions = array())
    {
        $this->_wsUriLocationWsdl = $wsUriLocationWsdl;
        $this->_wsOptions         = $wsOptions;
    }

    public function setCredentials($authVars, $authNamespace = NULL, $authVarName = NULL)
    {
        $this->_authVars        = $authVars;
        $this->_authNamespace   = $authNamespace;
        $this->_authVarName     = $authVarName;
        $this->_authCredentials = true;
        $this->setSoapHeader();
    }

    public function setSoapHeader(\SoapHeader $wsSoapHeader = NULL)
    {
        if ($wsSoapHeader instanceof \SoapHeader)
        {
            $this->_wsSoapHeader = $wsSoapHeader;
        }
        else
        {
            $this->_wsSoapHeader = new \SoapHeader($this->_authNamespace, $this->_authVarName, $this->_authVars, false);
        }
    }

    public function setSoapClient(\SoapClient $wsSoapClient = NULL)
    {
        if ($wsSoapClient instanceof \SoapClient)
        {
            $this->_wsSoapClient = $wsSoapClient;
        }
        else
        {
            $this->_wsSoapClient = new \SoapClient($this->_wsUriLocationWsdl, $this->_wsOptions);

            if ($this->_authCredentials)
            {
                $this->_wsSoapClient->__setSoapHeaders($this->_wsSoapHeader);
            }
        }
    }

    public function callMethod($methodName, $params = array())
    {
        if (!($this->_wsSoapClient instanceof \SoapClient))
        {
            $this->setSoapClient();
        }

        $this->_wsCalledMethod = $methodName;

        if ($this->_authCredentials)
        {
            return $this->_wsSoapClient->__soapCall($methodName, $params, NULL, $this->_wsSoapHeader);
        }
        else
        {
            return $this->_wsSoapClient->__soapCall($methodName, $params);
        }
    }

    public function getLastCalledMethod()
    {
        return $this->_wsCalledMethod;
    }

    public function getLastRequestHeaders()
    {
        if ($this->_wsSoapClient instanceof \SoapHeader)
        {
            return $this->_wsSoapClient->__getLastRequestHeaders();
        }
        else
        {
            return NULL;
        }
    }

    public function getLastRequest()
    {
        if ($this->_wsSoapClient instanceof \SoapHeader)
        {
            return $this->_wsSoapClient->__getLastRequest();
        }
        else
        {
            return NULL;
        }
    }

    public function getLastResponseHeaders()
    {
        if ($this->_wsSoapClient instanceof \SoapHeader)
        {
            return $this->_wsSoapClient->__getLastResponseHeaders();
        }
        else
        {
            return NULL;
        }
    }

    public function getLastResponse()
    {
        if ($this->_wsSoapClient instanceof \SoapHeader)
        {
            return $this->_wsSoapClient->__getLastResponse();
        }
        else
        {
            return NULL;
        }
    }


}