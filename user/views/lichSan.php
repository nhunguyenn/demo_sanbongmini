<?php 
    require_once('config.php');
    require_once('core/database.php');
    require_once('drivers/'.$db_connection.'_database.php');

    $dbClassName = $db_connection.'_database';
    $db = new $dbClassName();
    $start_date = date("Y-m-d", strtotime('monday this week'));
    $current_date = date("Y-m-d");
    // $current_date = date('Y-m-d', strtotime($start_date . "+6 day"));
    $ordersTable = $db->table('orders')->get();
    $customerTable = $db->table('customer')->get();1
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lịch sân</title>
</head>
<body>

    <?php
        if (isset($_SESSION['loggedIn'])) {
            if ($_SESSION['loggedIn'] == 'true') {
                $loggedIn = 'true';
            }
        } else {
            $loggedIn = 'false';
        }

        if (isset($ordersTable)) {
            foreach($ordersTable as $order) {
                if ($order->date_order <= $current_date) {
                    $db->table('orders')->update(['status' => 0], $order->id);
                }
            }
        }


        $monday = date('Y-m-d', strtotime($start_date . "+0 day"));
        $tuesday = date('Y-m-d', strtotime($start_date . "+1 day"));
        $wednesday = date('Y-m-d', strtotime($start_date . "+2 day"));
        $thursday = date('Y-m-d', strtotime($start_date . "+3 day"));
        $friday = date('Y-m-d', strtotime($start_date . "+4 day"));
        $saturday = date('Y-m-d', strtotime($start_date . "+5 day"));
        $sunday = date('Y-m-d', strtotime($start_date . "+6 day"));
        $nextMonday = date('Y-m-d', strtotime($start_date . "+7 day"));
        

        function getColIndex($sentence) {
            GLOBAL $start_date;
            if ((int)date('d', strtotime($sentence)) - (int)date('d', strtotime($start_date)) == 7) {
                $date = "Next monday";
            }
            else {
                $date = date('l', strtotime($sentence));
            }
            switch($date) {
                case "Monday":
                    $colIndex = 1;
                    break;
                case "Tuesday":
                    $colIndex = 2;
                    break;
                case "Wednesday":
                    $colIndex = 3;
                    break;
                case "Thursday":
                    $colIndex = 4;
                    break;
                case "Friday":
                    $colIndex = 5;
                    break;
                case "Saturday":
                    $colIndex = 6;
                    break;
                case "Sunday":
                    $colIndex = 7;
                    break;
                default:
                    $colIndex = 8;
            }
            return $colIndex;
        }

        $orderDateArray = [];
        $orderTimeArray = [];
        $orderedQuantity = 0;
        if (isset($ordersTable)) {
            if (isset($_SESSION['username'])) {
                foreach($ordersTable as $order) {
                    if ($_SESSION['username'] == $order->username && $order->status == 1) {
                        $orderedQuantity++;
                    }
                }
            }
            foreach($ordersTable as $order) {
                if ($order->status == 1) {
                    array_push($orderTimeArray, $order->time);
                    array_push($orderDateArray, getColIndex($order->date_order));
                }
            }
        }
    ?>

    <div class="lichSan" id="lichSan">
        <h2 class="title">Lịch sân 5:5 thứ nhất</h2>

        <div class="lichSan__bang" id="lichSan__bang">

        </div>

        <div class="lichSan__luuY">
            <input style="border: 1px groove #4AD295; border-radius: 5px" readonly/>
            <label>Còn trống</label>
            <input style="background-color: #F00; border: none; border-radius: 5px" readonly/>
            <label>Đã đặt</label>
            <input style="background-color: #717171; border-radius: 5px; border: none" readonly/>
            <label>Qua ngày</label>
        </div>
    </div>

    <script type='text/javascript'>
        let lichSan__bang = document.getElementById('lichSan__bang');
        let loggedIn = '<?php if(isset($loggedIn)) echo $loggedIn; ?>';
        let orderedQuantity = '<?php if(isset($orderedQuantity)) echo $orderedQuantity;?>';
        let columnIndexInactive = <?php (count($orderDateArray) > 0) ? (print('["' . implode('", "', $orderDateArray) . '"]')) : (print('[]')) ?>;
        let rowIndexInactive = <?php (count($orderDateArray) > 0) ? (print('["' . implode('", "', $orderTimeArray) . '"]')) : (print('[]')) ?>;
        let currentDate = '<?php echo $current_date;?>';
        let monday = '<?php echo $monday;?>';
        let tuesday = '<?php echo $tuesday;?>';
        let wednesday = '<?php echo $wednesday;?>';
        let thursday = '<?php echo $thursday;?>';
        let friday = '<?php echo $friday;?>';
        let saturday = '<?php echo $saturday;?>';
        let sunday = '<?php echo $sunday;?>';
        let nextMonday = '<?php echo $nextMonday;?>';


        const tableHeaders = () => {   
            return `
                <thead>
                    <tr>
                        <th></th>
                        <th>
                            <?php echo date('l', strtotime($start_date . "+0 day")) . ' ' . date('d-m', strtotime($start_date . "+0 day")); ?>
                        </th>
                        <th>
                            <?php echo date('l', strtotime($start_date . "+1 day")) . ' ' . date('d-m', strtotime($start_date . "+1 day")); ?>
                        </th>
                        <th>
                            <?php echo date('l', strtotime($start_date . "+2 day")) . ' ' . date('d-m', strtotime($start_date . "+2 day")); ?>
                        </th>
                        <th>
                            <?php echo date('l', strtotime($start_date . "+3 day")) . ' ' . date('d-m', strtotime($start_date . "+3 day")); ?>
                        </th>
                        <th>
                            <?php echo date('l', strtotime($start_date . "+4 day")) . ' ' . date('d-m', strtotime($start_date . "+4 day")); ?>
                        </th>
                        <th>
                            <?php echo date('l', strtotime($start_date . "+5 day")) . ' ' . date('d-m', strtotime($start_date . "+5 day")); ?>
                        </th>
                        <th>
                            <?php echo date('l', strtotime($start_date . "+6 day")) . ' ' . date('d-m', strtotime($start_date . "+6 day")); ?>
                        </th>
                        <th>
                            <?php echo date('l', strtotime($start_date . "+7 day")) . ' ' . date('d-m', strtotime($start_date . "+7 day")); ?>
                        </th>
                    </tr>
                </thead>
            `;
            
        }

        const createTd = () => {
            let result = ''
            for (let i = 0; i < 8; i++) {
                result += '<td onclick="getValueTab()"></td>'
            }
            return result;
        }

        const tableBody = () => {
            return `
                <tbody>
                    <tr>
                        <td>6:00 - 7:00</td>
                        ${createTd()}
                    </tr>
                    <tr>
                        <td>7:00 - 8:00</td>
                        ${createTd()}
                    </tr>
                    <tr>
                        <td>8:00 - 9:00</td>
                        ${createTd()}
                    </tr>
                    <tr>
                        <td>9:00 - 10:00</td>
                        ${createTd()}
                    </tr>
                    <tr>
                        <td>10:00 - 11:00</td>
                        ${createTd()}
                    </tr>
                    <tr>
                        <td>14:00 - 15:00</td>
                        ${createTd()}
                    </tr>
                    <tr>
                        <td>15:00 - 16:00</td>
                        ${createTd()}
                    </tr>
                    <tr>
                        <td>16:00 - 17:00</td>
                        ${createTd()}
                    </tr>
                    <tr>
                        <td>17:00 - 18:00</td>
                        ${createTd()}
                    </tr>
                    <tr>
                        <td>18:00 - 19:00</td>
                        ${createTd()}
                    </tr>
                    <tr>
                        <td>19:00 - 20:00</td>
                        ${createTd()}
                    </tr>
                </tbody>
            `;
        }

        lichSan__bang.innerHTML = `
            <table id="bangLichSan">
                ${tableHeaders()}
                ${tableBody()}
            </table>
        `

        const table = document.querySelector('#bangLichSan');
        const rows = document.querySelectorAll('tr');   
        console.log(rowIndexInactive);
        console.log(columnIndexInactive);
        for (let i = 0; i < rowIndexInactive.length; i++) {
            table.rows[rowIndexInactive[i]].cells[columnIndexInactive[i]].classList.add('booked');
        }

        for (let i = 1; i < 12; i++) {
            if (currentDate >= monday) {
                table.rows[i].cells[1].classList.remove('booked');
                table.rows[i].cells[1].classList.add('passedDay');
            }

            if (currentDate >= tuesday) {
                table.rows[i].cells[2].classList.remove('booked');
                table.rows[i].cells[2].classList.add('passedDay');
            }

            if (currentDate >= wednesday) {
                table.rows[i].cells[3].classList.remove('booked');
                table.rows[i].cells[3].classList.add('passedDay');
            }

            if (currentDate >= thursday) {
                table.rows[i].cells[4].classList.remove('booked');
                table.rows[i].cells[4].classList.add('passedDay');
            }

            if (currentDate >= friday) {
                table.rows[i].cells[5].classList.remove('booked');
                table.rows[i].cells[5].classList.add('passedDay');
            }

            if (currentDate >= saturday) {
                table.rows[i].cells[6].classList.remove('booked');
                table.rows[i].cells[6].classList.add('passedDay');
            }

            if (currentDate >= sunday) {
                table.rows[i].cells[7].classList.remove('booked');
                table.rows[i].cells[7].classList.add('passedDay');
            }

            if (currentDate >= nextMonday) {
                table.rows[i].cells[8].classList.remove('booked');
                table.rows[i].cells[8].classList.add('passedDay');
            }
        }

        const getValueTab = () => {
            const rowsArray = Array.from(rows);
            const rowIndex = rowsArray.findIndex(row => row.contains(event.target));
            const columns = Array.from(rowsArray[rowIndex].querySelectorAll('td'));
            const columnIndex = columns.findIndex(column => column == event.target);

            let khungGioDat = table.rows[rowIndex].cells[0].innerHTML;
            let ngayDat;
            
            if (table.rows[0].cells[columnIndex].cellIndex == 1) {
                ngayDat = '<?php echo date('Y-m-d', strtotime($start_date . "+0 day"));?>';
            }
            if (table.rows[0].cells[columnIndex].cellIndex == 2) {
                ngayDat = '<?php echo date('Y-m-d', strtotime($start_date . "+1 day"));?>';
            }
            if (table.rows[0].cells[columnIndex].cellIndex == 3) {
                ngayDat = '<?php echo date('Y-m-d', strtotime($start_date . "+2 day"));?>';
            }
            if (table.rows[0].cells[columnIndex].cellIndex == 4) {
                ngayDat = '<?php echo date('Y-m-d', strtotime($start_date . "+3 day"));?>';
            }
            if (table.rows[0].cells[columnIndex].cellIndex == 5) {
                ngayDat = '<?php echo date('Y-m-d', strtotime($start_date . "+4 day"));?>';
            }
            if (table.rows[0].cells[columnIndex].cellIndex == 6) {
                ngayDat = '<?php echo date('Y-m-d', strtotime($start_date . "+5 day"));?>';
            }
            if (table.rows[0].cells[columnIndex].cellIndex == 7) {
                ngayDat = '<?php echo date('Y-m-d', strtotime($start_date . "+6 day"));?>';
            }
            if (table.rows[0].cells[columnIndex].cellIndex == 8) {
                ngayDat = '<?php echo date('Y-m-d', strtotime($start_date . "+7 day"));?>';
            }
            
            if (orderedQuantity > 2) {
                alert("Mỗi tài khoản chỉ được đặt tối đa 3 suất/tuần");
            }
            else if (loggedIn == 'true') {
                sessionStorage.setItem('ngayDat', ngayDat);
                sessionStorage.setItem('khungGioDat', khungGioDat);
                window.location.href = 'datSan.php';
            } else {
                alert("Vui lòng đăng nhập để có thể đặt sân");
            }
        }

    </script>
</body>
</html>