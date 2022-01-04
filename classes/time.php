<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
class time
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function setTime($start, $end)
    {
        $start = mysqli_real_escape_string($this->db->link, $this->fm->validation($start));
        $end = mysqli_real_escape_string($this->db->link, $this->fm->validation($end));

        if (empty($start) || empty($end)) {
            $alert = '<script> toastr.warning("Vui lòng nhập đầy đủ thông tin!");</script>';
            return $alert;
        }
        $query = "INSERT INTO time(start, end) VALUES ('$start', '$end')";
        $result = $this->db->insert($query);
        if ($result) {
            $alert = '<script> toastr.success("Thêm khung giờ thành công!");</script>';
            return $alert;
        }

        $alert = '<script> toastr.warning("Thêm khung giờ thất bại!");</script>';
        return $alert;
    }
        
    public function getTime()
    {
        $query = "SELECT * FROM time ORDER BY start ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getTimeId($id)
    {
        $query = "SELECT * FROM time WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateTime($id, $start, $end)
    {
        $start = mysqli_real_escape_string($this->db->link, $this->fm->validation($start));
        $end = mysqli_real_escape_string($this->db->link, $this->fm->validation($end));

        $query = "UPDATE `time` SET `start`='$start', `end`='$end' WHERE id = '$id'";
        $result = $this->db->update($query);

        if ($result) {
            $alert = '<script> toastr.success("Cập nhật thành công!");</script>';
            return $alert;
        }
        $alert = '<script> toastr.warning("Cập nhật không thành công!");</script>';
        return $alert;
    }

    public function deleteTime($id)
    {
        $query = "SELECT * FROM time WHERE id = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            $query = "DELETE FROM time WHERE id = '$id'";
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