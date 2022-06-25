<?php

$md = "";

function snippet($name) {
	global $md, $config;
	include '_snippets/' . $name . '.php';
}

function layout($name) {
	global $md, $config;
	include '_layouts/' . $name . '.php';
}

function load_uri($path) {
	global $md;
	$md = new MarkdownFile($path);

	$header = $md->header();
	$layout = $header->item('layout');
	$layout_path = $md->header()->item('layout')->to_string();

	layout($layout_path);
}

function handle_uri() {
	$request = $_SERVER['REQUEST_URI'];
	$uri = 'content/' . $request;

	if (is_dir($uri)) {
		load_uri($uri . '/index.md');
	} else if (file_exists($uri . '.md')) {
		load_uri($uri . '.md');
	} else {
		load_uri('content/404.md');
	}
}

?>
