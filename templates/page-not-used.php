<div class="container"><div class="paper-sheet">

<header class="site-header clearfix" style="font-family: 'Anaheim', sans-serif;">
	<a class="cuni" href="http://www.cuni.cz/">
	<?php
		$params = array(
			'path'  => drupal_get_path('theme', 'drufal') . '/css/logo/logo-uk-red.png',
			'alt'   => 'Logo UK',
			'title' => 'Charles University in Prague',
		);
		echo theme('image', $params); ?>
	</a>
	<a href="http://www.mff.cuni.cz/">
	<?php
		$params = array(
			'path'  => drupal_get_path('theme', 'drufal') . '/css/logo/logo_mff_103.png',
			'alt'   => 'Logo MFF',
			'title' => 'Faculty of Mathematics and Physics',
		);
		echo theme('image', $params); ?>
	</a>
	<a class="ufal" href="/">
	<?php
		$params = array(
			'path'  => drupal_get_path('theme', 'drufal') . '/css/logo/logo_ufal_110.png',
			'alt'   => 'Logo UFAL',
			'title' => 'Institute of Formal and Applied Linguistics',
		);
		echo theme('image', $params); ?>
	</a>
	<h1>Institute of Formal and Applied&nbsp;Linguistics</h1>
	<h2>Charles University in Prague, Czech Republic<br>
		Faculty of Mathematics and Physics</h2>
</header>

<div class="navbar navbar-default <?php if (!@$suppress_own_menu && (@$always_sub_nav || !empty($sub_nav))) echo 'with-subnav';?>">
	<div class="container-fluid navbar-inverse">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">ÚFAL</a>
		</div>

		<div class="collapse navbar-collapse" id="navbar-collapse-1">
		<?php if ($primary_nav || $secondary_nav || !empty($page['navigation'])): ?>
				<?php
					if ($primary_nav) {
						print render($primary_nav);
					}
					if (!empty($page['navigation'])) {
						//print render($page['navigation']);
					}
					if ($secondary_nav) {
						//print render($secondary_nav);
					}
				?>
				<?php
					$block = module_invoke('search', 'block_view', 'form');
					print render($block);
				?>
		<?php endif; ?>
		</div>
	</div>

	<?php if (!@$suppress_own_menu && @$always_sub_nav) { ?>
		<div class="container-fluid sub_nav">
			<div class="navbar-header">
				<a class="navbar-brand" href="/<?php echo $project_url?>/"><?php echo $project_acronym; ?></a>
			</div>

			<div class="collapse navbar-collapse" id="navbar-collapse-2">
				<?php echo render($sub_nav); ?>
				<?php if (isset($back_to)) { ?>
					<ul class="navbar-nav nav pull-right">
						<li><a class="navbar-nav" href="<?php echo $back_to['url']; ?>"><?php echo $back_to['title']; ?></a></li>
					</ul>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
</div>

<?php if ($messages): ?>
	<div id="messages"><div class="section clearfix">
	<?php print $messages; ?>
	</div></div> <!-- /.section, /#messages -->
<?php endif; ?>

<?php if ($page['highlighted']) { ?>
	<div id="highlighted"><?php print render($page['highlighted']); ?></div>
<?php } ?>

<a id="main-content"></a>
<?php if ($tabs) { ?>
	<div class="tabs"><?php print render($tabs); ?></div>
<?php } ?>
<?php print render($title_prefix); ?>
<?php
	$is_taxonomy_term = (arg(0) == 'taxonomy' && arg(1) == 'term');
?>
<?php if ($is_taxonomy_term && $title) { ?>
	<h1 class="title" id="page-title"><?php print $title; ?></h1>
<?php } ?>

<?php print render($title_suffix); ?>
<?php print render($page['help']); ?>
<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
<?php print render($page['content']); ?>

<hr style="clear:both">

<footer class="clearfix">
	<?php require_once drupal_get_path('theme', 'drufal') . '/templates/footer.php'; ?>
</footer>

</div></div> <!-- /container && /papersheet -->
