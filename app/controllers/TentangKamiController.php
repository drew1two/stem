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
    	$this->view->setVar('metaDescription', 'StemCord Indonesia adalah perusahaan penyelenggara jasa bank darah tali pusat terbaik di Indonesia untuk penyimpanan darah tali pusat Anda di Singapura');
    }

    public function layananKamiAction()
    {
    	$this->view->setVar('metaDescription', 'StemCord Indonesia memberikan layanan yang lengkap untuk membantu Anda menyimpan, memproses dan menggunakan darah tali pusat Anda');
    }
    
}

