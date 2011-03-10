<?php
		include_once 'config.php';
		$page_title = 'SQLcraft - Template';
		$page = 'template';
		include_once ''.$sc_path_fs.'tpl1.php';
?>
Make a copy of the contents of this file.<br />
Replace the value of the $page variable with the CASE SENSITIVE folder name used for your module.<br />
Replace the value of $page_title with your pages title.<br />
Remember to correct the path of config.php; that path changes depending on where the the file accessing it is.<br />
Don't forget to include_once any module specific config files (should be config.php in the module's folder).<br />
Do NOT touch the include_once's for tpl1.php and tpl2.php; these load the SQLcraft template around a module.<br />
<?php include_once ''.$sc_path_fs.'tpl2.php'; ?>