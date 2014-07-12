<?php

namespace Stemcord\Controllers;

use Phalcon\Mvc\View;

class PerbedaanStemcordController extends ControllerBase
{
	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateBefore('public');

		$this->view->menu = 'perbedaan-stemcord';
		$this->view->subMenus = array(
			'mengapa-stemcord',
			'keuntungan-stemcord',
			'stemcord-bonus-cover',
			'fact-netcord-accreditation',
			'langkah-langkah-penyimpanan-dengan-stemcord',
		);
	}

	public function mengapaStemcordAction()
	{
		
	}

	public function keuntunganStemcordAction()
	{
		
	}

	public function stemcordBonusCoverAction()
	{
		
	}

	public function factNetcordAccreditationAction()
	{
		
	}

	public function langkahLangkahPenyimpananDenganStemcordAction()
	{
		
	}
}

