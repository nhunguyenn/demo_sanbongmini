<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * decentralization
 */
class decentralization
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function updateRole($username, $role)
    {
        $username = mysqli_real_escape_string($this->db->link, $this->fm->validation($username));
        $role = mysqli_real_escape_string($this->db->link, $this->fm->validation($role));
        if (empty($username) || empty($role)) {
            $alert = '<script> toastr.warning("Vui lòng nhập đầy đủ thông tin!");</script>';
            return $alert;
        }

        $query = "SELECT * FROM staff WHERE username = '$username' LIMIT 1";
        $result = $this->db->select($query);
        if (!$result) {
            $alert = '<script> toastr.warning("Người dùng không tồn tại!");</script>';
            return $alert;
        }

        if ($role == 1) {
            $salary = 7500000;
        } else {
            $salary = 10000000;
        }

        $query = "UPDATE `staff` SET  `role`='$role', `salary`='$salary' WHERE username = '$username'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = '<script> toastr.success("Cập nhật thành công!");</script>';
            return $alert;
        }
        
        $alert = '<script> toastr.warning("Cập nhật không thành công!");</script>';
        return $alert;
    }
}
?>