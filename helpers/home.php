<?php
namespace JensTornell\Bricks\UI;
use brui;

class HelperHome {

	function is() {
		if( brui::getView() == 'home' ) return true;
	}
}