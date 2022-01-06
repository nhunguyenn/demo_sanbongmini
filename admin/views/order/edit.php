<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location='./?q=order';</script>";
} else {
    $id = $_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date_order = $_POST['date_order'];
    $time = $_POST['time'];
    $Order_check = $place->updateOrder($id,$date_order, $time);
}
if (isset($Order_check)) echo $Order_check;
?>

<div class="content-wrapper">
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
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card mx-auto">
                    <div class="card-header">
                        <h3 class="card-title">ĐẶT SÂN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="" method="post">
                            <?php
                            $getOrderId = $place->getOrderId($id);
                            if ($getOrderId) {
                                $value = $getOrderId->fetch_assoc();
                            }
                            ?>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="fullname">Tên khách hàng</label>
                                        <input type="text" class="form-control" name="fullname" value="<?php echo $value['fullname'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone" value="<?php echo $value['phone'] ?>" disabled>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $value['email'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_order">Ngày đặt sân</label>
                                        <input type="date" class="form-control" name="date_order">
                                        <input type="text" class="form-control" name="date_order" value="<?php echo $value['date_order'] ?>" disabled>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <div class="mb-3 ">
                                        <label class="form-label" for="sport">Loại sân</label>
                                        <input type="text" class="form-control" value="<?php echo $value['name_sport'] ?>" disabled>
                                        
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3 ">
                                        <label class="form-label" for="time">Khung giờ</label>
                                        <select class="form-control" aria-label="Default select example" name="time">
                                        <option value="<?php echo $value['time'] ?>"> Khung giờ đã chọn [<?php echo $value['start_time'] ?> - <?php echo $value['end_time'] ?>]</option>
                                            <?php
                                            $getTime = $place->getTime();
                                            if ($getTime) {
                                                while ($value_Time = $getTime->fetch_assoc()) {
                                            ?>
                                                    <option value="<?php echo $value_Time['id'] ?>"><?php echo $value_Time['start'] ?> - <?php echo $value_Time['end'] ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="deposit">Tiền cọc</label>
                                        <input type="number" class="form-control"  value="<?php echo $value['deposit'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Ghi chú</label>
                                        <textarea class="form-control" name="description" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <button type="submit" class="btn btn-primary">Thay đổi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

</div>