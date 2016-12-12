<?php

$configuration = array();

$configuration['pathApplication'] = dirname(__FILE__) . '/';

$configuration['includeDirectories'] = array(
	$configuration['pathApplication'],
	$configuration['pathApplication'] . '../motivado-api/',
	$configuration['pathApplication'] . '../nacho/'
);

$configuration['Database'] = array(
	'type' => 'MySql',
	'host' => 'localhost',
	'name' => 'motivado',
	'user' => 'motivado',
	'password' => ''
);

$configuration['host'] = 'http://localhost';
$configuration['baseUrl'] = $configuration['host'] . '/motivado-test/';
$configuration['cheeseUrl'] = $configuration['host'] . '/cheese/';
$configuration['playerUrl'] = $configuration['host'] . '/motivado-player/';
$configuration['videoUrl'] = $configuration['host'] . '/motivado-videos/';
$configuration['uiUrl'] = $configuration['host'] . '/motivado-ui/';

$configuration['debugMode'] = TRUE;
