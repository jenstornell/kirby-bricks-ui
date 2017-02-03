<?php
return function($site, $pages, $page, $args) {
	$seo_title = '';
	switch(brui::getView()) {
		case 'brick':
			if( empty( get('view') ) ) {
				$seo_title = brui::brickName() . ' - Preview';
			} elseif( get('view') == 'html' ) {
				$seo_title = brui::brickName() . ' - Html';
			}
			break;
		case 'file':
			$seo_title = brui::brickName() . '/' . brui::fileName();
			break;
		case 'page':
			$page_name = str_replace('_', '/', brui::pageName());
			if( empty( get('view') ) ) {
				$seo_title = brui::brickName() . ' - ' . $page_name;
			} elseif( get('view') == 'html' ) {
				$seo_title = brui::brickName() . ' - ' . $page_name . ' - Html';
			}
			break;
		case 'home':
			$seo_title = 'Home';
			break;
	}
	return array(
		'seo_title' => $seo_title . ' - Bricks UI'
	);
};