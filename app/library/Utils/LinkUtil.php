<?php

namespace Stemcord\Utils;

use Phalcon\Mvc\User\Component;

/**
 * Stemcord\Utils\LinkUtil
 *
 */
class LinkUtil extends Component
{
	public function displayFromDash($dashLink)
    {
	    $str = ucwords(str_replace('-', ' ', $dashLink));

	    return $str;
    }
}
