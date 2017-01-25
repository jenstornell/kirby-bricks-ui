<?php
namespace JensTornell\Bricks;
use c;
use f;
use tpl;

$snippetpath = kirby()->roots()->plugins() . DS . 'kirby-bricks-ui' . DS . 'snippets';
$Config = new Config();
$Name = new Name();
$Config->set($brick);


$Presentation = new Presentation();
$html = $Presentation->set($brick);

$whitelist['text'] = array(
	'md',
	'php',
	'txt',
	//'scss',
	'less',
	'css',
	'js',
);
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<link rel="stylesheet" href="<?php echo url( 'assets/plugins/kirby-bricks-ui/css/style.css'); ?>">
	<link rel="icon" type="image/png" href="" />
</head>
<body>
<div class="page">
	<div class="main">
		<div class="bar">

			<?php echo tpl::load($snippetpath . DS . 'breadcrumbs.php', array('brick' => $brick, 'filename' => $filename)); ?>

			<div class="menu">
				<div class="menulist" data-tabs>
					<div class="menu-preview">
						<a href="javascript:void(0)">Preview</a>
					</div>
					<?php if(! empty( $filename )) : ?>
						<div class="menu-code">
							<a href="javascript:void(0)">Code</a>
						</div>
					<?php endif; ?>
					<div class="menu-html">
						<a href="javascript:void(0)">Html</a>
					</div>
				</div>
					
				<div class="menulist">
					<div class="menu-raw">
						<a href="<?php echo url('bricks-ui-iframe/' . $brick); ?>" target="_blank">Raw</a>
					</div>
				</div>
			</div>
		</div>
		<div class="preview">
			<div data-panes>
				<div>
					<iframe src="<?php echo url('bricks-ui-iframe/' . $brick); ?>"></iframe>
				</div>

				<?php if(! empty( $filename )) : ?>
					<?php
					$extension = pathinfo($filename, PATHINFO_EXTENSION);
					if( in_array( $extension, $whitelist['text'] ) ) {
						$content = f::read(root() . DS . $brick . DS . $filename);
					} else {
						$content = 'Filetype is not allowed!';
					}
					?>
					<div>
						<textarea disabled><?php echo $content; ?></textarea>
					</div>
				<?php endif; ?>
				<div>
					<textarea disabled class="html"><?php echo $html; ?></textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="sidebar">
		<div>
			<?php #echo tpl::load($snippetpath . DS . 'logo.php'); ?>

			<div data-tabs>
				<div>Bricks</div>
				<div>Files</div>
				<div>Pages</div>
				<div>Inspect</div>
			</div>

			<div data-panes>
				<div>
					<h2>Bricks</h2>
					<div class="list folders">
						<ul>
							<?php
							$Name = new Name();
							$pattern = root() . DS . '*';
							$glob = glob($pattern, GLOB_ONLYDIR);
							foreach( $glob as $path ) : ?>
								<li<?php e(basename($path) == $brick, ' class="active"'); ?>>
									<a href="<?php echo url('bricks-ui/' . basename($path)); ?>"><?php echo basename($path); ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div>
					<h2>Files</h2>
					<div class="list files">
						<ul>
							<?php
								$pattern = root() . DS . $brick . DS . '*';
								$glob = glob($pattern);
								foreach( $glob as $path ) :
									?>
									<li class="<?php e(basename($path) == $filename, 'active '); ?>">
										<a href="<?php echo url('bricks-ui/' . $brick . '?filename=' . basename($path)); ?>">
											<?php echo basename($path); ?>
										</a>
									</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div>Pages</div>
				<div>
					<?php echo tpl::load($snippetpath . DS . 'inspect.php'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo url( 'assets/plugins/kirby-bricks-ui/js/tabbis.js'); ?>"></script>
<script src="<?php echo url( 'assets/plugins/kirby-bricks-ui/js/script.js?' . time()); ?>"></script>
<script>
	var assets_url = '<?php echo kirby()->urls()->index() . '/assets/plugins/kirby-bricks-ui'; ?>';
	var tabs = tabbis.init();

	script.init();
	document.querySelector('iframe').onload = function() {
		script.renderIframe();
	};
</script>

</body>
</html>