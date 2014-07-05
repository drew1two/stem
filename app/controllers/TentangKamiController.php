<?php

namespace Stemcord\Controllers;

class TentangKamiController extends ControllerBase
{
	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateBefore('public');

		$this->view->menu = 'tentang-kami';
		$this->view->subMenus = array(
			'tentang-stemcord', 
			'layanan-kami',
			'pendiri',
			'sejarah',
			'akreditasi',
			'fasilitas',
			'video-kami',
			'karir',
		);
	}
	
	public function indexAction()
	{

	}

    public function tentangStemcordAction()
    {
    	
    }

    public function layananKamiAction()
    {

    }
    
}

