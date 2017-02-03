<?php
namespace JensTornell\Bricks\UI;
use c;
use brui;

class Config {
	function set($brick = null) {
		$this->prefix = 'plugin.bricks.ui.';
		$this->config_path = brui::rootBricks() . DS . $brick . DS . 'ui.config.php';
		$this->loadConfig();
		$this->setValues();
	}

	function loadConfig() {
		if( file_exists($this->config_path) ) {
			require_once $this->config_path;
		}
	}

	function setValue($key, $default) {
		c::set($key, c::get($key, $default));
	}

	function setValues() {
		$defaults = array(
			'background' => 'transparent',
			'margin' => false,
			'outline' => false,
			'pages' => page(c::get('home','home')),
		);
		foreach( $defaults as $key => $value ) {
			$this->setValue($this->prefix . $key, $value);
		}
	}
}