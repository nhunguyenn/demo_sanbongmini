<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_GET['restore'])) {
        $checkOrder = $place->restoreOrder($id);
    }
    if (isset($_GET['delete'])) {
        $checkOrder = $place->deleteOrder($id);
    }
}
?>
<?php
if (isset($checkOrder)) {
    echo $checkOrder;
?>
    <script>
        setTimeout(() => {
            window.location = '?q=trashOrder';
        }, 1000);
    </script>
<?php }
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý đặt sân</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý đặt sân</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách đơn đặt sân đã được hủy</h3>
                <div class="card-tools">
                </div>
            </div>
            <div class="card-body p-0">
            <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Họ và Tên</th>
                            <th>Số điện thoại</th>
                            <th>Ngày đặt</th>
                            <th>Loại sân</th>
                            <th>Khung giờ</th>
                            <th>Tiền cọc</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $result = $place->gettrash();
                        $i = 1;
                        if ($result) {
                            while ($value = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><a href="?q=orderInfo&id=<?php echo $value['id'] ?>"><?php echo $value['fullname'] ?></a></td>
                                    <td><?php echo $value['phone'] ?></td>
                                    <td><?php echo $value['date_order'] ?></td>
                                    <td><?php echo $value['name_sport'] ?></td>
                                    <td><?php echo $value['start_time'] ?> - <?php echo $value['end_time'] ?></td>
                                    <td><?php echo $value['deposit'] ?></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

