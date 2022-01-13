<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý doanh thu</h1>
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
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thống kê hóa đơn theo năm</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th>Tổng doanh thu </th>
                                    <th>Tổng tiền cọc</th>
                                    <th>Tổng tiền thanh toán đủ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php
                                        echo $statistical->sumOrder();
                                        ?></td>
                                    <td><?php echo $statistical->sumDeposit(); ?></td>
                                    <td> <?php echo $statistical->sumOrder() - $statistical->sumDeposit(); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- Default box -->

        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>