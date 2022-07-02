<?php

abstract class Plugin {
	protected static $registered;
	protected static $create_functions;
	protected static $id_seed = 1;
	protected static $update_data = [0, null];
	protected $id;

	protected function __construct() {
		$this->id = self::$id_seed;
		self::$id_seed++;
		self::$registered[$this->id] = $this;

		if ($this->id == self::$update_data[0]) {
			$this->update(self::$update_data[1]);
		}
	}

	public static function register($name, $f) {
		self::$create_functions[$name] = $f;
	}

	public static function update_instance($id, $data) {
		self::$update_data = [$id, $data];
	}

	public static function create($name) {
		return self::$create_functions[$name];
	}

	public function render() {
		global $user;
		if (isset($_SESSION['mode']) && $_SESSION['mode'] == 'edit') {
			echo $this->back();
		} else {
			echo $this->front();
		}
	}

	abstract public function update($data);
	abstract public function front();
	abstract public function back();
}

$dir = new DirectoryIterator('_plugin');

foreach ($dir as $file) {
	if ($file->isFile() && $file->getExtension() == 'php') {
		include '_plugin/' . $file->getFilename();
	}
}

?>
