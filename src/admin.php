<?php

global $URL;
global $_POST;
global $_REQUEST;


if (isset($_POST['edit-toggle'])) {
	$_SESSION['mode'] = $_SESSION['mode'] == 'edit' ? 'view' : 'edit';
	unset($_POST);
	echo '<meta http-equiv="refresh" content="0;url=' . $URL . '">';
	exit;
}

if ($URL == '/ajax') {
	var_dump($_POST);
	Plugin::update_instance($_POST['id'], $_POST['data']);
	$URL = $_POST['url'];
}


include 'src/update_ajax.php';
include 'src/admin/navbar.php';

?>
