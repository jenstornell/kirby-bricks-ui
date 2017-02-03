<?php
namespace JensTornell\Bricks\UI;
use c;

class Template {
	public function set($brick) {
		$this->Page = new Page();
		$this->page = $this->Page->set();

		$this->Controller = new Controller();
		$this->data = $this->Controller->setData($brick);

		$this->path = kirby()->roots()->bricks() . DS . $brick;

		$this->Autoload = new Autoload();
		$this->file = $this->Autoload->set($brick);

		return $this->render();
	}

	public function has($file) {
		if( file_exists($this->path . DS . $file)) {
			return true;
		}
	}

	public function render() {
		$render = new Render(kirby());

		$output = $render->render(
			$this->file,
			$this->data,
			$this->page
		);

		$output = $this->replaceCss($output);

		return $output;
	}

	public function replaceCss($output) {
		return str_replace('</body>', snippet('bricks-ui-css', [], true) . '</body>', $output);
	}
}