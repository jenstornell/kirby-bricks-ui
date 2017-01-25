<?php
namespace JensTornell\Bricks;

$kirby->set('snippet', 'bricks-ui', __DIR__ . DS . 'tool-template.php');

if(! class_exists('panel')) {
	kirby()->routes(array(
		array(
			'pattern' => 'bricks-ui',
			'action'  => function() {
				snippet('bricks-ui');
			}
		),
		array(
			'pattern' => 'bricks-ui/(:all)',
			'action'  => function($folderuri) {
				//snippet('bricks-ui', array('brick' => $folderuri));
				snippet('bricks-ui', array(
					'brick' => $folderuri,
					'filename' => get('filename'),
				));
			}
		),
		/*array(
			'pattern' => 'bricks-ui/(:any)/(:all)',
			'action'  => function($filename, $folderuri) {
				snippet('bricks-ui', array('brick' => $folderuri, 'filename' => $filename));
			}
		),*/
		array(
			'pattern' => 'bricks-ui-iframe/(:any)',
			'action' => function($folderuri) {
				$Presentation = new Presentation();
				echo $Presentation->set($folderuri);
			}
		),
	));
}