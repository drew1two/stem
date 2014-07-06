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
    	$this->view->setVar('metaDescription', 'StemCord Indonesia adalah perusahaan penyelenggara jasa bank darah tali pusat terbaik di Indonesia untuk penyimpanan darah tali pusat Anda di Singapura');
    }   
    
}

