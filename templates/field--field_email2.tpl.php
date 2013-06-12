<dt>email</dt>
<dd>
<?php
	foreach ($items as $delta => $item) {
		$mail = $item['#markup'];
		//echo "<a href=\"mailto:$mail\">$mail</a>";
		echo render($item);
	}
?>
<dd>
