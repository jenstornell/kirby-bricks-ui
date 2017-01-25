<div class="breadcrumbs">
	<div class="breadcrumb-home">
		<a href="<?php echo url('bricks-ui'); ?>">Bricks UI</a>
	</div>
	<div class="breadcrumb-arrow">
		<?php echo '&gt;'; ?>
	</div>
	<div class="breadcrumb-brick">
		<a href="<?php echo url('bricks-ui/' . $brick); ?>"><?php echo $brick; ?></a>
	</div>
	<?php if( ! empty( $filename ) ) : ?>
		<div class="breadcrumb-arrow">
			<?php echo '&gt;'; ?>
		</div>
		<div class="breadcrumb-filename">
			<a href="<?php echo url('bricks-ui/' . $brick . '?filename=' . $filename); ?>">
				<?php echo $filename; ?>
			</a>
		</div>
	<?php endif; ?>
</div>