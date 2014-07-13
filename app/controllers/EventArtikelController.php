<?php

namespace Stemcord\Controllers;

use Phalcon\Mvc\View;

class EventArtikelController extends ControllerBase
{
	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateBefore('public');

		$this->view->menu = 'event-artikel';
		$this->view->subMenus = array(
			'event',
			'artikel',
			'siaran-pers',
		);
	}

	public function indexAction()
	{
		$this->view->setVar('linkActionUri', 'event');
		$this->dispatcher->forward(array(
			"controller" => "event-artikel",
			"action" => "event"
		));
	}

	public function eventAction()
	{
		
	}

	public function artikelAction()
	{
		
	}

	public function siaranPersAction()
	{
		
	}
}

