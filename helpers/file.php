<?php
namespace JensTornell\Bricks\UI;
use brui;

class HelperFiles {
	function name() {
		$data = kirby()->get('option', 'data');
		return $data['file'];
	}

	function is() {
		if( brui::getView() == 'file' ) return true;
	}

	function all() {
		$pattern = brui::rootBricks() . DS . brui::brickName() . DS . '*.*';
		$glob = glob($pattern);
		$array = array();

		if( ! empty( $glob ) ) {
			foreach( $glob as $path ) {
				$extension = brui::extension(basename($path));
				if( in_array( $extension, brui::whitelistImage() ) ) {
					$icon = 'file-image-o-black.svg';
				} else {
					$icon = 'file-o-black.svg';
				}
				$active = '';
				if( ! empty( brui::fileName() ) && basename($path) == brui::fileName() ) {
					$active = ' active';
				}
				$array[] = (object)array(
					'class' => $active,
					'url' => brui::fileUrl(brui::brickName(), basename($path)),
					'name' => basename($path),
					'icon' => brui::imageUrl($icon)
				);
			}
		}
		return $array;
	}
}