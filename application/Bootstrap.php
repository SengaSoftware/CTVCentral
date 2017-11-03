<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
protected function _initAutoload() {
        $autoLoader = Zend_Loader_Autoloader::getInstance();
        $autoLoader->setFallbackAutoloader(true);
       // Zend_Loader::loadFile('tvOffer',APPLICATION_PATH.'\class',TRUE);
        //$autoLoader->registerNamespace('Common_');
        //$autoLoader->registerNamespace('Phlickr_');

	$resourceTypes = array(
            'class' => array(
		    'path' => 'class/',
		    'namespace' => '',
		),
		'form' => array(
		    'path' => 'forms/',
		    'namespace' => 'Form_',
		),
		'model' => array(
		    'path' => 'models/',
		    'namespace' => 'Model_'
		),
		'queues' => array(
		    'path' => 'models/queues/',
		    'namespace' => 'Model_Queue_'
		),
		'files' => array(
		    'path' => 'models/files/',
		    'namespace' => 'Model_File_'
		),
		'plugin' => array(
		    'path' => 'plugins/',
		    'namespace' => 'Plugin_'
		),
	    );

        $resourceLoader = new Zend_Loader_Autoloader_Resource(array(
                    'basePath' => APPLICATION_PATH,
                    'namespace' => '',
                    'resourceTypes' => $resourceTypes
                ));
        $photosResourceLoader = new Zend_Loader_Autoloader_Resource(array(
                    'basePath' => APPLICATION_PATH . '/modules/photos/',
                    'namespace' => 'Photos',
                    'resourceTypes' => $resourceTypes
                ));

        return $autoLoader;
    }
    
    public function _initRouters() {
        $fc = Zend_Controller_Front::getInstance();
        $router = $fc->getRouter();
        $router->removeDefaultRoutes();

        $router->addRoute(
    'default',
    new Zend_Controller_Router_Route(
        ':module/:controller/:action/*',
        array(
            'module'     => 'default',
            'controller' => 'error',
            'action'     => 'index'
)));
        
        $r = new Zend_Controller_Router_Route_Static(
                        '/',
                        array(
                            'module' => 'default',
                            'controller' => 'index',
                            'action' => 'index',
                        )
        );
        $router->addRoute('mainPageRoute', $r);
        
        $r = new Zend_Controller_Router_Route_Static(
                        'soap',
                        array(
                            'module' => 'default',
                            'controller' => 'soap',
                            'action' => 'soap',
                        )
        );
        $router->addRoute('soapRoute', $r);
        
        $r = new Zend_Controller_Router_Route_Static(
                        'wsdl',
                        array(
                            'module' => 'default',
                            'controller' => 'soap',
                            'action' => 'wsdl',
                        )
        );
        $router->addRoute('wsdlRoute', $r);
        
  
        
    }
}

