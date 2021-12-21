<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_GET['restore'])) {
        $checkStaff = $staff->restoreStaff($id);
    }
    if (isset($_GET['delete'])) {
        $checkStaff = $staff->deleteStaff($id);
    }
}
?>
<?php
if (isset($checkStaff)) {
    echo $checkStaff;
?>
    <script>
        setTimeout(() => {
            window.location = '?q=trashStaff';
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
                    <h1>Quản lý nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý nhân viên</li>
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
                <h3 class="card-title">Danh sách nhân viên đã xóa</h3>
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
                                Email
                            </th>
                            <th style="width: 10%">
                                Chức vụ
                            </th>
                            <th style="width: 20%">
                                Tùy chỉnh
                            </th>
                        </tr>
                    </thead>

                    <tbody id="myTable">
                        <?php
                        $result = $staff->getStaffTrash();
                        $i = 1;
                        if ($result) {
                            while ($value = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><a href="?q=infoStaff&id=<?php echo $value['id'] ?>"><?php echo $value['fullname'] ?></a></td>
                                    <td><?php echo $value['phone'] ?></td>
                                    <td><?php echo $value['email'] ?></td>
                                    <td>
                                        <?php if ($value['role'] == 1) echo 'Lễ Tân';
                                        else echo 'Thu Ngân'; ?>
                                    </td>
                                    <td project-state>
                                        <a class="btn btn-primary btn-sm" href="?q=trashStaff&restore&id=<?php echo $value['id'] ?>" data-toggle="tooltip">
                                            <i class="fas fa-reply-all"></i> Phục hồi
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="?q=trashStaff&delete&id=<?php echo $value['id'] ?>" type="submit"><i class="fa fa-trash-o" aria-hidden="true">
                                                <i class="fas fa-times"></i> Xóa vĩnh viễn
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