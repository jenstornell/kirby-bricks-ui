<?php
namespace JensTornell\Bricks\UI;
use c;

class Page {
	public function set() {
		$collection = c::get('plugin.bricks.ui.pages');

		if( ! empty( get('page') ) ) {
			$page = page(str_replace('_', '/', get('page')));
		} elseif( is_a($collection, 'Collection' )) {
			$page = $collection->shuffle()->first();
		} elseif( $collection ) {
			$page = $collection;
		}

		if( isset( $page ) ) return $page;
	}
}