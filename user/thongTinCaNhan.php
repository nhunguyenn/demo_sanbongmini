<?php
    session_start();
    require_once('config.php');
    require_once('core/database.php');
    require_once('drivers/'.$db_connection.'_database.php');

    $dbClassName = $db_connection.'_database';
    $db = new $dbClassName();

    $customerTable = $db->table('customer')->get();
    foreach ($customerTable as $account) {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['username'] == $account->username) {
                $currentUsername = $account->username;
                $currentPhone = $account->phone;
                $currentFullname = $account->fullname;
                $currentID = $account->id;
                $currentPassword = $account->password;
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thông tin cá nhân</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> 
</head>
<body>
    <?php
        if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == 'false') {
            header('Location: ./');
        }

        if (
            isset($_POST['fullname']) && 
            isset($_POST['phone']) 
        ) { 
            if (
                isset($_POST['oldPassword']) &&
                isset($_POST['newPassword']) &&
                isset($_POST['repeatNewPassword']) &&
                strlen($_POST['oldPassword']) > 0 &&
                strlen($_POST['newPassword']) > 0 &&
                strlen($_POST['repeatNewPassword']) > 0 
                ) {
                    if ($currentPassword == $_POST['oldPassword'] && $_POST['newPassword'] == $_POST['repeatNewPassword']) {
                        $db->table('customer')->update(
                            array(
                                'fullname' => $_POST['fullname'],
                                'phone' => $_POST['phone'],
                                'password' => $_POST['newPassword']
                                )
                        , $currentID);
                        echo '<script> window.location.href = \'thongTinCaNhan.php\';</script>';
                    } else {
                        $errorMessage = 'Xin vui lòng nhập lại mật khẩu';
                    }                    
            }
            else {
                echo $currentPassword;
                $db->table('customer')->update(
                    array(
                        'fullname' => $_POST['fullname'],
                        'phone' => $_POST['phone']
                        )
                , $currentID);
                echo '<script> window.location.href = \'thongTinCaNhan.php\';</script>';
            }
            
        }
        
    ?>
    <div class="container">
        <?php include("views/navbar.php") ?>

        <div class="thongTinCaNhan" id="thongTinCaNhan">
            <div class="thongTinCaNhan__right">
                <!-- <img src="assets/images/san-bong-thao-dien-img6.jpg" alt=""> -->
            </div>
            <div class="thongTinCaNhan__left">
                <form action="thongTinCaNhan.php" method="post">
                    <label for="username">Tên tài khoản</label>
                    <input name="username" value="<?php echo $currentUsername;?>" readonly />
                    <label for="fullname">Họ và tên</label>
                    <input name="fullname" value="<?php echo $currentFullname;?>" />
                    <label for="phone">Số điện thoại</label>
                    <input name="phone" value="<?php echo $currentPhone;?>" />
                    <label for="oldPassword">Mật khẩu cũ</label>
                    <input type='password' name="oldPassword" />   
                    <label for="newPassword">Mẫu khẩu mới</label>
                    <input type='password' name="newPassword" />   
                    <label for="repeatNewPassword">Nhập lại mật khẩu mới</label>
                    <input type='password' name="repeatNewPassword" />            
                    <p class="errorMatKhau" id="errorMatKhau"></p>
                    <input class="btnThongTinCaNhan" id="btnThongTinCaNhan" type='submit' value='Cập nhật' />
                </form>
            </div>
        </div>

    </div>
    <?php include("views/footer.php") ?>


    <script type="text/javascript">
        let errorMatKhau = '<?php if (isset($errorMessage)) echo $errorMessage;?>';
        document.getElementById('errorMatKhau').innerHTML = errorMatKhau;    
    </script>
</body>
</html>