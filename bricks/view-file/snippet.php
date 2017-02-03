<?php if( ! empty( $code ) ) : ?>
	<div class="code">
		<pre><code class="language-<?php echo $extension; ?>"><?php echo htmlspecialchars($code); ?></code></pre>
	</div>
<?php elseif( ! empty( $image )) : ?>
	<div class="image">
		<img src="<?php echo $image; ?>">
	</div>
<?php else : ?>
	<div class="code">
		<pre><code class="language-text">Filetype is missing or not allowed!</code></pre>
	</div>
<?php endif; ?>