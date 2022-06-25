<?php

class PasswordStore {
	private $file_;
	private $content_ = "";

	function __construct() {
		$this->file_ = fopen('passwd.store', 'a+');
		if (filesize('passwd.store') > 0)
			$this->content_ = fread($this->file_, filesize('passwd.store'));
	}

	function __destruct() {
		fclose($this->file_);
	}

	function create_user($username, $password) {
		$hash = password_hash($password, PASSWORD_BCRYPT);
		$line = "$username $hash\n";
		fwrite($this->file_, $line);
		$this->content_ .= $line;
	}

	function user_hash($username) {
		$re = '/' . preg_quote($username) . ' (\$.*)/';
		echo $re, "\n";
		preg_match($re, $this->content_, $m);

		print_r($m);

		if (empty($m)) {
			return null;
		} else {
			return $m[0];
		}
	}
}

class User {
	private $name_;
	private $hash_;
	private $password_store;
	

	function __construct($name) {
		$this->password_store = new PasswordStore();
		$this->name_ = $name;
		$this->hash_ = $this->password_store->user_hash($name);
	}

	function register($password) {
		if ($this->hash == null) {
			$this->password_store->create_user($this->name_, $password);
			return true;
		}

		return false;
	}

	function login($password) {
		if ($this->hash_ == null) {
			return false;
		}

		return password_verify($password, $this->hash_);
	}
}

$admin = new User('admin');
//$admin->register('lol');

?>
