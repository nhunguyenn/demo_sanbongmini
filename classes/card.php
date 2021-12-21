<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * card
 */
class card
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function setCard($quantily, $price, $network)
    {
        $quantily = mysqli_real_escape_string($this->db->link, $this->fm->validation($quantily));
        $price = mysqli_real_escape_string($this->db->link, $this->fm->validation($price));
        $network = mysqli_real_escape_string($this->db->link, $this->fm->validation($network));

        if (empty($quantily) || empty($price) || empty($network)) {
            $alert = '<script> toastr.warning("Vui lòng nhập đầy đủ thông tin!");</script>';
            return $alert;
        }

        for ($i = 1; $i <= $quantily; $i++) {
            $seri = mt_rand(100000000, 999999999);
            $number = mt_rand(100000000, 999999999);

            $query = "SELECT * FROM card WHERE (seri = '$seri' OR number = '$number') AND network = '$network'  LIMIT 1";
            $result = $this->db->select($query);
            if ($result) {
                $alert = '<script> toastr.warning("Chỉ thêm .'. $i-- .'. do số seri hoặc số thẻ bị trùng lập!");</script>';
                return $alert;
            }

            $query = "INSERT INTO card(seri, number, price, network, status) VALUES ('$seri', '$number','$price', '$network', '0')";
            $result = $this->db->insert($query);
        }
        if ($result) {
            $alert = '<script> toastr.success("Thêm nhân viên thành công!");</script>';
            return $alert;
        }
        $alert = '<script> toastr.warning("Thêm nhân viên thất bại!");</script>';
        return $alert;
    }

    public function getCard()
    {
        $query = "SELECT * FROM card ORDER BY status ASC, network DESC";
        $result = $this->db->select($query);
        return $result;
    }
}
?>