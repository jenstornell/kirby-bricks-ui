<?php
namespace JensTornell\Bricks;
use c;

class Css {
	function get() {
		if( is_array( c::get('plugin.bricks.ui.css') ) ) {
			$html = '';
			foreach( c::get('plugin.bricks.ui.css') as $css ) {
				$html .= '<link href="' . $css . '" rel="stylesheet">' . "\n";
			}
			return $html;
		}
	}

	/*function inline() {
		$html = '';
		$html .= "\n\n<style id='config'>\n";
		$html .= "body {\n";
		$html .= $this->background();
		$html .= $this->padding();
		$html .= $this->outline();
		$html .= "}\n";
		$html .= "</style>\n\n";
		return $html;
	}

	function outline() {
		$html = '';
		if( c::get('plugin.bricks.ui.outline') === true ) {
			$html .= "\toutline: 1px solid red !important;\n";
		}
		return $html;
	}

	function padding() {
		$html = '';
		if( c::get('plugin.bricks.ui.margin') === true ) {
			$html .= "\tpadding: 50px !important;\n";
		} elseif( c::get('plugin.bricks.ui.margin') !== false ) {
			$html .= "\tpadding: " . c::get('plugin.bricks.ui.margin') . "px !important;\n";
		}
		return $html;
	}

	function background() {
		$html = '';
		if( c::get('plugin.bricks.ui.background') == 'transparent' ) {
			$html .= "\tbackground: url('" . kirby()->urls()->index() . "/assets/plugins/kirby-bricks-ui/img/transparent.gif" . "') !important;\n";
		} else {
			$html .= "\tbackground: " . c::get('plugin.bricks.ui.background') . " !important;\n";
		}
		return $html;
	}*/
}