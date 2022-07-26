<?php

set_include_path(__DIR__);

$config = parse_ini_file('_data/config.ini');

$URL = $_SERVER['REQUEST_URI'];

require 'src/markdown_file.php';
require 'src/uri.php';
require 'src/config.php';
require 'src/session.php';
require 'src/plugin.php';

handle_session();

if (uri_is_path('login')) {
	require 'src/login.php';
} else {
	handle_uri();
}


?>
