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
		$this->view->setVar('phoneFullTag', '<a href="tel:+62215206555"><span class="lightblue">(021) 520-6555/6</span></a>');
		$this->view->setVar('companyName', 'StemCord Indonesia');
		$this->view->setVar('putJavascriptAtTop', 'false');
		$this->view->setVar('emailFullTag', '<a href="mailto:info@stemcord.co">info@stemcord.co</a>');

		$uri = '';
		$title = 'Bank Darah Tali Pusat';
		if ($controller = $this->dispatcher->getControllerName() != 'error') {
			if (!empty($_SERVER['REQUEST_URI'])) {
				$uriParts = explode('/', $_SERVER['REQUEST_URI']);
				if (count($uriParts) >= 3) {
					$uri = $uriParts[2];
					$title = \Stemcord\Utils\LinkUtil::displayFromDash($uri);
				}
			}
		} else {
			$title = '';
		}
		$this->view->setVar('linkActionUri', $uri);
		$this->view->setVar('title', $title);
		$this->view->setVar('metaDescription', '');
	}

	
}
