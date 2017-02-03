<?php if( brui::isBrick() ) : ?>
	<div class="tab<?php e(empty(get('view')), ' active'); ?>">
		<a href="<?php echo brui::brickUrl(); ?>"><span>Preview</span></a>
	</div>
	<div class="tab<?php e(get('view') == 'html', ' active'); ?>">
		<a href="<?php echo brui::viewUrl(); ?>">Html</a>
	</div>
	<div class="tab">
		<a href="<?php echo brui::iframeBrickUrl(); ?>">
			Raw
		</a>
	</div>
<?php endif; ?>