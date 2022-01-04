<?php
include '../lib/session.php';
Session::checkSession();
include '../lib/database.php';
include '../helpers/format.php';

spl_autoload_register(function ($class) {
    include_once "../classes/" . $class . ".php";
});

$db = new Database();
$fm = new Format();
$staff = new staff();
$customer = new customer();
$card = new card();
$decentralization = new decentralization();
$sport = new sport();
$time = new time();

// Header
include_once './layouts/header.php';

// Conter
if (isset($_GET['q'])) {
    switch ($_GET['q']) {
        case 'home':
            include_once './views/home.php';
            break;
        case 'staff':
            include_once './views/staff/index.php';
            break;
        case 'addStaff':
            include_once './views/staff/add.php';
            break;
        case 'editStaff':
            include_once './views/staff/edit.php';
            break;
        case 'trashStaff':
            include_once './views/staff/trash.php';
            break;
        case 'infoStaff':
            include_once './views/staff/info.php';
            break;
        case 'customer':
            include_once './views/customer/index.php';
            break;
        case 'addCustomer':
            include_once './views/customer/add.php';
            break;
        case 'editCustomer':
            include_once './views/customer/edit.php';
            break;
        case 'trashCustomer':
            include_once './views/customer/trash.php';
            break;
        case 'infoCustomer':
            include_once './views/customer/info.php';
            break;
        case 'role':
            include_once './views/role/role.php';
            break;
        case 'card':
            include_once './views/card/card.php';
            break;
        case 'sport':
            include_once './views/sport/sport.php';
            break;
        case 'time':
            include_once './views/time/time.php';
            break;
        default:
            include_once './views/error.php';
            break;
    }
} else {
    include_once './views/home.php';
}

// Footer
include_once './layouts/footer.php';
