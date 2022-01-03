<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $deposit = $_POST['deposit'];
    $sport_check = $sport->setSport($name, $price, $deposit);
}
if (isset($sport_check)) {
    echo $sport_check;
}
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sport_delete = $sport->deleteSport($id);
    if (isset($sport_delete)) {
        echo $sport_delete;
        echo '<script> setTimeout(() => { window.location = "?q=sport"; }, 500); </script>';
    }
}

?>





<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sân/loại sân</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý sân/loại sân</li>
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
                        <h3 class="card-title">Danh sách sân/loại sân</h3>
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
                                    <th style="width: 10%">Sân/loại sân</th>
                                    <th style="width: 10%">Giá tiền</th>
                                    <th style="width: 10%">Giá cọc</th>
                                    <th style="width: 10%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = $sport->getSport();
                                $i = 1;
                                if ($result) {
                                    while ($value = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td style="font-weight: bold;"><?php echo $i++ ?></td>
                                            <td><?php echo $value['name'] ?></td>
                                            <td><?php echo $value['price'] ?> VNĐ</td>
                                            <td><?php echo $value['deposit'] ?> VNĐ</td>
                                            <td>
                                                <a class="btn btn-danger btn-sm" href="?q=sport&id=<?php echo $value['id'] ?>" type="submit"><i class="fa fa-trash-o" aria-hidden="true">
                                                        <i class="fas fa-times"></i> Xóa sân/loại sân
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
                        <h3 class="card-title">Thêm sân/loại sân</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="?q=sport" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="inputZip">Tên sân/loại sân:</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputZip">Giá sân/loại sân:</label>
                                <input type="number" name="price" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputZip">Số phần trăm cọc:</label>
                                <input type="number" name="deposit" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-plus"></i> Thêm sân/loại sân</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>