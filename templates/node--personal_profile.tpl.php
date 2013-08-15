	<?php
		//print_r($content['field_github']);
		//print_r(array_keys($content));
	?>

<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<?php print render_social_bar($content, $node); ?>

	<?php print render($content['field_avatar']); ?>

	<?php print render($title_prefix); ?>
	<?php if ($title): ?>
		<h1<?php print $title_attributes; ?>><span class="bounding-box"><?php print $title; ?>
			<?php print render($content['field_former_name']); ?></span></h1>
	<?php endif; ?>
	<?php print render($title_suffix); ?>
	
	<?php
		$field  = field_get_items('node', $node, 'field_room_number');
		$output = field_view_value('node', $node, 'field_room_number', $field[0]);
		//print_r(render($output));
	?>
	
	<div style="overflow:hidden">
		<dl class="dl-horizontal">
			<?php
				$contact_fields = array(
					'field_room_number',
					'field_office_hours',
					'field_email2',
					'field_work_phone',
					'field_work_fax',
					'field_private_phone',
				);
				
				foreach ($contact_fields as $field) {
					echo render($content[$field]);
				}
			?>
			<dt>address</dt>
			<dd>
			<address>
			Malostranské náměstí 25<br>
			118 00 Praha 1<br>
			Czech Republic
			</address>
			</dd>
		</dl>
	</div>
	
	
	<?php echo render($content['field_main_research_interests']); ?>
	<?php echo render($content['field_projects']); ?>
	<?php echo render($content['field_curriculum_vitae']); ?>
	<?php echo render($content['field_teaching']); ?>
	<?php echo render($content['field_selected_bibliography']); ?>
	<?php echo render($content['field_students']); ?>
	<?php echo render($content['body']); ?>
	
  <?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
    //print render($content);
  ?>

  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
      <?php print render($content['field_tags']); ?>
      <?php print render($content['links']); ?>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</article> <!-- /.node --><?php

function render_social_bar($content, $node) {
	$out = '';
	$social_fields = array(
			'google_scholar',
			'github',
			'linkedin',
			'twitter',
			'g_plus',
			'facebook',
	);
	$img_tx = array(
			'g_plus'         => 'icon-google-plus-sign',
			'facebook'       => 'icon-facebook-sign',
			'twitter'        => 'icon-twitter-sign',
			'linkedin'       => 'icon-linkedin-sign',
			'google_scholar' => 'icon-pencil',
			'github'         => 'icon-github',
	);
	$is_social = false;
	foreach ($social_fields as $social_field) {
		if (isset($content['field_'.$social_field])) {
			$is_social = true;
			break;
		}
	}
	if ($is_social) {
		$out .= '<div class="social-bar">';
		foreach ($social_fields as $social_field) {
			if (isset($content['field_'.$social_field])) {
				$field_items = field_get_items('node', $node, "field_$social_field");
				$href = $field_items[0]['safe_value'];
				$class = $img_tx[$social_field];
				// trailing space so it wraps
				$out .= "<a class=\"\" href=\"$href\"><i class=\"$class\"></i></a>" . ' ';
			}
		}
		$out .= '</div>';
	}
	return $out;
}
