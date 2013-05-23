<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<div class="social-bar">
    <a class="" href="#"><i class="icon-twitter-sign"></i></a>
    <a class="" href="#"><i class="icon-facebook-sign"></i></a>
    <a class="" href="#"><i class="icon-linkedin-sign"></i></a>
    <a class="" href="#"><i class="icon-github"></i></a>
    <a class="" href="#"><i class="icon-google-plus-sign"></i></a>
    <a class="" href="#"><i class="icon-pencil"></i></a>
	</div>
	
	<?php print render($content['field_avatar']); ?>

	<?php print render($title_prefix); ?>
	<?php if ($title): ?>
		<h1<?php print $title_attributes; ?>><?php print $title; ?></h1>
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
					'field_email',
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
	<?php echo render($content['field_curriculum_vitae']); ?>
	<?php echo render($content['field_teaching']); ?>
	<?php echo render($content['field_selected_bibliography']); ?>
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

</article> <!-- /.node -->
