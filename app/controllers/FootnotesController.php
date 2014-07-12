<?php

namespace Stemcord\Controllers;

use Phalcon\Mvc\View;

class LayananPelangganController extends ControllerBase
{
	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateBefore('public');

		$this->view->menu = 'footnotes';
		$this->view->subMenus = array(
			'privacy-policy',
			'terms-conditions',
			'disclaimer',
			'site-map',
		);
	}

	public function privacyPolicyAction()
	{
		
	}

	public function termsConditionsAction()
	{
		
	}

	public function disclaimerAction()
	{
		
	}

	public function siteMapAction()
	{
		
	}
}

