<div id="myCarousel" class="carousel slide <?php print $classes; ?>" <?php print $attributes; ?>>
	<ol class="carousel-indicators">
		<?php if (count($items) > 1) foreach ($items as $delta => $item) { ?>
			<li data-target="#myCarousel" data-slide-to="<?php print $delta ?>" class="<?php print $delta == 0 ? 'active' : ''; ?>"></li>
		<?php } ?>
	</ol>
	<!-- Carousel items -->
	<div class="carousel-inner">
		<?php foreach ($items as $delta => $item) { ?>
			<div class="item field-item <?php print $delta == 0 ? 'active' : ''; ?>"<?php print $item_attributes[$delta]; ?>><?php print render($item); ?></div>
		<?php } ?>
	</div>
</div>
