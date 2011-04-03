<?php
	$page = 'IRC.php';
	$path = realpath('');

	if (strpos($path,'auth')=== false){}
		else {$page = '../IRC.php';}
	if (strpos($path,'modules')=== false){}
		else {$page = '../../IRC.php';}
?>
<a class="footer" href="#IRC" onclick='window.open("<?php echo $page; ?>","","width=620,height=400")'>
	Support IRC
</a>