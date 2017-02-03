<?php
return function($site, $pages, $page, $args) {
	$snippet = '';
	switch(brui::getView()) {
		case 'brick':
			if( empty( get('view') ) ) {
				$snippet = 'view-iframe';
			} elseif( get('view') == 'html' ) {
				$snippet = 'view-html';
			}
			break;
		case 'file':
			$snippet = 'view-file';
			break;
		case 'page':
			if( empty( get('view') ) ) {
				$snippet = 'view-iframe';
			} elseif( get('view') == 'html' ) {
				$snippet = 'view-html';
			}
			break;
		case 'home':
			$snippet = 'view-home';
			break;
	}

	return array(
		'snippet' => $snippet
	);
};