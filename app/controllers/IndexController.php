<?php

namespace Stemcord\Controllers;

class IndexController extends ControllerBase
{
	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateBefore('public');
	}
	
	
    public function indexAction()
    {
    	
    }   
    
}

