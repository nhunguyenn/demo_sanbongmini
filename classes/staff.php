<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * staff
 */
class staff
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function setStaff($username, $fullname, $role)
    {
        $username = mysqli_real_escape_string($this->db->link, $this->fm->validation($username));
        $fullname = mysqli_real_escape_string($this->db->link, $this->fm->validation($fullname));
        $role = mysqli_real_escape_string($this->db->link, $this->fm->validation($role));
        $password = $username;

        if (empty($username) || empty($fullname) || empty($role)) {
            $alert = '<script> toastr.warning("Vui lòng nhập đầy đủ thông tin!");</script>';
            return $alert;
        }

        $query = "SELECT * FROM staff WHERE username = '$username' LIMIT 1";
        $result = $this->db->select($query);
        if ($result) {
            $alert = '<script> toastr.warning("Nhân viên đã tồn tại!");</script>';
            return $alert;
        }

        if ($role == 1) {
            $salary = 7500000;
        } else {
            $salary = 10000000;
        }

        $query = "INSERT INTO staff(username, password, fullname, salary, role) VALUES ('$username', '$password', '$fullname', '$salary', '$role')";
        $result = $this->db->insert($query);
        if ($result) {
            $alert = '<script> toastr.success("Thêm nhân viên thành công!");</script>';
            return $alert;
        }

        $alert = '<script> toastr.warning("Thêm nhân viên thất bại!");</script>';
        return $alert;
    }

    public function getStaff()
    {
        $query = "SELECT * FROM staff WHERE activate = '1' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getStaffTrash()
    {
        $query = "SELECT * FROM staff WHERE activate = '0' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getStaffId($id)
    {
        $query = "SELECT * FROM staff WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateStaff($id, $fullname, $email, $phone, $address)
    {
        $fullname = mysqli_real_escape_string($this->db->link, $this->fm->validation($fullname));
        $email = mysqli_real_escape_string($this->db->link, $this->fm->validation($email));
        $phone = mysqli_real_escape_string($this->db->link, $this->fm->validation($phone));
        $address = mysqli_real_escape_string($this->db->link, $this->fm->validation($address));

        $query = "UPDATE `staff` SET 
        `fullname`='$fullname',
        `email`='$email',
        `phone`='$phone',
        `address`='$address' WHERE id = '$id'";
        $result = $this->db->update($query);

        if ($result) {
            $alert = '<script> toastr.success("Cập nhật thành công!");</script>';
            return $alert;
        }
        $alert = '<script> toastr.warning("Cập nhật không thành công!");</script>';
        return $alert;
    }

    public function trashStaff($id)
    {
        $query = "SELECT * FROM staff WHERE id = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            $query = "UPDATE `staff` SET `activate` = 0 WHERE id = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = '<script> toastr.success("Đã chuyển vào thùng rác!");</script>';
                return $alert;
            }
            $alert = '<script> toastr.warning("Đã xóa thất bại!");</script>';
            return $alert;
        }
    }

    public function restoreStaff($id)
    {
        $query = "SELECT * FROM staff WHERE id = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            $query = "UPDATE `staff` SET `activate` = 1 WHERE id = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = '<script> toastr.success("Phục hồi thành công!");</script>';
                return $alert;
            }
            $alert = '<script> toastr.warning("Đã xóa thất bại!");</script>';
            return $alert;
        }
    }

    public function deleteStaff($id)
    {
        $query = "SELECT * FROM staff WHERE id = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            $query = "DELETE FROM staff WHERE id = '$id'";
            $result = $this->db->delete($query);

            if ($result) {
                $alert = '<script> toastr.success("Đã xóa thành công!");</script>';
                return $alert;
            }
            $alert = '<script> toastr.warning("Đã xóa thất bại!");</script>';
            return $alert;
        }
    }
}
?>