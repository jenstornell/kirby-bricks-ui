<?php
$active['background'] = false;
$active['margin'] = false;
$active['outline'] = false;
if( c::get('plugin.bricks.ui.background') != 'transparent') {
	$active['background'] = true;
	$value = c::get('plugin.bricks.ui.background');
} else {
	$value = '#fff';
}
if( c::get('plugin.bricks.ui.margin') === true) {
	$active['margin'] = true;
}
if( c::get('plugin.bricks.ui.outline') === true) {
	$active['outline'] = true;
}
?>

<div class="section">
	<h3>Background</h3>
	<div class="switch<?php e($active['background'], ' active'); ?>" data-inspect="background" data-value="<?php echo $value; ?>">
		<div class="switch-action"></div>
	</div>
</div>

<div class="section">
	<h3>Margin</h3>
	<div class="switch<?php e($active['margin'], ' active'); ?>" data-inspect="margin">
		<div class="switch-action"></div>
	</div>
</div>

<div class="section">
	<h3>Outline</h3>
	<div class="switch<?php e($active['outline'], ' active'); ?>" data-inspect="outline">
		<div class="switch-action"></div>
	</div>
</div>