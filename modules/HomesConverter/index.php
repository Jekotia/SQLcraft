<?php
	$db = '../../sqlcraft.db';
	session_start();
	$ignore_redirect = false;
	include_once '../../init.php';
	$page_title = 'Homes Converter - Overview';
	$page = 'HomesConverter';
	include_once '../../tpl1.php';
?>
Make a copy of the contents of this file.<br />
Replace the value of the $page variable with the CASE SENSITIVE folder name used for your module.<br />
Replace the value of $page_title with your pages title.<br />
Remember to correct the path of config.php; that path changes depending on where the the file accessing it is.<br />
Don't forget to include_once any module specific config files (should be config.php in the module's folder).<br />
Do NOT touch the include_once's for tpl1.php and tpl2.php; these load the SQLcraft template around a module.<br />
<?php include_once '../../tpl2.php'; ?>