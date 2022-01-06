
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý hóa đơn</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý hóa đơn</li>
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
                <h3 class="card-title">Danh sách hóa đơn</h3>
                <div class="card-tools">
                   
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
                            <th>Tiền cọc</th>
                            <th>Tổng hóa đơn</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $result = $bill->getOrder();
                        $i = 1;
                        if ($result) {
                            while ($value = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $value['fullname'] ?></td>
                                    <td><?php echo $value['phone'] ?></td>
                                    <td><?php echo $value['date_order'] ?></td>
                                    <td><?php echo $value['deposit'] ?></td>
                                    <td><?php echo $value['price'] ?></td>
                                    <td><?php if ($value['activate'] == 0){echo'Đã thanh toán';} else {echo 'Chưa thanh toán';}?></td>
                                    <td project-state>
                                        <a class="btn btn-primary btn-sm" href="?q=payment&id=<?php echo $value['id'] ?>" class="edit" title="Edit" data-toggle="tooltip">
                                            <i class="fas fa-eye"></i> Xem
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
