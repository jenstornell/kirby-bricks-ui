var SwitchToggle = (function () {
	var fn = {};

	fn.init = function() {
		fn.switchEvent();
	};

	fn.switchEvent = function() {
		var switchElements = document.querySelectorAll('.switch');
		for( var i=0; i < switchElements.length; i++) {
			var switchElement = switchElements[i];
			switchElement.addEventListener("click", fn.switch);
		}
		
	};

	fn.switch = function() {
		if(this.classList.contains('active')) {
			this.classList.remove('active');
		} else {
			this.classList.add('active');
		}

		fn.renderIframe();
	};

	fn.renderIframe = function() {
		var iframe = document.querySelector('iframe');
		var body = iframe.contentDocument.querySelector('body');
		if( body.querySelector('#config') !== null ) {
			body.querySelector('#config').remove();
		}

		var style = fn.getInspectValues();
		body.innerHTML = body.innerHTML + style;
	};

	fn.getInspectValues = function() {
		var switchElements = document.querySelectorAll('.switch');
		var style = '';
		for( var i = 0; i < switchElements.length; i++ ) {
			var switchElement = switchElements[i];
			var type = switchElement.getAttribute('data-inspect');
			var value = switchElement.getAttribute('data-value');
			var transparent = "\tbackground-image: url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 8 8'%3E%3Cg fill='%23ccc' fill-opacity='0.58'%3E%3Cpath fill-rule='evenodd' d='M0 0h4v4H0V0zm4 4h4v4H4V4z'/%3E%3C/g%3E%3C/svg%3E\")!important;\n";
			if(switchElement.classList.contains('active')) {	
				switch(type) {
					case 'background':
						if( value == 'transparent') {
							style += "\tbackground-color: #fff;\n";
							style += transparent;
						} else {
							style += "\tbackground: " + value + " !important;\n";
						}
						break;
					case 'margin':
						style += "\tmargin: 50px !important;\n";
						break;
					case 'outline':
						style += "\toutline: 1px solid red !important;\n";
						break;
				}
			} else {
				switch(type) {
					case 'background':
						style += "\tbackground-color: #fff;\n";
						style += transparent;
						break;
				}
			}
		}
		style = "\n<style id='config'>\nbody {\n" + style + "}\n</style>\n";
		return style;
	};

	return fn;
})();