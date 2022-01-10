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
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css" />
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

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $errorLogin = '';
            foreach($customerTable as $account) {
                if ($account->username == $_POST['username'] &&
                    $account->password == $_POST['password']) {
                        $_SESSION['loggedIn'] = 'true';
                        $_SESSION['username'] = $account->username;
                        header('location: ./');
                }
                else {
                    $errorLogin = 'Tài khoản hoặc mật khẩu không đúng';
                }
            }

        }
    ?>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Bạn hãy gọi lên hotline của chúng tôi để được cấp lại mật khẩu</p>
        </div>
    </div>
    
    <div class="login">

        <div class="container">
            <ul class="navbar">
                <li>
                    <a href="./"><i class="fa fa-angle-left"></i></a>
                </li>
            </ul>

            <form action="login.php" method="post">
                <label for="username">Tài khoản</label>
                <input type="text" name="username" required />
    
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" required />
                <p class='errorLogin' id='errorLogin'></p>
                <input type="submit" class="btnDatSan" value="Đăng nhập" />
                <div class="login__otherCases">
                    <a href="register.php">Bạn chưa có tài khoản?</a> <br />
                    <a id="myBtn">Bạn quên mật khẩu?</a>
                </div>
            </form>
        </div>

    </div>

    <script type="text/javascript">
        let errorLogin = '<?php if (isset($errorLogin)) echo $errorLogin; ;?>';
        document.querySelector('#errorLogin').innerHTML = errorLogin;
        
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        } 
    </script>
</body>
</html>