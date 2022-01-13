<?php
    session_start();
    require_once('config.php');
    require_once('core/database.php');
    require_once('drivers/'.$db_connection.'_database.php');

    $dbClassName = $db_connection.'_database';
    $db = new $dbClassName();

    $cardTable = $db->table('card')->get();
    $customerTable = $db->table('customer')->get();
    foreach ($customerTable as $account) {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['username'] == $account->username) {
                $currentUsername = $account->username;
                $currentPhone = $account->phone;
                $currentId = $account->id;
                $currentWallet = $account->price;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nạp tiền</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> 


</head>
<body> 
    
    <?php 
        if (isset($_POST['maTheCao']) && isset($_POST['nhaMang'])) {
            foreach($cardTable as $card) {
                if (($_POST['maTheCao'] == $card->number) && ($_POST['nhaMang'] == $card->network) && ($card->status == 0)) {
                    $db->table('customer')->update(['price' => $currentWallet + $card->price], $currentId);
                    $db->table('card')->update(['status' => 1], $card->id);
                    echo "<script>
                        alert(\"Chúc mừng bạn đã nạp thành công\");
                        window.location.href = 'napTien.php';
                        </script>";
                }
                if (($_POST['maTheCao'] != $card->number) || ($_POST['nhaMang'] != $card->network) || ($card->status == 1)) {
                    $warningMessage = 'Vui lòng kiểm tra lại thẻ cào';
                }
            }
        }
    ?>

    <div class="container">
        <?php include("views/navbar.php") ?>
        <div class="napTien">
            <div class="napTien__right">
                <!-- <img src="assets/images/san-bong-thao-dien-img6.jpg" alt=""> -->
            </div>
            <div class="napTien__left">
                <form action="napTien.php" method="post">
                    <label for="username">Tên tài khoản</label>
                    <input name="username" value="<?php echo $currentUsername;?>" readonly/>
                    <label for="phone">Số điện thoại</label>
                    <input name="phone" value="<?php echo $currentPhone;?>" readonly />
                    <label for="maTheCao">Mã thẻ cào</label>
                    <input type="text" name="maTheCao" required />
                    <label for="nhaMang">Nhà mạng</label>
                    <select name="nhaMang" id="">                        
                        <option value="MobiFone" selected>MobiFone</option>
                        <option value="Viettel">Viettel</option>
                        <option value="Vinaphone">Vinaphone</option>
                        <option value='Vietnamobile'>Vietnamobile</option>
                    </select>
                    <p id='warningText' style='color: #F00; margin-top: 20px; margin-bottom: -20px;'></p>
                    <input class="btnNapTien" id="btnNapTien" type='submit' value='Nạp tiền' />
                </form>
            </div>
        </div>
    </div>
    <?php include("views/footer.php") ?>

    <script type="text/javascript">
        let warningNapTien = '<?php isset($warningMessage) ? print($warningMessage) : print(" ")?>';
        document.querySelector('#warningText').innerHTML = warningNapTien;
    </script>
</body>
</html>