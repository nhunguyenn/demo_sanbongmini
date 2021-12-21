<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $checkCustomer = $customer->trashCustomer($id);
}
?>

<?php
if (isset($checkCustomer)) {
    echo $checkCustomer;
?>
    <script>
        setTimeout(() => {
            window.location = '?q=customer';
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
                    <h1>Quản lý khách hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý khách hàng</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách khách hàng</h3>
                <div class="card-tools">
                    <a class="btn btn-success btn-sm" href="?q=addCustomer">
                        <i class="fas fa-plus"></i> Thêm Khách Hàng
                    </a>
                    <a class="btn btn-danger btn-sm" href="?q=trashCustomer">
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
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Họ và Tên
                            </th>
                            <th style="width: 10%">
                                Số điện thoại
                            </th>
                            <th style="width: 20%">
                                Tên người dùng
                            </th>
                            <th style="width: 20%">
                                Tùy chỉnh
                            </th>
                        </tr>
                    </thead>

                    <tbody id="myTable">
                        <?php
                        $result = $customer->getCustomer();
                        $i = 1;
                        if ($result) {
                            while ($value = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><a href="?q=infoCustomer&id=<?php echo $value['id'] ?>"><?php echo $value['fullname'] ?></a></td>
                                    <td>0<?php echo $value['phone'] ?></td>
                                    <td><?php echo $value['username'] ?></td>
                                    <td project-state>
                                        <a class="btn btn-primary btn-sm" href="?q=editCustomer&id=<?php echo $value['id'] ?>" class="edit" title="Edit" data-toggle="tooltip">
                                            <i class="fas fa-pencil-alt"></i> Chỉnh sửa
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="?q=customer&id=<?php echo $value['id'] ?>" type="submit"><i class="fa fa-trash-o" aria-hidden="true">
                                                <i class="fas fa-times"></i> Xóa tạm thời
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