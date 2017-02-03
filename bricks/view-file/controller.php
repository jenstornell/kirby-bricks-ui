<?php
return function($site, $pages, $page, $args) {
	$code = null;
	$image = null;

	$extension = brui::extension(brui::fileName());
	$extension = strtr($extension,
		array(
			'scss' => 'sass',
			'yml' => 'yaml'
		)
	);

	if( in_array( $extension, brui::whitelistCode() ) ) {		
		$code = f::read(brui::rootBricks() . DS . brui::brickName() . DS . brui::fileName());
	} elseif( in_array($extension, brui::whitelistImage() ) ) {
		$image = url('assets/bricks/' . brui::brickName() . '/' . brui::fileName() );
	}

	return array(
		'code' => $code,
		'image' => $image,
		'extension' => $extension
	);
};