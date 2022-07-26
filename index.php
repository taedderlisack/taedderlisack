<?php

set_include_path(__DIR__);

$config = parse_ini_file('_data/config.ini');

define('URL', preg_replace('/^index.php$/', '/', $_GET['u']));

require 'src/markdown_file.php';
require 'src/uri.php';
require 'src/config.php';

handle_uri();

?>
