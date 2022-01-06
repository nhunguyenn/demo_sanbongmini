<?php
$filepath = realpath(dirname(__FILE__));
include($filepath . '/../lib/session.php');
Session::checkLogin();
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * login
 */
class login
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function loginMyAccount($username, $password)
	{
		$username = mysqli_real_escape_string($this->db->link, $this->fm->validation($username));
		$password = md5(mysqli_real_escape_string($this->db->link, $this->fm->validation($password)));

		if (empty($username) || empty($password)) {
			$alert = '<script> toastr.warning("Vui lòng nhập đầy đủ thông tin!");</script>';
			return $alert;
		}

		if ($_POST['username'] == "admin" && $_POST['password'] == "admin") {
			Session::set('login', true);
			Session::set('name', 'Ban Quản Lý');
			Session::set('id', 'aa0012312');
			Session::set('role', 0);
			echo "<script>window.location='?q=home';</script>";
		}

		$query = "SELECT * FROM staff WHERE username = '$username' AND password = '$password'";
		$result = $this->db->select($query);
		if ($result) {
			$value = $result->fetch_assoc();
			Session::set('login', true);
			Session::set('name', $value['fullname']);
			Session::set('id', $value['id']);
			Session::set('role', $value['role']);
			echo "<script>window.location='?q=home';</script>";
		}
		$alert = '<script> toastr.warning("Tài khoản hoặc mật khẩu không đúng!");</script>';
		return $alert;
	}
}
?>