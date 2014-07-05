<?php

return new \Phalcon\Config(array(
	'database' => array(
		'adapter'     => 'MySql',
		'host'        => '127.0.0.1',
		'username'    => 'root',
		'password'    => 'somepass',
		'dbname'      => 'somedb',
	),
	'application' => array(
		'controllersDir' => __DIR__ . '/../../app/controllers/',
		'modelsDir'      => __DIR__ . '/../../app/models/',
		'formsDir'       => __DIR__ . '/../../app/forms/',
		'viewsDir'       => __DIR__ . '/../../app/views/',
		'libraryDir'     => __DIR__ . '/../../app/library/',
		'pluginsDir'     => __DIR__ . '/../../app/plugins/',
		'cacheDir'       => __DIR__ . '/../../app/cache/',
		'baseUri'        => 'http://yourwebsite/',
		'publicUrl'		 => 'yourwebsite',
		'cryptSalt'		 => '83kj83902346sdfwer'
	),	
));
