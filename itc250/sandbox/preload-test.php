<?php
//preload-test.php

$FirstName = 'Steve';
$LastName = 'Rogers';
$Color = 'blue';
?>

<h1>Preloading Forms</h1>
<input type="text" name="FirstName" value="<?=$FirstName?>">
<p><input type="radio" name="Color" value="red" <?=checkValue($Color,'red');?> >Red</p>
<p><input type="radio" name="Color" value="blue" <?=checkValue($Color,'blue');?> >Blue</p>
<p><input type="radio" name="Color" value="yellow" <?=checkValue($Color,'yellow');?> >Yellow</p>


<?php
function checkValue($var,$val)
{//preloads data
	if($var == $val)
	{
		return ' checked="checked" ';
	}else{
		return '';
	}
}
?>