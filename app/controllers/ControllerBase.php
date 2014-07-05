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
	}
}
