<?php if((brui::isBrick() && empty(get('view'))) || brui::isPage()) : ?>
	<div class="inspect">
		<div class="background switch<?php e($active->background, ' active'); ?>" data-inspect="background" data-value="<?php echo $value->background; ?>">
			<div class="icon">
				<img src="<?php echo brui::imageUrl('check-white.svg'); ?>">
			</div>
			<div class="title">Background</div>
		</div>

		<div class="padding switch<?php e($active->margin, ' active'); ?>" data-inspect="margin">
			<div class="icon">
				<img src="<?php echo brui::imageUrl('check-white.svg'); ?>">
			</div>
			<div class="title">Margin</div>
			
		</div>

		<div class="outline switch<?php e($active->outline, ' active'); ?>" data-inspect="outline">
			<div class="icon">
				<img src="<?php echo brui::imageUrl('check-white.svg'); ?>">
			</div>
			<div class="title">Outline</div>
		</div>
	</div>
<?php endif; ?>