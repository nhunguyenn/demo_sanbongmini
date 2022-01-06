<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * place
 */
class place
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function setPlace($fullname, $phone, $date_order, $email, $sport, $time, $deposit, $description)
    {
        $fullname = mysqli_real_escape_string($this->db->link, $this->fm->validation($fullname));
        $phone = mysqli_real_escape_string($this->db->link, $this->fm->validation($phone));
        $date_order = mysqli_real_escape_string($this->db->link, $this->fm->validation($date_order));
        $email = mysqli_real_escape_string($this->db->link, $this->fm->validation($email));
        $sport = mysqli_real_escape_string($this->db->link, $this->fm->validation($sport));
        $time = mysqli_real_escape_string($this->db->link, $this->fm->validation($time));
        $deposit = mysqli_real_escape_string($this->db->link, $this->fm->validation($deposit));
        $description = mysqli_real_escape_string($this->db->link, $this->fm->validation($description));

        if (empty($fullname) || empty($phone) || empty($date_order) || empty($sport) || empty($time) || empty($deposit)) {
            $alert = '<script> toastr.warning("Vui lòng nhập đầy đủ thông tin!");</script>';
            return $alert;
        }

        $query = "INSERT INTO `orders`(`fullname`, `phone`, `date_order`, `email`, `sport`, `time`, `deposit`, `description`) 
        VALUES ('$fullname', '$phone', '$date_order', '$email', '$sport', '$time', '$deposit', '$description')";
        $result = $this->db->insert($query);

        if ($result) {
            $alert = '<script> toastr.success("Thêm đặt sân thành công!");</script>';
            return $alert;
        }

        $alert = '<script> toastr.warning("Thêm đặt sân thất bại!");</script>';
        return $alert;
    }

    public function getOrderId($id)
    {
        $query = "SELECT orders.id as id, orders.fullname, orders.phone, date_order, email, sport.name as name_sport, 
        time.start as start_time, time.end as end_time, orders.time as time ,orders.deposit, description FROM orders, sport, 
        time WHERE orders.sport = sport.id AND orders.time = time.id AND activate = '1' AND orders.id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getOrder()
    {
        $query = "SELECT orders.id as id, orders.fullname, orders.phone, date_order, email, sport.name as name_sport, 
        time.start as start_time, time.end as end_time, orders.deposit, description FROM orders, sport, 
        time WHERE orders.sport = sport.id AND orders.time = time.id AND activate = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getSport()
    {
        $query = "SELECT * FROM sport ORDER BY price ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getTime()
    {
        $query = "SELECT * FROM time ORDER BY start ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function payment($idOrder, $idStaff)
    {
        $idOrder = mysqli_real_escape_string($this->db->link, $this->fm->validation($idOrder));
        $idStaff = mysqli_real_escape_string($this->db->link, $this->fm->validation($idStaff));

        $query = "UPDATE `orders` SET `activate`='0' WHERE id = '$idOrder'";
        $result = $this->db->update($query);

        if ($result) {
            $query = "INSERT INTO `bills`(`staff`, `customer`, `activate`) VALUES ('$idStaff','$idOrder','1')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = '<script> toastr.success("Hủy đặt sân thành công!");</script>';
                return $alert;
            }
        }

        $alert = '<script> toastr.warning("Hủy đặt sân thất bại!");</script>';
        return $alert;
    }

    public function getOrderTrash()
    {
        $query = "SELECT orders.id as id, orders.fullname, orders.phone, date_order, email, sport.name as name_sport, 
        time.start as start_time, time.end as end_time, orders.deposit, description FROM orders, sport, 
        time WHERE orders.sport = sport.id AND orders.time = time.id AND activate = '0'";
        $result = $this->db->select($query);
        return $result;
    }
    public function restoreOrder($id)
    {
        $query = "SELECT * FROM orders WHERE id = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            $query = "UPDATE `orders` SET `activate` = 1 WHERE id = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = '<script> toastr.success("Phục hồi thành công!");</script>';
                return $alert;
            }
            $alert = '<script> toastr.warning("Đã xóa thất bại!");</script>';
            return $alert;
        }
    }
    public function deleteOrder($id)
    {
        $query = "SELECT * FROM orders WHERE id = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            $query = "DELETE FROM orders WHERE id = '$id'";
            $result = $this->db->delete($query);

            if ($result) {
                $alert = '<script> toastr.success("Đã xóa thành công!");</script>';
                return $alert;
            }
            $alert = '<script> toastr.warning("Đã xóa thất bại!");</script>';
            return $alert;
        }
    }

    public function updateOrder($id, $date_order, $time)
    {
        $date_order = mysqli_real_escape_string($this->db->link, $this->fm->validation($date_order));
        $time = mysqli_real_escape_string($this->db->link, $this->fm->validation($time));

        if (empty($date_order)) {
            $query = "UPDATE `orders` SET `time`='$time' WHERE id = '$id'";
        } else {
            $query = "UPDATE `orders` SET `date_order`='$date_order', `time`='$time' WHERE id = '$id'";
        }
        $result = $this->db->update($query);

        if ($result) {
            $alert = '<script> toastr.success("Cập nhật thành công!");</script>';
            return $alert;
        }
        $alert = '<script> toastr.warning("Cập nhật không thành công!");</script>';
        return $alert;
    }
    public function gettrash()
    {
        $query = "SELECT orders.id as id, orders.fullname, orders.phone, date_order, email, sport.name as name_sport, 
        time.start as start_time, time.end as end_time, orders.deposit, description FROM orders, sport, 
        time WHERE orders.sport = sport.id AND orders.time = time.id AND activate = '0'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>