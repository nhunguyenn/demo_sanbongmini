<?php
    session_start();
    require_once('config.php');
    require_once('core/database.php');
    require_once('drivers/'.$db_connection.'_database.php');

    $dbClassName = $db_connection.'_database';
    $db = new $dbClassName();
    
    $customerTable = $db->table('customer')->get();
    $ordersTable = $db->table('orders')->get();
    foreach ($customerTable as $account) {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['username'] == $account->username) {
                $currentUsername = $account->username;
                $currentFullname = $account->fullname;
                $currentPhone = $account->phone;
                $currentWallet = $account->price;
                $currentId = $account->id;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đặt sân</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> 
</head>
<body>

    <?php 
    if (
        isset($_POST['ngayDat']) &&
        isset($_POST['khungGioDat']) &&
        isset($_POST['loaiSan']) && 
        isset($_POST['hinhThuc']) &&
        isset($_POST['thanhTien__Text'])
        ) {
        
        $thanhTien__Text = str_replace(',', '', $_POST['thanhTien__Text']);
        if ($currentWallet - (int)$thanhTien__Text >= 0) {
            $remainingAmount = $currentWallet - (int)$thanhTien__Text;
            $db->table('customer')->update([
                'price' => $remainingAmount
            ], $currentId);
        }
        if ($currentWallet - (int)$thanhTien__Text < 0) {
            $warningText = 'Số dư tài khoản không đủ';
        }    
        else {
            switch (explode(" ", $_POST['khungGioDat'])[0]) {
                case '6:00':
                    $idTime = 1;
                    break;
                case '7:00':
                    $idTime = 2;
                    break;
                case '8:00':
                    $idTime = 3;
                    break;
                case '9:00':
                    $idTime = 4;
                    break;
                case '10:00':
                    $idTime = 5;
                    break;
                case '14:00':
                    $idTime = 6;
                    break;
                case '15:00':
                    $idTime = 7;
                    break;
                case '16:00':
                    $idTime = 8;
                    break;
                case '17:00':
                    $idTime = 9;
                    break;
                case '18:00':
                    $idTime = 10;
                    break;
                default:
                    $idTime = 11;
            }

            foreach ($ordersTable as $order) {
                if ($_POST['ngayDat'] == $order->date_order &&
                    $_POST['loaiSan'] == $order->sport &&
                    $idTime == $order->time
                ) {
                    $duplicateOrder = true;
                }
            }
            if (isset($duplicateOrder)) {
                $messageDuplicateOrder = 'Khung giờ trong ngày đã được đặt';
            }
            else {
                $db->table('orders')->insert([
                    'username' => $_POST['username'],
                    'fullname' => $_POST['fullname'],
                    'phone' => $_POST['phone'],
                    'date_order' => $_POST['ngayDat'],
                    'sport' => $_POST['loaiSan'],
                    'time' => $idTime,
                    'deposit' => $thanhTien__Text,
                    'activate' => 1,
                    'status' => 1
                ]);
    
                $successBooking = 'Đặt sân thành công';        
            }

        }
        
    }
    
    ?>
    <div class="container">
        <?php include("views/navbar.php") ?>

        <h2 class="titleDatSan">Đặt sân</h2>
        <div class="datSan" id="datSan">
            <div class="datSan__right">
                <!-- <img src="assets/images/san-bong-thao-dien-img6.jpg" alt=""> -->
            </div>
            <div class="datSan__left">
                <form action="datSan.php" method="post">
                    <label for="username">Tên tài khoản</label>
                    <input name="username" value="<?php echo $currentUsername;?>" readonly />
                    <label for="fullname">Họ tên</label>
                    <input name="fullname" value="<?php echo $currentFullname;?>" readonly />
                    <label for="phone">Số điện thoại</label>
                    <input name="phone" value="<?php echo $currentPhone;?>" readonly />
                    <label for="ngayDat">Ngày đặt</label>
                    <input type="text" name="ngayDat" id="ngayDat" readonly /> 
                    <label for="khungGioDat">Khung giờ đặt</label>
                    <input type="text" name="khungGioDat" id="khungGioDat" readonly /> 
                    <label for="loaiSan">Loại sân</label>    
                    <select name="loaiSan" id="loaiSanSelect" class="loaiSanSelect" readonly >       
                        <option value="9" selected>Sân năm</option>
                        <option value="12">Sân bảy</option>
                    </select>             
                    <div class="hinhThuc">
                        <label for="hinhThuc">Đặt cọc</label>
                        <input type="radio" name='hinhThuc' value='datCoc' checked />
                        <!-- <label for="hinhThuc">Trả hết</label> -->
                        <!-- <input type="radio" name='hinhThuc' value='traHet'  /> -->
                    </div>
                    

                    <div id="thanhTien" class='thanhTien'>
                        Thành Tiền
                        <input type="text" id="thanhTien__Text" class="thanhTien__Text" name="thanhTien__Text" readonly />
                    </div>
                    <p class="warningText" id="warningText"></p>
                    <input class="btnDatSan" id="btnDatSan" type='submit' value='Đặt sân' readonly />
                </form>
            </div>
        </div>

    </div>
    <?php include("views/footer.php") ?>


    <script type="text/javascript">
        let successBooking = '<?php (isset($successBooking)) ? print($successBooking) : print('')?>';
        let messageDuplicateOrder = '<?php (isset($messageDuplicateOrder)) ? print($messageDuplicateOrder) : print('')?>';

        function numberWithCommas(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
        
        let warningText = '<?php echo isset($warningText);?>';
        if (warningText == '1') {
            document.getElementById('warningText').innerHTML = 'Số dư tài khoản không đủ để đặt';
            document.getElementById('warningText').style.color = '#F00';
        }

        let ngayDat = sessionStorage.getItem('ngayDat');
        document.getElementById('ngayDat').value = ngayDat.trim();

        let khungGioDat = sessionStorage.getItem('khungGioDat');
        document.getElementById('khungGioDat').value = khungGioDat.trim();

        let loaiSan = sessionStorage.getItem('loaiSan');
        let loaiSanSelect = document.getElementById('loaiSanSelect');
        loaiSanSelect.value = loaiSan;        

        let radios = document.getElementsByName('hinhThuc');
        let thanhTien;
        let hinhThucThanhToan = 'datCoc';
        // for (let temp = 0; temp < radios.length; temp++) {
        //     radios[temp].addEventListener('change', () => {
        //         hinhThucThanhToan = radios[temp].value;

        //         if (loaiSanSelect.value == 'sanNam' && hinhThucThanhToan == 'datCoc') {
        //             thanhTien = 250000;
        //             document.querySelector('#thanhTien__Text').value = numberWithCommas(thanhTien);
        //         }
        //         else if (loaiSanSelect.value == 'sanBay' && hinhThucThanhToan == 'datCoc') {
        //             thanhTien = 450000;
        //             document.querySelector('#thanhTien__Text').value = numberWithCommas(thanhTien);
        //         }
        //         else if (loaiSanSelect.value == 'sanNam' && hinhThucThanhToan == 'traHet') {
        //             thanhTien = 500000;
        //             document.querySelector('#thanhTien__Text').value = numberWithCommas(thanhTien);
        //         }
        //         else if (loaiSanSelect.value == 'sanBay' && hinhThucThanhToan == 'traHet') {
        //             thanhTien = 800000;
        //             document.querySelector('#thanhTien__Text').value = numberWithCommas(thanhTien);
        //         }
        //     })
        // }
        
        if (loaiSanSelect.value == '9') {
            document.querySelector('#thanhTien__Text').value = numberWithCommas(250000);
        } else {
            document.querySelector('#thanhTien__Text').value = numberWithCommas(450000);
        }
        loaiSanSelect.addEventListener('change', () => {
            if (loaiSanSelect.value == '9' && hinhThucThanhToan == 'datCoc') {
                    thanhTien = 250000;
                    document.querySelector('#thanhTien__Text').value = numberWithCommas(thanhTien);
            }
            else if (loaiSanSelect.value == '12' && hinhThucThanhToan == 'datCoc') {
                thanhTien = 450000;
                document.querySelector('#thanhTien__Text').value = numberWithCommas(thanhTien);
            }
            // else if (loaiSanSelect.value == 'sanNam' && hinhThucThanhToan == 'traHet') {
            //     thanhTien = 500000;
            //     document.querySelector('#thanhTien__Text').value = numberWithCommas(thanhTien);
            // }
            // else if (loaiSanSelect.value == 'sanBay' && hinhThucThanhToan == 'traHet') {
            //     thanhTien = 800000;
            //     document.querySelector('#thanhTien__Text').value = numberWithCommas(thanhTien);
            // }
        }); 

        if (messageDuplicateOrder.length > 1) {
            alert(messageDuplicateOrder);
        }
        if (successBooking.length > 1) {
            alert('Chúc mừng bạn đã đặt sân thành công');
            window.location.href = './';
        }
    </script>
</body>
</html>