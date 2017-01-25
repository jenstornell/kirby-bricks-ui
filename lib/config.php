<?php
namespace JensTornell\Bricks;
use c;

class Config {
	function set($folderuri) {
		$this->prefix = 'plugin.bricks.ui.';
		$this->config_path = root() . DS . $folderuri . DS . 'ui-config.php';
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
			'css' => 'assets/css/style.css',
			'hide' => false,
			'js' => 'assets/css/script.js',
			'lock' => true,
			'margin' => false,
			'outline' => false,
			'page' => page(c::get('home','home')),
			'path' => 'bricks-ui',
			'presentation' => 'ui-presentation',
		);
		foreach( $defaults as $key => $value ) {
			$this->setValue($this->prefix . $key, $value);
		}
	}
}