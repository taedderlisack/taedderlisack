<?php

class PasswordStore {
	private $file_;
	private $content_ = "";

	public function __construct() {
		$this->file_ = fopen('_data/passwd.store', 'a+');
		if (filesize('_data/passwd.store') > 0)
			$this->content_ = fread($this->file_, filesize('_data/passwd.store'));
	}

	public function __destruct() {
		fclose($this->file_);
	}

	public function create_user($username, $password) {
		$hash = password_hash($password, PASSWORD_BCRYPT);
		$line = "$username $hash\n";
		fwrite($this->file_, $line);
		$this->content_ .= $line;
	}

	public function user_hash($username) {
		$re = '/^' . preg_quote($username) . ' (\$.*)$/';
		preg_match($re, $this->content_, $m);

		if (empty($m)) {
			return null;
		} else {
			return $m[1];
		}
	}
}

class User {
	private $name_;
	private $hash_ = null;
	private $password_store;
	private $logged_in = false;
	

	public function __construct() {
		$this->password_store = new PasswordStore();

		if (isset($_REQUEST['user']))
			$_SESSION['username'] = $_REQUEST['user'];

		if (isset($_SESSION['username']))
			$this->name_ = $_SESSION['username'];

		if ($this->name_ != null)
			$this->hash_ = $this->password_store->user_hash($this->name_);
		
		if (isset($_SESSION['logged_in']))
			$this->logged_in = $_SESSION['logged_in'];

		if (isset($_REQUEST['password'])) {
			$_SESSION['logged_in'] = $this->login($_REQUEST['password']);
		}
	}

	public function register($password) {
		if ($this->hash_ == null) {
			$this->password_store->create_user($this->name_, $password);
			return true;
		}

		return false;
	}

	public function login($password) {
		if ($this->hash_ == null) {
			return false;
		}

		$this->logged_in = password_verify($password, $this->hash_);

		return $this->logged_in;
	}

	public function logged_in() {
		return $this->logged_in;
	}
}

$user;

function handle_session() {
	global $user;

	session_start();

	if (isset($_REQUEST['logout'])) {
		session_destroy();
		echo '<meta http-equiv="refresh" content="0;url=/">';
	}

	$user = new User();

	if ($user->logged_in()) {
		require 'src/admin.php';
	}
}

?>
