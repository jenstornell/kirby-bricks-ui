<?php
?>
<style id='config'>
	body {
		<?php if(c::get('plugin.bricks.ui.background') == 'transparent' || !c::get('plugin.bricks.ui.background')) : ?>
			background-color: #fff;
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 8 8'%3E%3Cg fill='%23ccc' fill-opacity='0.58'%3E%3Cpath fill-rule='evenodd' d='M0 0h4v4H0V0zm4 4h4v4H4V4z'/%3E%3C/g%3E%3C/svg%3E")!important;
		<?php else : ?>
			background: <?php echo c::get('plugin.bricks.ui.background'); ?> !important;
		<?php endif ?>
		<?php if(c::get('plugin.bricks.ui.margin')) : ?>
			margin: 50px !important;
		<?php elseif(c::get('plugin.bricks.ui.margin') !== false) : ?>
			margin: <?php echo c::get('plugin.bricks.ui.margin'); ?> px !important;
		<?php endif; ?>
		<?php if( c::get('plugin.bricks.ui.outline') === true ) : ?>
			outline: 1px solid red !important;
		<?php endif; ?>
	}
</style>