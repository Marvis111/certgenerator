<?php
$serverName = 'localhost';
$username = 'root';
$password = '';
$dbName = 'ecert';
session_start();

try {
	$conn = mysqli_connect($serverName,$username,$password,$dbName);
} catch (Exception $e) {
	if ($e) {
		echo "unable to connect to db: ".$e;
	}
}

/**
 * 
 */

$errorArr = array();

class newUser{

	private $username;
	private $userEmail;
	private $userPwd;
	 public $validated;

	private function checkname($name){
		if (empty($name)) {
			array_push($GLOBALS["errorArr"], 'Username is required');
			return False;
		} else {
			$this->username = htmlspecialchars(stripslashes(trim($name)));
			return True;
		}
	}
	public function checkemail($email){
		if (empty($email)) {
			array_push($GLOBALS["errorArr"], 'Email is required');
			return False;
		}
		elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			array_push($GLOBALS["errorArr"], 'Invalid Email Address');
			return False;
		}else{
			$this->userEmail = $email;
			return True;
		};
		
	}
	public  function checkPwd($userPwd){
		if (empty($userPwd)) {
			array_push($GLOBALS["errorArr"], 'Password is required.');
			return False;
		} else {
			$this->userPwd = $userPwd;
			return True;
		}
	}
	public function enc_pwd(){
		$encPwD = password_hash($this->userPwd, PASSWORD_DEFAULT);
		return $encPwD;
	}
	public function dec_pwd($pwd,$hashed){
			$res = password_verify($pwd, $hashed);
			if ($res == 1) {
				return True;
			} else {
				return False;
			}
	}

	function __construct($username,$userEmail,$userPwd){
		if($this->checkname($username) && $this->checkemail($userEmail) && $this->checkPwd($userPwd)){
			$name = $this->username;
			$email = $this->userEmail;
			$pwd = $this->enc_pwd();
			$sql = "INSERT INTO userlogin(username,email,password)
					VALUES('$name','$email','$pwd') ";
			$query = mysqli_query($GLOBALS['conn'],$sql);
			if ($query) {
				$_SESSION['username'] = $name;
				$_SESSION['email'] = $email;
				header('location:../views/index.php');
			}
	}
}
}


if (isset($_POST['signup'])) {
new newUser($_POST['user_name'],$_POST['user_email'],$_POST['user_pwd']);
	
}
//login...
/**
 * 
 */
class Users extends newUser
{
	function __construct($userEmail,$userPwd)
	{
		if ($this->checkemail($userEmail) && $this->checkPwd($userPwd)) {
			$sql = "SELECT * FROM userlogin WHere email = '$userEmail' ";
			$query = mysqli_query($GLOBALS['conn'],$sql);
			if ($query) {
				$rowCount = mysqli_num_rows($query);
				if ($rowCount == 1) {
					$row = mysqli_fetch_assoc($query);
					$passWordVerified = $this->dec_pwd($userPwd,$row['password']);
					
					if ($passWordVerified) {
						print_r($row);
						$_SESSION['username'] = $row['username'];
						$_SESSION['email'] = $row['email'];
						header('location:../views/index.php');
					}else{
						array_push($GLOBALS["errorArr"], 'Wrong Email/Password combinations.');
					}
				}else{
						array_push($GLOBALS["errorArr"], 'Wrong Email/Password combinations.');
				}
			}
		}
	}
}

if (isset($_POST['login'])) {
	new Users($_POST['user_email'],$_POST['user_pwd']);
}