<?php

namespace Stemcord\Controllers;

use Phalcon\Mvc\Controller,
	Phalcon\Mvc\Dispatcher;

/**
 * ControllerBase
 *
 * This is the base controller for all controllers in the application
 */
class ControllerBase extends Controller
{
	protected function initialize()
	{
		$this->view->setVar('phoneSimple', '021-520-6555/6');
		$this->view->setVar('faxSimple', '021-520-6551');
		$this->view->setVar('phoneCall', '+62215206555');
		$this->view->setVar('companyName', 'Stemcord Indonesia');
	}
}
