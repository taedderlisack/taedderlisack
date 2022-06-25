<?php

set_include_path(__DIR__);

$config = parse_ini_file('config.ini');

require 'src/markdown_file.php';
require 'src/uri.php';
require 'src/config.php';

handle_uri();

?>
