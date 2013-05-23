<?php
global $user;
if ($user->uid) {
?>
<dt>private</dt>
<dd>
<?php
	 foreach ($items as $delta => $item) {
		echo render($item). '<br>'; 
	}
?>
<dd>
<?php } ?> 
