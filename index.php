<html>
	<head>
		<title>n8</title>
	</head>
	<body>
<?php

require './src/markdown_file.php';

$md = new MarkdownFile('content/example.md');
$header = $md->header();
$tag = $header->item('tag');

echo $md->content();

echo $_SERVER['REQUEST_URI'];

?>
	</body>
	</html>
