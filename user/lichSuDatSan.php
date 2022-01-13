<?php
    session_start();
    require_once('config.php');
    require_once('core/database.php');
    require_once('drivers/'.$db_connection.'_database.php');

    $dbClassName = $db_connection.'_database';
    $db = new $dbClassName();

    $customerTable = $db->table('customer')->get();
    $ordersTable = $db->table('orders')->get();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lịch sử đặt sân</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> 
</head>
<body>
    
    <div class="container">
        <?php include("views/navbar.php"); ?>
        <div class="lichSuDatSan">
            <h2 class="lichSuDatSan__title">Lịch sử đặt sân</h2>
            <div class="lichSuDatSan__img"></div>
            <?php createHeadTable() . createBodyTable()?>
        </div>
        <?php
        if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == 'false') {
            echo "<script>window.location.href = './'</script>";
        }

        if (isset($_POST['id']) &&
            isset($_POST['username']) &&
            isset($_POST['phone']) &&
            isset($_POST['orderDate']) &&
            isset($_POST['orderTime']) &&
            isset($_POST['loaiSan']) 
        ) {
            foreach ($customerTable as $customer) {
                if ($_POST['username'] == $customer->username) {
                    $idCustomer = $customer->id;
                    $walletCustomer = $customer->price;
                }
            }
            foreach ($ordersTable as $order) {
                if ($order->id == $_POST['id']) {
                    $db->table('orders')->update(array('activate' => 0, 'status' => 0), $_POST['id']);
                }
            }
            echo "<script>window.location.href = 'lichSuDatSan.php'</script>";
        }

        function createHeadTable() {
            echo "
                <table class='lichDatSan' id='lichDatSan'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Điện thoại</th>
                            <th>Ngày đặt</th>
                            <th>Khung giờ đặt</th>
                            <th>Loại sân</th>
                        </tr>
                    </thead>
            ";
        }
        function createBodyTable() {
            GLOBAL $ordersTable;

            if (isset($ordersTable)) {
                foreach($ordersTable as $order) {
                    switch ($order->time) {
                        case '1':
                            $orderTime = '6:00 - 7:00';
                            break;
                        case '2':
                            $orderTime = '7:00 - 8:00';
                            break;
                        case '3':
                            $orderTime = '8:00 - 9:00';
                            break;
                        case '4':
                            $orderTime = '9:00 - 10:00';
                            break;
                        case '5':
                            $orderTime = '10:00 - 11:00';
                            break;
                        case '6':
                            $orderTime = '14:00 - 15:00';
                            break;
                        case '7':
                            $orderTime = '15:00 - 16:00';
                            break;
                        case '8':
                            $orderTime = '16:00 - 17:00';
                            break;
                        case '9':
                            $orderTime = '17:00 - 18:00';
                            break;
                        case '10':
                            $orderTime = '18:00 - 19:00';
                            break;
                        default:
                            $orderTime = '19:00 - 20:00';
                    }
                    if ($order->username == $_SESSION['username'] && $order->status == 1 && $order->activate == 1) {
                        echo "<form action='lichSuDatSan.php' method='post'><tr><td>" . "<input type='hidden' name='id' value='$order->id'/>" . $order->id . "</td>"
                            . "<td>" . "<input type='hidden' name='username' value='$order->username'/>" . $order->username . "</td>"
                            . "<td>" . "<input type='hidden' name='phone' value='$order->phone'/>" . $order->phone . "</td>"
                            . "<td>" . "<input type='hidden' name='orderDate' value='$order->date_order'/>" . $order->date_order . "</td>"
                            . "<td>" . "<input type='hidden' name='orderTime' value='$order->time'/>" . $orderTime . "</td>"
                            . "<td>" . "<input type='hidden' name='loaiSan' value='$order->sport'/>" .($order->sport == 9 ? 'Sân năm' : 'Sân bảy') . "</td>"
                            . "<td>" . "<input id='btnDelete' class='btnDelete' type='submit' value='Xóa' />" . "</td></tr></form>";
                    }
                }
            }
            echo "</table>";
        }
        ?>
        
        

    </div>
    <?php include("views/footer.php"); ?>
    
</body>
</html>