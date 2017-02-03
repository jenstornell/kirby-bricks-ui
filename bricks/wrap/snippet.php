<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title><?php echo $seo_title; ?></title>

	<link rel="stylesheet" href="<?php echo brui::cssUrl(); ?>">
	<link rel="icon" type="image/png" href="<?php echo brui::imageUrl('favicon.png'); ?>" />
</head>
<body>
<div class="page">
	<?php snippet('bricks-ui-main'); ?>
	<?php snippet('bricks-ui-sidebar'); ?>
</div>

<script src="<?php echo brui::jsUrl() . '?time=' . time(); ?>"></script>
<script>
	var assets_url = '<?php echo brui::assetsUrl(); ?>';
	<?php if(!brui::isHome()) : ?>
	SidebarToggle.init();
	<?php endif; ?>
	SwitchToggle.init();
</script>
</body>
</html>