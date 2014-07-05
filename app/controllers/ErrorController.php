<?php

namespace Stemcord\Controllers;

use Phalcon\Tag;

class ErrorController extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {
    	$this->view->setTemplateBefore('private');    	
	}
	
	public function show404Action()
    {
        $this->response->setHeader('HTTP/1.0 404','Not Found');
        $this->view->pick('error/404');
    }
}

