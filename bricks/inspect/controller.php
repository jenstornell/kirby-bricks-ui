<?php
return function($site, $pages, $page, $args) {
	$value = array();
	if(c::get('plugin.bricks.ui.background') == 'transparent' || !c::get('plugin.bricks.ui.background')) {
		$active['background'] = false;
		$value['background'] = '#fff';
	} else {
		$active['background'] = true;
		$value['background'] = c::get('plugin.bricks.ui.background');
	}

	$active['margin'] = (c::get('plugin.bricks.ui.margin')) ? true : false;
	$active['outline'] = (c::get('plugin.bricks.ui.outline')) ? true : false;

	return array(
		'active' => (object)$active,
		'value' => (object)$value
	);
};