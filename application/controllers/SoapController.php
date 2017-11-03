<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SoapController
 *
 * @author ejacwro
 */
class SoapController extends Zend_Controller_Action{
    
    public function soapAction()
    {ini_set("soap.wsdl_cache_enabled", 0);//for development
      // disable layouts and renderers
      $this->getHelper('viewRenderer')->setNoRender(true);
      $this->getHelper("layout")->disableLayout();
       
      // initialize server and set URI
      $server = new Zend_Soap_Server(null, 
        array('uri' => $this->view->baseUrl().'/wsdl'));
      $classmap = array('tvOffer' => 'tvOffer');
      $server = new SoapServer($this->view->baseUrl().'/wsdl',array('classmap' => $classmap));
 
      // set SOAP service class      
      $server->setClass('CTVBackend');
      $server->setObject(new CTVBackend());
      $server->addFunction(SOAP_FUNCTIONS_ALL);
      $server->addFunction('getOffers');
       
      // register exceptions that generate SOAP faults
      //$server->registerFaultException(array('CTV_Error'));
       
      // handle request
      $server->handle();
    }
    
    public function wsdlAction()
    {ini_set("soap.wsdl_cache_enabled", 0);//for development
      // disable layouts and renderers
      $this->getHelper('viewRenderer')->setNoRender(true);
      $this->getHelper("layout")->disableLayout();
 
      // set up WSDL auto-discovery
      $wsdl = new Zend_Soap_AutoDiscover('Zend_Soap_Wsdl_Strategy_ArrayOfTypeComplex');
 
      // attach SOAP service class
      $wsdl->setClass('CTVBackend');
 
      // set SOAP action URI
      $wsdl->setUri($this->view->baseUrl().'/soap');
 
      // handle request
      $wsdl->handle();
    }
}
