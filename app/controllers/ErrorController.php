<?php

namespace Stemcord\Controllers;

use Phalcon\Tag;

class ErrorController extends ControllerBase
{
    public function initialize()
    {
    	parent::initialize();
        $this->view->setTemplateBefore('public');    	
	}
	
	public function show404Action()
    {
        $this->response->setHeader('404','Not Found');
        $this->view->pick('error/404');
    }
}

