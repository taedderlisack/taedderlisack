<?php

require __DIR__ . '/vendor/autoload.php';

class HeaderElement {
	private $key_;
	private $value_;

	function __construct($key, $value) {
		$this->key_ = $key;
		$this->value_ = $value;
	}

	function key() {
		return $this->key_;
	}

	function to_string() {
		return $this->value_;
	}

	function to_int() {
		return (int)$this->value_;
	}

	function to_list() {
		return preg_split('/\s+/', $this->value_);
	}
}

class FileHeader {
	private $map_;

	function __construct($string) {
		$lines = preg_split('/\n/', $string);

		foreach ($lines as $line) {
			$pair = preg_split('/\s*:\s*/', $line);
			if ($pair[0] != "" && count($pair) == 2) {
				$this->map_[$pair[0]] = new HeaderElement($pair[0], $pair[1]);
				$element = $this->map_[$pair[0]];
			}
		}
	}

	function item($item) {
		return $this->map_[$item];
	}
}

class MarkdownFile {
	private $content_;
	private $header_;

	function __construct($path) {
		$file = fopen($path, 'r') or die('File not Found');
		$fcontent = fread($file, filesize($path));

		$pos = strrpos($fcontent, "\n---\n");

		$header = substr($fcontent, 0, $pos + 5);
		$header = preg_replace('/---\n/', '', $header);

		$this->header_ = new FileHeader($header);

		$fcontent = substr($fcontent, $pos + 5);
		fclose($file);

		$parser = new Parsedown();
		$this->content_ = $parser->text($fcontent);
	}

	function content() {
		return $this->content_;
	}

	function header() {
		return $this->header_;
	}
}

?>
