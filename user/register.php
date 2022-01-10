<?php 
    session_start();
    require_once('config.php');
    require_once('core/database.php');
    require_once('drivers/'.$db_connection.'_database.php');

    $dbClassName = $db_connection.'_database';
    $db = new $dbClassName();

    $customerTable = $db->table('customer')->get();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/register.css" />
    <!-- Load an icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        if (isset($_SESSION['loggedIn'])) {
            if ($_SESSION['loggedIn'] == 'true') {
                header('Location: ./');
            }
        }

        if (isset($_POST['hoTen']) &&
        isset($_POST['phone']) &&
        isset($_POST['username']) &&
        isset($_POST['password'])
        ) {
            $duplicateUsername = '';
            $duplicatePhone = '';

            foreach ($customerTable as $account) {
                if ($account->username == $_POST['username']) {
                    $duplicateUsername = true;
                }
                if ($account->phone == $_POST['phone']) {
                    $duplicatePhone = true;
                }
            }
            if ($duplicateUsername || $duplicatePhone) {
                if ($duplicateUsername && $duplicatePhone) {
                    $errorUsername = "Tài khoản đã được đăng ký!";
                    $errorPhone = "Số điện thoại đã được đăng ký!";
                }
                if ($duplicateUsername) {
                    $errorUsername = "Tài khoản đã được đăng ký!";
                }
                if ($duplicatePhone) {
                    $errorPhone = "Số điện thoại đã được đăng ký!";
                }
            }
            else {
                $db->table('customer')->insert([
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'fullName' => $_POST['hoTen'],
                    'phone' => $_POST['phone']
                ]);
                header('location: login.php');
            }
        }
    ?>

    <div class="register">
        <div class="container">
            <ul class="navbar">
                <li>
                    <a href="./"><i class="fa fa-angle-left"></i></a>
                </li>
            </ul>

            <form action="register.php" method="post">
                <label for="hoTen">Họ và tên</label>
                <input type="text" name="hoTen"  required />
                
                <label for="phone">Số điện thoại <span class="soDienThoaiDaDangKy" id="soDienThoaiDaDangKy"></span></label>
                <input type="tel" name="phone" pattern="[0-9]+" required />
                
                <label for="username">Tài khoản <span class="taiKhoanDaDangKy" id="taiKhoanDaDangKy"></span></label>
                <input type="username" name="username" required />

                <label for="password">Mật khẩu</label>
                <input type="password" name="password" required />
    
                <input class="btnDatSan" id="btnDatSan" type='submit' value='Đăng ký' />
                
                <div class="register__otherCases">
                    <a href="login.php">Bạn đã có tài khoản?</a>
                </div>
            </form>
        </div>

    </div>
    <script type="text/javascript">
        let errorUsername = '<?php if(isset($errorUsername)) echo $errorUsername; ?>';
        let errorPhone = '<?php if(isset($errorPhone)) echo $errorPhone; ?>';
        // let errorMessagetxt = document.getElementById('taiKhoanDaDangKy');
        document.getElementById('taiKhoanDaDangKy').innerHTML = errorUsername;
        document.getElementById('soDienThoaiDaDangKy').innerHTML = errorPhone;
    </script>
</body>
</html>