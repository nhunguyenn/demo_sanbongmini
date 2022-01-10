<?php
require_once('config.php');
require_once('core/database.php');
require_once('drivers/' . $db_connection . '_database.php');

$dbClassName = $db_connection . '_database';
$db = new $dbClassName();

$customerTable = $db->table('customer')->get();
foreach ($customerTable as $account) {
    if (isset($_SESSION['username'])) {
        if ($_SESSION['username'] == $account->username) {
            $currentWallet = $account->price;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Navbar</title>
</head>

<body>
    <ul class="navbar" id="navbar">
        <li>
            <a href="./"><i class="fa fa-bars"></i></a>
        </li>
        <li>
            <a href="./">Trang chủ</a>
        </li>
        <li>
            <a href="./#gioiThieu">Giới thiệu</a>
        </li>
        <li>
            <div class="dropdown" id="dropdownSan">
                <a href="./#loaiSan">Sân</a>
                <div class="dropdown-content">
                    <a href="./#loaiSan">Loại sân</a>
                    <a href="./#lichSan">Lịch sân</a>
                </div>
            </div>
        </li>
        <li>
            <a href="./#lienHe">Liên hệ</a>
        </li>
        <li>
            <div class="dropdown" id="dropdownDangNhap">
                <span class="currentWallet" id='currentWallet'>
                    <span id="currentWallet__Text"></span>
                    <i class="fa fa-money"></i>
                </span>
                <a href="login.php">
                    <i class="fa fa-user" id="btnLogin" aria-hidden="true"></i>
                    <span id="dropdownDangNhap__textDangNhap">Đăng nhập</span>
                </a>

                <div class="dropdown-content" id="dropdownDangNhap__dropdownContent">
                    <a href="register.php">Đăng ký</a>
                </div>
                <a href="../admin/login.php">
                    <i class="fa fa-user" id="btnLogin" aria-hidden="true"></i>
                    <span id="dropdownDangNhap__textDangNhap">Đăng nhập quyền quản trị</span>
                </a>
            </div>
        </li>
    </ul>

    <script type="text/javascript">
        let sessionLoggedIn = '<?php echo $_SESSION['loggedIn']; ?>';

        let currentWallet = '<?php echo number_format($currentWallet); ?>';

        let dropdownDangNhap__textDangNhap = document.getElementById('dropdownDangNhap__textDangNhap');
        let dropdownDangNhap__dropdownContent = document.getElementById('dropdownDangNhap__dropdownContent');

        if (sessionLoggedIn == 'true') {
            dropdownDangNhap__textDangNhap.style.display = 'none';
            dropdownDangNhap__dropdownContent.innerHTML = `
                <a href="thongTinCaNhan.php">Thông tin tài khoản</a>
                <a href="napTien.php">Nạp tiền</a>
                <a href="lichSuDatSan.php">Lịch sử đặt sân</a>
                <a href="./logout.php">Đăng xuất</a>
            `;

            document.getElementById('currentWallet').style.display = 'inline-block';
            document.getElementById('currentWallet__Text').innerHTML = currentWallet;
        }
    </script>
</body>

</html>