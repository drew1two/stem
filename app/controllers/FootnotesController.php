<?php

namespace Stemcord\Controllers;

use Phalcon\Mvc\View;

class FootnotesController extends ControllerBase
{
	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateBefore('public');

		$this->view->menu = 'footnotes';
		$this->view->subMenus = array(
			'privacy-policy',
			'terms-and-conditions',
			'disclaimer',
			'site-map',
		);
	}

	public function privacyPolicyAction()
	{
		
	}

	public function termsAndConditionsAction()
	{
		
	}

	public function disclaimerAction()
	{
		
	}

	public function siteMapAction()
	{
		
	}
}

