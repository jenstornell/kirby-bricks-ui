<?php
class brui {
	private static $home = null;
	private static $brick = null;
	private static $file = null;
	private static $page = null;

	// Roots
	static function rootBricks() {
		return JensTornell\Bricks\root();
	}

	static function rootBricksUI() {
		return url(c::get('plugin.bricks.ui.path', 'bricks-ui'));
	}

	static function rootIframeBricksUI() {
		return url(c::get('plugin.bricks.ui.iframe.path', 'bricks-ui-iframe'));
	}

	// Urls
	static function brickUrl($brick = null) {
		$brick = ($brick) ? $brick : self::brickName();
		return self::rootBricksUI() . '/' . $brick;
	}

	static function fileUrl($brick = null, $file = null) {
		$brick = ($brick) ? $brick : self::brickName();
		$file = ($file) ? $file : self::fileName();
		return self::rootBricksUI() . '/' . $brick . '?file=' . $file;
	}

	static function pageUrl($brick = null, $page = null) {
		$brick = ($brick) ? $brick : self::brickName();
		$page = ($page) ? $page : self::pageName();
		return self::rootBricksUI() . '/' . $brick . '?page=' . $page;
	}

	static function pageHtmlUrl($brick = null, $page = null) {
		$brick = ($brick) ? $brick : self::brickName();
		$page = ($page) ? $page : self::pageName();
		return self::rootBricksUI() . '/' . $brick . '?page=' . $page . '&view=html';
	}

	static function viewUrl($brick = null) {
		$brick = ($brick) ? $brick : self::brickName();
		return self::rootBricksUI() . '/' . $brick . '?view=html';
	}

	static function imageUrl($image = null) {
		$image = ($image) ? $image : '';
		return self::assetsUrl() . '/img/' . $image;
	}

	static function cssUrl($css = null) {
		$css = ($css) ? $css : 'style.css';
		return self::assetsUrl() . '/css/' . $css;
	}

	static function jsUrl($js = null) {
		$js = ($js) ? $js : 'script.js';
		return self::assetsUrl() . '/js/dist/' . $js;
	}

	static function iframeBrickUrl($brick = null) {
		$brick = ($brick) ? $brick : self::brickName();
		return self::rootIframeBricksUI() . '/' . $brick . '?time=' . time();
	}

	static function iframePageUrl($brick = null, $page = null) {
		$brick = ($brick) ? $brick : self::brickName();
		$page = ($page) ? $page : self::pageName();
		return self::rootIframeBricksUI() . '/' . $brick . '?page=' . $page . '&time=' . time();
	}

	static function assetsUrl() {
		return url('assets/plugins/kirby-bricks-ui');
	}

	// Init classes
	static function initHome() {
		self::$home = new JensTornell\Bricks\UI\HelperHome();
	}

	static function initBrick() {
		self::$brick = new JensTornell\Bricks\UI\HelperBricks();
	}

	static function initFile() {
		self::$file = new JensTornell\Bricks\UI\HelperFiles();
	}

	static function initPage() {
		self::$page = new JensTornell\Bricks\UI\HelperPages();
	}

	// Names
	static function brickName() {
		self::initBrick();
		return self::$brick->name();
	}

	static function fileName() {
		self::initFile();
		return self::$file->name();
	}

	static function pageName() {
		self::initPage();
		return self::$page->name();
	}

	// Is
	static function isHome() {
		self::initHome();
		return self::$home->is();
	}

	static function isBrick() {
		self::initBrick();
		return self::$brick->is();
	}

	static function isFile() {
		self::initFile();
		return self::$file->is();
	}

	static function isPage() {
		self::initPage();
		return self::$page->is();
	}

	static function isLocked() {
		if(c::get('plugin.bricks.ui.lock', false) && !site()->user()) {
			return true;
		}
	}

	// Collections
	static function bricks() {
		self::initBrick();
		return self::$brick->all();
	}

	static function files() {
		self::initFile();
		return self::$file->all();
	}

	static function pages() {
		self::initPage();
		return self::$page->all();
	}

	// View
	static function getView() {
		$data = kirby()->get('option', 'data');
		if( empty($data) ) return 'home';
		if(! empty(brui::fileName())) return 'file';
		if(! empty(brui::pageName())) return 'page';
		if(! empty(brui::brickName())) return 'brick';
	}

	// Extension
	static function extension($filename) {
		return pathinfo($filename, PATHINFO_EXTENSION);
	}

	// Html
	static function html() {
		$data = kirby()->get('option', 'data');
		return $data['html'];
	}

	// Whitelists
	static function whitelistCode() {
		return array(
			'css',
			'js',
			'json',
			'jsonp',
			'less',
			'md',
			'php',
			'sass',
			'scss',
			'txt',
			'yml',
			'yaml'
		);
	}

	static function whitelistImage() {
		return array(
			'bmp',
			'gif',
			'jpeg',
			'jpg',
			'png',
			'svg',
			'tiff',
			'webp',
		);
	}
}