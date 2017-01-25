var script = (function () {
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

		//console.log(iframe.contentDocument.querySelector('html'));
		//console.log(assets_url);
		//fn.htmlToTab(iframe);
	};

	fn.htmlToTab = function(iframe) {
		var html = iframe.contentDocument.querySelector('html');
		document.querySelector('textarea.html').innerHTML = html.outerHTML;
	};

	fn.getInspectValues = function() {
		var switchElements = document.querySelectorAll('.switch');
		var style = '';
		for( var i = 0; i < switchElements.length; i++ ) {
			var switchElement = switchElements[i];
			var type = switchElement.getAttribute('data-inspect');
			var value = switchElement.getAttribute('data-value');
			if(switchElement.classList.contains('active')) {	
				switch(type) {
					case 'background':
						if( value == 'transparent') {
							style += "\tbackground: url('" + assets_url + "/img/transparent.gif') !important;\n";
						} else {
							style += "\tbackground: " + value + " !important;\n";
						}
						break;
					case 'margin':
						style += "\tmargin: 40px !important;\n";
						break;
					case 'outline':
						style += "\toutline: 1px solid red !important;\n";
						break;
				}
			} else {
				switch(type) {
					case 'background':
						style += "\tbackground: url('" + assets_url + "/img/transparent.gif') !important;\n";
						break;
				}
			}
		}
		style = "\n<style id='config'>\nbody {\n" + style + "}\n</style>\n";
		return style;
	};

	return fn;
})();