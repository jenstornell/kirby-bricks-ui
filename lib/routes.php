<?php
namespace JensTornell\Bricks\UI;
use c;
use brui;
use header;
use response;

if(!class_exists('panel')) {
	kirby()->routes(array(
		array(
			'pattern' => c::get('plugin.bricks.ui.path', 'bricks-ui'),
			'action'  => function() {

				if(brui::isLocked()) {
					return new Response(snippet('bricks-ui-locked', [], true), 'html', 404);
				} else {
					return new Response(snippet('bricks-ui-wrap', [], true), 'html', 200);
				}
			}
		),
		array(
			'pattern' => c::get('plugin.bricks.ui.path', 'bricks-ui') . '/(:all)',
			'action'  => function($brick) {
				if(brui::isLocked()) {
					return new Response(snippet('bricks-ui-locked', [], true), 'html', 404);
				} else {
					$Config = new Config();
					$Config->set($brick);

					$array = array(
						'brick' => $brick,
						'file' => get('file'),
						'page' => get('page'),
					);

					if( get('view') == 'html') {
						$Template = new Template();
						$html = $Template->set($brick);
						$array['html'] = $html;
					}

					kirby()->set('option', 'data', $array);
					return new Response(snippet('bricks-ui-wrap', [], true), 'html', 200);
				}
			}
		),
		array(
			'pattern' => c::get('plugin.bricks.ui.iframe.path', 'bricks-ui-iframe') . '/(:any)',
			'action' => function($brick) {
				if(brui::isLocked()) {
					return new Response(snippet('bricks-ui-locked', [], true), 'html', 404);
				} else {
					$Config = new Config();
					$Config->set($brick);
					$Template = new Template();
					return new Response($Template->set($brick), 'html', 200);
				}
			}
		),
	));
}