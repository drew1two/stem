<?php

namespace Stemcord\Controllers;

use Phalcon\Mvc\View;

class LayananPelangganController extends ControllerBase
{
	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateBefore('public');

		$this->view->menu = 'untuk-pelanggan';
		$this->view->subMenus = array(
			'buat-enquiry',
			'tanya-dokter',
			'buat-janji',
			'kontak-kami',
		);
	}

	public function buatEnquiryAction()
	{
		
	}

	public function tanyaDokterAction()
	{
		
	}

	public function buatJanjiAction()
	{
		
	}

	public function kontakKamiAction()
	{
		
	}
}

