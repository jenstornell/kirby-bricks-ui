<?php
namespace JensTornell\Bricks\UI;
use c;
use brui;

class Autoload {
	public function set($brick) {
		$this->brick = $brick;
		$this->folderpath = kirby()->roots()->bricks() . DS . $this->brick;
		$this->type = $this->setType();

		if( $this->has('ui.template.php') && $this->type == 'snippet' ) {
			return $this->folderpath . DS . 'ui.template.php';
		} elseif( $this->type == 'template') {
			return $this->folderpath . DS . 'template.php';
		} else {
			return __DIR__ . DS . '..' . DS . 'bricks' . DS . 'template' . DS . 'template.php';
		}
	}

	public function setType() {
		$type = '';
		if($this->has('template.php')) {
			$type = 'template';
		} elseif($this->has('snippet.php')) {
			$type = 'snippet';
		} elseif($this->has($this->brick . '.html.php')) {
			$type = 'module';
		}
		return $type;
	}

	public function has($file) {

		if( file_exists( $this->folderpath . DS . $file ) ) {
			return true;
		}
	}
}