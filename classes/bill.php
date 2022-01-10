<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * place
 */
class bill
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function getOrderId($id)
    {
        $query = "SELECT orders.id as id, orders.fullname, orders.phone, date_order, email, sport.name as name_sport, 
        time.start as start_time, time.end as end_time, orders.deposit,orders.activate as activate ,sport.price as price,description FROM orders, sport, 
        time WHERE orders.sport = sport.id AND orders.time = time.id AND orders.id = '$id'  order by activate DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getOrder()
    {
        $query = "SELECT orders.id as id, orders.fullname, orders.phone, date_order, email, sport.name as name_sport, 
        time.start as start_time, time.end as end_time, orders.deposit,orders.activate as activate ,sport.price as price,description FROM orders, sport, 
        time WHERE orders.sport = sport.id AND orders.time = time.id order by activate DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function payment($id_staff, $id, $total_bill)
    {
        $id_staff = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_staff));
        $id = mysqli_real_escape_string($this->db->link, $this->fm->validation($id));
        $total_bill = mysqli_real_escape_string($this->db->link, $this->fm->validation($total_bill));

        if ($id_staff === null || empty($id) || empty($total_bill)) {
        $alert = '<script> toastr.warning("Vui lòng nhập đầy đủ thông tin!");</script>';
        return $alert;
        }

        $query = "INSERT INTO bills (staff, customer, total_bill, activate) VALUES ('$id_staff', '$id', '$total_bill','1')";
        $result = $this->db->insert($query);
        if ($result) {
            $query = "UPDATE orders SET activate = 0 WHERE id = '$id'";
            $result = $this->db->update($query);

            $query = "UPDATE orders SET `status`='0' WHERE id = '$id'";
            $result = $this->db->update($query);

            if ($result) {
                $alert = '<script> toastr.success("Thanh toán thành công!");</script>';
                return $alert;
            }
        }

        $alert = '<script> toastr.warning("Thanh toán thất bại!");</script>';
        return $alert;
    }
}
?>