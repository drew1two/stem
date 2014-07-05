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

		$uri = '/';
		if (!empty($_SERVER['REQUEST_URI'])) {
			$uriParts = explode('/', $_SERVER['REQUEST_URI']);
			$uri = $uriParts[2];
		}
		$this->view->setVar('linkDisplayName', $this->dashesToCamelCase($uri, true));
	}

	function dashesToCamelCase($string, $capitalizeFirstCharacter = false) 
	{
	    $str = ucwords(str_replace('-', ' ', $string));

	    if (!$capitalizeFirstCharacter) {
	        $str = lcfirst($str);
	    }

	    return $str;
	}
}
