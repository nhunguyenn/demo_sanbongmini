<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location='./?q=bill';</script>";
} else {
    $id = $_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_staff = $_POST['id_staff'];
    $total_bill = $_POST['total_bill'];
    $payment_check = $bill->payment($id_staff,$id,$total_bill);
}
if (isset($payment_check)) echo $payment_check;
?>

<div class="content-wrapper">
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
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card mx-auto">
                    <div class="card-header">
                        <h3 class="card-title">HÓA ĐƠN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="" method="post">
                            <?php
                            $getOrderId = $bill->getOrderId($id);
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
                                        <input type="text" class="form-control" value="<?php echo $value['start_time'] ?> - <?php echo $value['end_time'] ?> " disabled>
                                                                                    
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="deposit">Tiền cọc</label>
                                        <input type="number" class="form-control"  value="<?php echo $value['deposit'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="deposit">Tổng tiền</label>
                                        <input type="number" class="form-control" value="<?php echo $value['price'] ?>" disabled>
                                        <input type="hidden" class="form-control" value="<?php echo $value['price'] ?>" name = "total_bill">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="deposit">Nhân viên</label>
                                        <input type="text" class="form-control" value="<?php echo Session::get('name'); ?>" disabled>
                                        <input type="hidden" class="form-control" value="<?php echo Session::get('id'); ?>" name = "id_staff">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Ghi chú</label>
                                        <textarea class="form-control" name="description" rows="3" disabled></textarea>
                                    </div>
                                </div>
                                <?php
                                    if ($value['activate']==1) {
                                ?>
                                <div class="mb-3 col-md-12">

                                    <button type="submit" class="btn btn-primary">Thanh toán</button>
                                </div>
                                <?php } ?> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

</div>