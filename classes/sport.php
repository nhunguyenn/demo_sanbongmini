<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class sport
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this-> fm = new Format();
    }
    
    public function setSport($name, $price, $deposit)
    {
        $name = mysqli_real_escape_string($this->db->link, $this->fm->validation($name));
        $price = mysqli_real_escape_string($this->db->link, $this->fm->validation($price));
        $deposit = mysqli_real_escape_string($this->db->link, $this->fm->validation($deposit));

        if (empty($name) || empty($price) || empty($deposit))
        {
            $alert = '<script> toastr.warning("Vui lòng nhập đầy đủ thông tin!"); </script>';
        }
        $query = "SELECT * FROM sport WHERE name = '$name' LIMIT 1";
        $result = $this->db->select($query);
        if ($result) {
            $alert = '<script> toastr.warning("Tên sân bóng đã tồn tại"); </script>';
        }

        $deposits = ($price * $deposit) / 100;
        $query = "INSERT INTO `sport`(`name`, `price` , `deposit`) VALUES ('$name','$price','$deposits')";
        $result = $this->db->insert($query);

        if ($result) {
            $alert = '<script> toastr.success("Thêm sân bóng thành công!");</script>';
            return $alert;
        }
        $alert = '<script> toastr.warning("Thêm sân bóng thất bại!");</script>';
        return $alert;
    }

    public function getSport(){
        $query = "SELECT * FROM sport ORDER BY price ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function deleteSport($id){
        $query = "SELECT * FROM sport WHERE id = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            $query = "DELETE FROM sport WHERE id = '$id'";
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