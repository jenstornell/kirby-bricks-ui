<?php if(!brui::isHome()) : ?>
	<div class="bar type-<?php echo brui::getView(); ?>">
		<div class="overflow">
			<?php snippet('bricks-ui-back'); ?>
			<?php snippet('bricks-ui-inspect'); ?>
			<?php snippet('bricks-ui-sidebar-toggle'); ?>
			<?php snippet('bricks-ui-tabs'); ?>
		</div>
	</div>
<?php endif; ?>