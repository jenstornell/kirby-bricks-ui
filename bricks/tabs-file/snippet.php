<?php if(brui::isFile()) : ?>
	<div class="tab active">
		<a href="<?php echo brui::fileUrl(); ?>">
			<?php if( in_array( brui::extension(brui::fileName()), brui::whitelistCode() ) ) : ?>
				Code
			<?php elseif( in_array( brui::extension(brui::fileName()), brui::whitelistImage() ) ) : ?>
				Image
			<?php else : ?>
				Info
			<?php endif; ?>
		</a>
	</div>
<?php endif; ?>