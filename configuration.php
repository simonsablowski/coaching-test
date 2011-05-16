<?php

$configuration = array();

$configuration['pathApplication'] = dirname(__FILE__) . '/';

$configuration['includeDirectories'] = array(
	$configuration['pathApplication'],
	'D:/Entwicklung/api/',
	'D:/Entwicklung/nacho/'
);

$configuration['Database'] = array(
	'type' => 'MySql',
	'host' => 'localhost',
	'name' => 'motivado_importer',
	'user' => 'root',
	'password' => ''
);

$configuration['baseUrl'] = 'http://localhost/coaching-test/';
$configuration['cheeseUrl'] = 'http://localhost/cheese/';
$configuration['host'] = 'http://motivado.local';

$configuration['debugMode'] = TRUE;