<?php
include_once('DBConfig.php');
class User extends DBConfig {
	public function __construct() {
		parent::__construct();
	}
	public function loginValidate($username,$password) {
		$sql="SELECT * FROM author WHERE username='".$username."' AND password='".$password."'";
		$result=$this->conn->query($sql);
		if ($result == false || !((mysqli_num_rows($result)) == 1)) {
			return false;
		}
		$author=array();
		while ($row = $result->fetch_assoc()) {
			$author[]=$row;
			# code...
		}
		return $author;
	}
}