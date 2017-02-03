var SidebarToggle = (function () {
	var fn = {};

	fn.init = function() {
		document.querySelector('.sidebar-toggle').addEventListener("click", fn.toggleSidebar);
	};

	fn.toggleSidebar = function() {
		if( this.classList.contains('active') ) {
			this.classList.remove('active');
			document.querySelector('.sidebar').classList.add('active');
			document.querySelector('.main').classList.remove('active');
		} else {
			this.classList.add('active');
			document.querySelector('.sidebar').classList.remove('active');
			document.querySelector('.main').classList.add('active');
		}
	};

	return fn;
})();