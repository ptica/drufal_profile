<?php $sis_teaching_url = get_sis_teaching_url($element); ?>
<h2>Teaching</h2>
<blockquote class="teaching-bar">
<?php
	if ($sis_teaching_url) {
		echo "<a class=\"sis-teaching-url\" href=\"$sis_teaching_url\">List of classes</a>";
	}
	foreach ($items as $delta => $item) {
		echo render($item); 
	}
?>
</blockquote><?php
	function get_sis_teaching_url($element) {
		$node = $element['#object'];
		$field_items = field_get_items('node', $node, "field_sis_id");
		if (count($field_items)) {
			$sis_code = $field_items[0]['safe_value'];
			$sis_teaching_url = "http://is.cuni.cz/studium/predmety/redir.php?redir=sezn_ucit&kod=$sis_code";
			return $sis_teaching_url;
		}
	}
