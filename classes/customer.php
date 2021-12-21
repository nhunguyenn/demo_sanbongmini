<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * customer
 */
class customer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function setCustomer($username, $fullname, $phone)
    {
        $username = mysqli_real_escape_string($this->db->link, $this->fm->validation($username));
        $fullname = mysqli_real_escape_string($this->db->link, $this->fm->validation($fullname));
        $phone = mysqli_real_escape_string($this->db->link, $this->fm->validation($phone));
        $password = md5($username);

        if (empty($username) || empty($fullname) || empty($phone)) {
            $alert = '<script> toastr.warning("Vui lòng nhập đầy đủ thông tin!");</script>';
            return $alert;
        }

        $query = "SELECT * FROM customer WHERE username = '$username' LIMIT 1";
        $result = $this->db->select($query);
        if ($result) {
            $alert = '<script> toastr.warning("Khách hàng đã tồn tại!");</script>';
            return $alert;
        }

        $query = "INSERT INTO customer(username, password, fullname, phone) VALUES ('$username', '$password', '$fullname', '$phone')";
        $result = $this->db->insert($query);
        if ($result) {
            $alert = '<script> toastr.success("Thêm khách hàng thành công!");</script>';
            return $alert;
        }

        $alert = '<script> toastr.warning("Thêm khách hàng thất bại!");</script>';
        return $alert;
    }

    public function getCustomer()
    {
        $query = "SELECT * FROM customer WHERE activate = '1' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getCustomerTrash()
    {
        $query = "SELECT * FROM customer WHERE activate = '0' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getCustomerId($id)
    {
        $query = "SELECT * FROM customer WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateCustomer($id, $fullname, $phone)
    {
        $fullname = mysqli_real_escape_string($this->db->link, $this->fm->validation($fullname));
        $phone = mysqli_real_escape_string($this->db->link, $this->fm->validation($phone));

        $query = "UPDATE `customer` SET 
        `fullname`='$fullname',
        `phone`='$phone' WHERE id = '$id'";
        $result = $this->db->update($query);

        if ($result) {
            $alert = '<script> toastr.success("Cập nhật thành công!");</script>';
            return $alert;
        }
        $alert = '<script> toastr.warning("Cập nhật không thành công!");</script>';
        return $alert;
    }

    public function trashCustomer($id)
    {
        $query = "SELECT * FROM customer WHERE id = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            $query = "UPDATE `customer` SET `activate` = 0 WHERE id = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = '<script> toastr.success("Đã chuyển vào thùng rác!");</script>';
                return $alert;
            }
            $alert = '<script> toastr.warning("Đã xóa thất bại!");</script>';
            return $alert;
        }
    }

    public function restoreCustomer($id)
    {
        $query = "SELECT * FROM customer WHERE id = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            $query = "UPDATE `customer` SET `activate` = 1 WHERE id = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = '<script> toastr.success("Phục hồi thành công!");</script>';
                return $alert;
            }
            $alert = '<script> toastr.warning("Đã xóa thất bại!");</script>';
            return $alert;
        }
    }

    public function deleteCustomer($id)
    {
        $query = "SELECT * FROM customer WHERE id = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            $query = "DELETE FROM customer WHERE id = '$id'";
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