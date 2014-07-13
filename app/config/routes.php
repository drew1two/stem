<?php

$router = new Phalcon\Mvc\Router(); //Class Phalcon\Mvc\Router public __construct ([boolean $defaultRoutes])

//$router->add('/([a-z\-]+)', array(
      //'controller' => 1
//));

$router->add('/([a-zA-Z\-]+)/([a-zA-Z\-]+)/:params', array(
    'controller' => 1,
    'action' => 2,
    'params' => 3
))->convert('action', function($action) {
    return Phalcon\Text::lower(Phalcon\Text::camelize($action));
    //return $action;
});

return $router;
