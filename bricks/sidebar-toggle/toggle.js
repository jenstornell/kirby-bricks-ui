var SidebarToggle = (function () {
	var fn = {};

	fn.init = function() {
		document.addEventListener("DOMContentLoaded", fn.setSidebar);
	};

	fn.setSidebar = function() {
		var storage = localStorage.getItem('bricks.sidebar.show');
		var sidebar = document.querySelector('.sidebar');
		var toggle = document.querySelector('.sidebar-toggle');
		var main = document.querySelector('.main');

		if(storage === null || storage === 'true') {
			sidebar.classList.add('active');
			toggle.classList.remove('active');
			main.classList.remove('active');
		} else {
			sidebar.classList.remove('active');
			toggle.classList.add('active');
			main.classList.add('active');
		}

		document.querySelector('.sidebar-toggle').addEventListener("click", fn.toggleSidebar);
	};

	fn.toggleSidebar = function() {
		if( this.classList.contains('active') ) {
			localStorage.setItem('bricks.sidebar.show', 'true');
			this.classList.remove('active');
			document.querySelector('.sidebar').classList.add('active');
			document.querySelector('.main').classList.remove('active');
		} else {
			localStorage.setItem('bricks.sidebar.show', 'false');
			this.classList.add('active');
			document.querySelector('.sidebar').classList.remove('active');
			document.querySelector('.main').classList.add('active');
		}
	};

	return fn;
})();