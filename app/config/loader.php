<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces(array(
	'Stemcord\Models' => $config->application->modelsDir,
	'Stemcord\Controllers' => $config->application->controllersDir,
	'Stemcord\Forms' => $config->application->formsDir,
	'Stemcord' => $config->application->libraryDir,
));


$loader->register();
