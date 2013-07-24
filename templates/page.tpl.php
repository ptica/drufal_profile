<?php
	$project = _node_to_project($node);
	$project_url = drupal_lookup_path('alias', 'node/'.$project->nid);
	$menu_name   = _project_to_menu_name($project);
	$project_nav =  menu_tree($menu_name);
	$has_own_menu = !empty($project_nav);
?>
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
		<h1>Institute of Formal and Applied Linguistics</h1>
		<h2>Faculty of Mathematics and Physics</h2>,<br>
		<h2>Charles University in Prague, Czech Republic</h2>
	</header>
	
	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<?php if ($has_own_menu) { ?>
					<ul class="nav">
						<li>
							<a class="nav" href="/<?php echo $project_url?>/">Profile</a>
						</li>
					</ul>
				<?php } ?>
				<div class="nav-collapse">
					<nav role="navigation">
					<?php
						if ($has_own_menu) {
							$project_nav['#theme_wrappers'] = array('menu_tree__primary');
							print render($project_nav);
						} else {
							if ($primary_nav) {
								print render($primary_nav);
							}
							if (!empty($page['navigation'])) {
								//print render($page['navigation']);
							}
							if ($secondary_nav) {
								//print render($secondary_nav);
							}
						}
					?>
					</nav>
				</div>
				<?php if ($has_own_menu) { ?>
					<ul class="nav pull-right">
						<li>
							<a class="nav" href="/">back to ÚFAL ↩</a>
						</li>
					</ul>
				<?php } ?>
			</div>
		</div>
	</div>

	<?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
	<a id="main-content"></a>
	<?php print render($title_prefix); ?>
	<?php if (0 && $title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
	<?php print render($title_suffix); ?>
	<?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
	<?php print render($page['help']); ?>
	<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
	<?php print render($page['content']); ?>

	<hr>

	<footer class="clearfix">
		<?php //print render($page['footer']); ?></a>
		<?php require_once drupal_get_path('theme', 'drufal') . '/templates/footer.php'; ?>
	</footer>

	</div></div> <!-- /container && /papersheet -->

	<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
