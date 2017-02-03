<?php if(brui::isPage()) : ?>
	<div class="tab<?php e(empty(get('view')), ' active'); ?>">
		<a href="<?php echo brui::pageUrl(); ?>">Preview</a>
	</div>
	<div class="tab<?php e(get('view') == 'html', ' active'); ?>">
		<a href="<?php echo brui::pageHtmlUrl(); ?>">Html</a>
	</div>
	<div class="tab">
		<a href="<?php echo brui::iframePageUrl(); ?>">Raw</a>
	</div>
<?php endif; ?>