<?php
namespace JensTornell\Bricks\UI;
use brui;
use c;

class HelperPages {
	function name() {
		$data = kirby()->get('option', 'data');
		return $data['page'];
	}

	function is() {
		if( brui::getView() == 'page' ) return true;
	}

	function all() {
		$collection = c::get('plugin.bricks.ui.pages');
		$array = array();

		if(is_a($collection, 'Collection' )) {
			foreach( $collection as $page ) {
				$array[] = $this->data($page);
			}
		} elseif( $collection ) {
			$page = $collection;
			$array[] = $this->data($page);
		}
		return $array;
	}

	function data($page) {
		$active = '';
		$sanitized = str_replace('/', '_', $page->id());
		if( ! empty( brui::pageName() ) && $sanitized == brui::pageName() ) {
			$active = ' active';
		}
		
		return (object)array(
			'class' => $active,
			'url' => brui::pageUrl(brui::brickName(), $sanitized),
			'name' => $page->title(),
		);
	}
}