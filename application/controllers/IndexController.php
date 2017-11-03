<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
        $user = new Application_Model_Offer();

//        $db = Zend_Db_Table::getDefaultAdapter();

//    $db->query('CREATE TABLE offers (id INTEGER PRIMARY KEY, offerActivationPrice REAL,  offerCurrency CHAR(3), offerDescription CHAR(255), offerMonthlyLength INTEGER, offerMonthlyPrice REAL, offerName CHAR(255))');
//    
//            $db->query("INSERT INTO offers (offerActivationPrice, offerCurrency, offerDescription, offerMonthlyLength, offerMonthlyPrice, offerName) VALUES(49.99, 'PLN', 'Pakiet podstawowy zawiera podstawowy zestaw kanałów TVP1 i TVP2', 12, 7.99, 'Pakiet podstawowy');");
//        $db->query("INSERT INTO offers (offerActivationPrice, offerCurrency, offerDescription, offerMonthlyLength, offerMonthlyPrice, offerName) VALUES(49.99, 'PLN', 'Pakiet podstawowy zawiera podstawowy zestaw kanałów TVP1 i TVP2 rozszerzony o POLO TV', 12, 8.99, 'Pakiet podstawowy +');");
        $this->view->offers = $user->fetchAll()->toArray();

        $options = array(
  'location' => $this->view->baseUrl().'/soap',
  'uri'      => $this->view->baseUrl().'/soap'
);
        $client = new Zend_Soap_Client(null, $options);  
//  $id = $client->getOffers();
//  var_dump($id);
   $soapClient = new SoapClient($this->view->baseUrl()."/wsdl");   var_dump($soapClient->__soapCall("getOffers", array()));die('koniec testu');
//  $client = SoapClient("http://127.0.0.11/default/soap/wsdl", array('trace' => 1));
$result = $soapClient->getOffers();
echo "Response:\n" . $client->__getLastResponse() . "\n";
        

    }



}







