<?php

use Phalcon\DI\FactoryDefault,
	Phalcon\Mvc\View,
	Phalcon\Crypt,
	Phalcon\Mvc\Dispatcher,
	Phalcon\Mvc\Url as UrlResolver,
	Phalcon\Db\Adapter\Pdo\Postgresql as DbAdapter,
	Phalcon\Mvc\View\Engine\Volt as VoltEngine,
	Phalcon\Session\Adapter\Files as SessionAdapter,
	Phalcon\Assets\Manager as Assets,
	Phalcon\Flash\Direct as Flash;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * Register the global configuration as config
 */
$di->set('config', $config);

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function() use ($config) {
	$url = new UrlResolver();
	$url->setBaseUri($config->application->baseUri);
	return $url;
}, true);

/**
 * Setting up the view component
 */
$di->set('view', function() use ($config) {

	$view = new View();

	$view->setViewsDir($config->application->viewsDir);

	$view->registerEngines(array(
		'.phtml' => function($view, $di) use ($config) {

			$volt = new VoltEngine($view, $di);
			$volt->setOptions(array(
					'compiledPath' => $config->application->cacheDir . 'volt/',
					'compiledSeparator' => '_',
					"compileAlways" => true
			));
			return $volt;
		}
	));

	return $view;
}, true);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function() use ($config) {
	
	$eventsManager = new \Phalcon\Events\Manager();    
	
	$connection = new DbAdapter(array(
		'host' => $config->database->host,
		'username' => $config->database->username,
		'password' => $config->database->password,
		'dbname' => $config->database->dbname
	));
	
	//Listen all the database events
    $eventsManager->attach('db', function($event, $connection) {
        if ($event->getType() == 'beforeQuery') {
            //echo $connection->getSQLStatement();
        }        
    });
    
    //Assign the eventsManager to the db adapter instance
    $connection->setEventsManager($eventsManager);

    return $connection;
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function() {
	$session = new SessionAdapter();
	$session->start();
	return $session;
});

/**
 * Crypt service
 */
$di->set('crypt', function() use ($config) {
	$crypt = new Crypt();
	$crypt->setKey($config->application->cryptSalt);
	return $crypt;
});

/**
 * Dispatcher use a default namespace
 */
$di->set('dispatcher', function() use($di) {
	$dispatcher = new Dispatcher();
	$dispatcher->setDefaultNamespace('Stemcord\Controllers');
	
	$evManager = $di->getShared('eventsManager');

	//$evManager->attach(
		//"dispatch:beforeException",
		//function($event, $dispatcher, $exception)
		//{
			//switch ($exception->getCode()) {
				//case Phalcon\Mvc\Dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
				//case Phalcon\Mvc\Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
					//$dispatcher->forward(
						//array(
							//'controller' => 'error',
							//'action'     => 'show404',
						//)
					//);
					//return false;
			//}
		//}
	//);
	
	$dispatcher->setEventsManager($evManager);
	
	return $dispatcher;
});

/**
 * Loading routes from the routes.php file
 */
$di->set('router', function() {
	return require __DIR__ . '/routes.php';
});

/**
 * Flash service with custom CSS classes
 */
$di->set('flash', function(){
	return new Flash(array(
		'error' => 'alert alert-danger',
		'success' => 'alert alert-success',
		'notice' => 'alert alert-info',
	));
});

/**
 * Custom authentication component
 */

$di->set('modelsManager', function() {
	return new Phalcon\Mvc\Model\Manager();
});

$di->set('assets', function () {
	return new Assets();
});
