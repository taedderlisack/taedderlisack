<?php

$config = parse_ini_file('config.ini');

$md = "";

function snipped($name) {
	global $md, $config;
	include $config['html'] . '/' . $name . '.php';
}

function load_uri($path) {
	global $md, $config;
	$md = new MarkdownFile($path);

	$header = $md->header();
	$layout = $header->item('layout');
	$layout_path = $md->header()->item('layout')->to_string();

	snipped($layout_path);
}

function handle_uri() {
	global $config;
	$request = $_SERVER['REQUEST_URI'];
	$uri = $config['markdown'] . '/' . $request;

	if (is_dir($uri)) {
		load_uri($uri . '/index.md');
	} else if (file_exists($uri . '.md')) {
		load_uri($uri . '.md');
	} else {
		load_uri($config['markdown'] . '/404.md');
	}
}

?>
