<?php
namespace JensTornell\Bricks\UI;
use brui;

class HelperBricks {
	function name() {
		$data = kirby()->get('option', 'data');
		return $data['brick'];
	}

	function is() {
		if( brui::getView() == 'brick' ) return true;
	}

	function all() {
		$pattern = brui::rootBricks() . DS . '*';
		$glob = glob($pattern, GLOB_ONLYDIR);

		$array = array();
		if(!empty($glob)) {
			foreach( $glob as $path ) {
				$active = '';
				if(!empty( brui::brickName() ) && basename($path) == brui::brickName()) {
					$active = ' active';
				}
				$array[] = (object)array(
					'class' => $active,
					'url' => brui::brickUrl(basename($path)),
					'name' => basename($path),
				);
			}
		}
		return $array;
	}
}