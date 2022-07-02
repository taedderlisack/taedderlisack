<?php

class Example extends Plugin {
	private $content;
	private $name;
	function __construct($name) {
		$this->name = $name;
		parent::__construct();
		$file = fopen("_data/example_{$name}.txt", 'r');
		$this->content = fread($file, fileSize("_data/example_{$name}.txt"));
		fclose($file);
	}

	function update($data) {
		echo $data;
		$wfile = fopen("_data/example_{$this->name}.txt", 'w');
		fwrite($wfile, $data);
		$this->content = $data;
		fclose($wfile);
	}

	function front() {
		echo "<span>{$this->content}</span>";
	}

	function back() {
		echo "<input onchange='update_element({$this->id})(this)' value='{$this->content}'></input>";
	}
}

Plugin::register('example', function($path) {
	$example = new Example($path);
	$example->render();
	return $example;
})

?>
