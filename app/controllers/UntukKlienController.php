<?php

namespace Stemcord\Controllers;

use Phalcon\Mvc\View;

class UntukKlienController extends ControllerBase
{
	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateBefore('public');

		$this->view->menu = 'untuk-klien';
		$this->view->subMenus = array(
			'buat-enquiry',
			'tanya-dokter',
			'buat-janji',
			'kontak-kami',
		);
	}

	public function indexAction()
	{
		$this->view->setVar('linkActionUri', 'buat-enquiry');
		$this->dispatcher->forward(array(
			"controller" => "untuk-klien",
			"action" => "buatenquiry"
		));
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

