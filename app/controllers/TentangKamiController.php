<?php

namespace Stemcord\Controllers;

class TentangKamiController extends ControllerBase
{
	public function initialize()
	{
		$this->view->setTemplateBefore('public');
	}
	
	public function indexAction()
	{

	}

    public function tentangStemcordAction()
    {
    	$this->view->pick('tentangkami/tentangstemcord');
    	echo 'test';
    }
    
}

