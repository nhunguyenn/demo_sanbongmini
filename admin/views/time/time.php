<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $start = $_POST['start'];
    $end = $_POST['end'];
    $time_check = $time->setTime($start,$end);
}
if (isset($time_check)) {
    echo $time_check;
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $time_delete = $time->deleteTime($id);
    if (isset($time_delete)) {
        echo $time_delete;
        echo '<script> setTimeout(() => { window.location = "?q=time"; }, 500); </script>';
    }
}
?>




<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý khung giờ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý khung giờ</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách khung giờ</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0" style="display: block;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 10%">Thời gian bắt đầu</th>
                                    <th style="width: 10%">Thời gian kết thúc</th>
                                    <th style="width: 10%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $result = $time->getTime();
                                $i = 1;
                                if ($result) {
                                    while ($value = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $value['start'] ?></td>
                                            <td><?php echo $value['end'] ?></td>
                                            <td project-state>
                                                <a class="btn btn-danger btn-sm" href="?q=time&id=<?php echo $value['id'] ?>" type="submit"><i class="fa fa-trash-o" aria-hidden="true">
                                                        <i class="fas fa-times"></i> Xóa khung giờ
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
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thêm khung giờ</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="?q=time" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="inputZip">Thời gian bắt đầu:</label>
                                <input type="time" name="start" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputZip">Thời gian kết thúc:</label>
                                <input type="time" name="end" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-plus"></i> Thêm khung giờ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>