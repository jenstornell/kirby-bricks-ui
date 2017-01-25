<?php
namespace JensTornell\Bricks;
use c;

class Presentation {
	public function set($folderuri) {
		$this->Config = new Config();
		$this->Config->set($folderuri);

		$this->Css = new Css();
		$this->cssHtml = $this->Css->get();
		//$this->inlineCss = $this->Css->inline();

		$this->folderuri = $folderuri;
		$this->brick = $this->setBrick();
		$this->folderpath = kirby()->roots()->bricks() . DS . $this->folderuri;
		$this->hasPresentation = $this->has('ui-presentation.php');

		$this->type = $this->setType();
		$this->controller = $this->controller();
		$this->page = $this->setPage();
		$this->data = $this->setData();

		$this->presentationTemplate = $this->setPresentationTemplate();

		return $this->render();
	}

	public function has($file) {
		if( file_exists( $this->folderpath . DS . $file ) ) {
			return true;
		}
	}

	public function setPage() {
		if( isset( $this->controller['page'] ) ) {
			return $this->controller['page'];
		}
		return page(c::get('plugin.bricks.ui.page'));
	}

	public function setBrick() {
		$Name = new Name();
		return $Name->byFolder($this->folderuri);
	}

	public function setData() {
		$data = array();
		if( isset( $this->controller['page'] ) ) {
			$data = $this->controller;
		}
		$data['brick']['name'] = $this->brick;
		$data['brick']['css'] = $this->cssHtml;

		$data['brick'] = (object)$data['brick'];
		return $data;
	}

	public function setPresentationTemplate() {
		if( $this->has('ui-presentation.php') && $this->type == 'snippet' ) {
			return $this->folderpath . DS . 'ui-presentation.php';
		} elseif( $this->type == 'template') {
			return $this->folderpath . DS . 'template.php';
		} else {
			return __DIR__ . DS . 'presentation-template.php';
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

	public function render() {
		$render = new Render(kirby());
		$output = $render->render(
			$this->presentationTemplate,
			$this->data,
			$this->page
		);
		//$output = $this->inlineCss($output);
		return $output;
	}

	public function inlineCss($output) {
		return str_replace('</body>', $this->inlineCss . '</body>', $output);
	}

	public function controller() {
		if( $this->has('ui-controller.php') ) {
			$callback = include $this->folderpath . DS . 'ui-controller.php';
			$data = $callback();
			return $data;
		}
	}
}