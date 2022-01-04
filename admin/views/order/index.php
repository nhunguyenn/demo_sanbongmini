<?php
if (isset($_GET['id'])) {
    $idOrder = $_GET['id'];
    $idStaff = Session::get('id');
    $checOrder = $place->payment($idOrder, $idStaff);
    if (isset($checOrder)) {
        echo $checOrder;
        echo '<script> setTimeout(() => { window.location = "?q=order"; }, 500); </script>';
    }
}
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
                <h3 class="card-title">Danh sách đặt sân</h3>
                <div class="card-tools">
                    <a class="btn btn-success btn-sm" href="?q=addOrder">
                        <i class="fas fa-plus"></i> Đặt sân
                    </a>
                    <a class="btn btn-danger btn-sm" href="?q=trashOrder">
                        <i class="fas fa-trash"></i> Thùng rác
                    </a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
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
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $result = $place->getOrder();
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
                                    <td project-state>
                                        <a class="btn btn-primary btn-sm" href="" class="edit" title="Edit" data-toggle="tooltip">
                                            <i class="fas fa-pencil-alt"></i> Sửa
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="?q=order&id=<?php echo $value['id'] ?>" type="submit"><i class="fa fa-trash-o" aria-hidden="true">
                                                <i class="fas fa-book"></i> Hủy
                                        </a>
                                    </td>
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
