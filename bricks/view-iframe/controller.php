<?php
return function($site, $pages, $page, $args) {
	$url = brui::iframeBrickUrl();
	if( ! empty( get('page') ) ) {
		$unsanitized = str_replace('_', '/', get('page'));
		$url .= '&page=' . page($unsanitized)->id();
	}
	return array(
		'url' => $url
	);
};