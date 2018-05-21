<?php
$cb=array('cb1','cb2','cb3','cb4');
$i=0;
while($i<4)
{
	echo "<select name='$cb[$i]'><option value='present'>present</option><option value='absent'>absent</option></select>";
	echo $cb[$i];
	$i++;
}
?>
