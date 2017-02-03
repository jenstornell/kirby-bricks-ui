<?php
namespace JensTornell\Bricks\UI;
use c;

class Controller {
	public function get($folderuri) {
		$this->folderpath = kirby()->roots()->bricks() . DS . $folderuri;

		if( $this->has('ui.controller.php') ) {
			$callback = include $this->folderpath . DS . 'ui.controller.php';
			$data = $callback();
			return $data;
		}
	}

	public function setBrick($folderuri) {
		$Name = new \JensTornell\Bricks\Name();
		return $Name->byFolder($folderuri);
	}

	public function has($file) {
		if( file_exists( $this->folderpath . DS . $file ) ) {
			return true;
		}
	}

	public function css() {
		$html = "\n\n";
		if( is_array( c::get('plugin.bricks.ui.css') ) ) {
			foreach( c::get('plugin.bricks.ui.css') as $css ) {
				$html .= '<link href="' . $css . '" rel="stylesheet">' . "\n";
			}
		}
		return $html;
	}

	public function js() {
		$html = "\n\n";
		if( is_array( c::get('plugin.bricks.ui.js') ) ) {
			foreach( c::get('plugin.bricks.ui.js') as $js ) {
				$html .= '<script src="' . $js . '"></script>' . "\n";
			}
		}
		return $html;
	}

	public function setData($folderuri) {
		$data = array();
		$data = $this->get($folderuri);
		$data['brick']['css'] = $this->css();
		$data['brick']['js'] = $this->js();
		$data['brick']['name'] = $this->setBrick($folderuri);
		$data['brick'] = (object)$data['brick'];
		return $data;
	}
}