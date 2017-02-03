<?php
// Helpers
require_once __DIR__ . DS . 'helpers' . DS . 'home.php';
require_once __DIR__ . DS . 'helpers' . DS . 'brick.php';
require_once __DIR__ . DS . 'helpers' . DS . 'file.php';
require_once __DIR__ . DS . 'helpers' . DS . 'page.php';

// Lib
require_once __DIR__ . DS . 'lib' . DS . 'autoload.php';
require_once __DIR__ . DS . 'lib' . DS . 'config.php';
require_once __DIR__ . DS . 'lib' . DS . 'controller.php';
require_once __DIR__ . DS . 'lib' . DS . 'helpers.php';
require_once __DIR__ . DS . 'lib' . DS . 'page.php';
require_once __DIR__ . DS . 'lib' . DS . 'render.php';
require_once __DIR__ . DS . 'lib' . DS . 'routes.php';
require_once __DIR__ . DS . 'lib' . DS . 'template.php';

// Register bricks
foreach( glob(__DIR__ . DS . 'bricks' . DS . '*', GLOB_ONLYDIR ) as $path ) {
	$name = basename($path);
	if($name == 'template') continue;

	$kirby->set(
		'brick',
		$name,
		$path
	);
}