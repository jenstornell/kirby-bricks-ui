<div class="sidebar<?php e(brui::isHome(), ' active'); ?>">
	<div class="bricks overflow">
		<?php if(!empty(brui::bricks())) : ?>
		<h2>Bricks <span>(<?php echo count((array)brui::bricks()); ?>)</span></h2>
		<table>
			<?php foreach( brui::bricks() as $brick ) : ?>
				<tr class="<?php echo $brick->class; ?>">
					<td>
						<img src="<?php echo brui::imageUrl('folder-o-black.svg'); ?>">
					</td>
					<td>
						<div class="name">
							<a href="<?php echo $brick->url; ?>"><?php echo $brick->name; ?></a>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
		<?php else : ?>
			<p>No bricks found!</p>
		<?php endif; ?>
	</div>
	<?php if(!brui::isHome() ) : ?>
		<div class="halfsides">
			<div class="files overflow">
				<?php if(!empty(brui::files())) : ?>
				<h2>Files <span>(<?php echo count((array)brui::files()); ?>)</span></h2>
				<table>
					<?php foreach( brui::files() as $file ) : ?>
						<tr class="<?php echo $file->class; ?>">
							<td>
								<img src="<?php echo $file->icon; ?>">
							</td>
							<td>
								<div class="name">
									<a href="<?php echo $file->url; ?>"><?php echo $file->name; ?></a>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<?php else : ?>
					<p>No files found!</p>
				<?php endif; ?>
			</div>
			<div class="pages overflow">
				<?php if(!empty(brui::pages())) : ?>
					<h2>Pages <span>(<?php echo count((array)brui::pages()); ?>)</span></h2>
					<table>
						<?php foreach(brui::pages() as $page) : ?>
							<tr class="<?php echo $page->class; ?>">
								<td>
									<img src="<?php echo brui::imageUrl('angle-right-black.svg'); ?>">
								</td>
								<td>
									<div class="name">
										<a href="<?php echo $page->url; ?>"><?php echo $page->name; ?></a>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				<?php else : ?>
					<p>No pages found!</p>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
</div>