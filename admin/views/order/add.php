<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $date_order = $_POST['date_order'];
    $email = $_POST['email'];
    $sport = $_POST['sport'];
    $time = $_POST['time'];
    $deposit = $_POST['deposit'];
    $description = $_POST['description'];
    $place_check = $place->setPlace($fullname, $phone, $date_order, $email, $sport, $time, $deposit, $description);
}
if (isset($place_check)) echo $place_check;
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

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-7">
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
                        <form action="?q=addOrder" method="post">
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="fullname">Tên khách hàng</label>
                                        <input type="text" class="form-control" name="fullname" placeholder="Nguyễn Văn A">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone" placeholder="0377027436">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="nguyenvana@gmail.com">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="date_order">Ngày đặt sân</label>
                                        <input type="date" class="form-control" name="date_order">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3 ">
                                        <label class="form-label" for="sport">Loại sân</label>
                                        <select class="form-control" aria-label="Default select example" name="sport">
                                            <option value="">Chọn loại sân</option>
                                            <?php
                                            $getSport = $place->getSport();
                                            if ($getSport) {
                                                while ($valueSport = $getSport->fetch_assoc()) {
                                            ?>
                                                    <option value="<?php echo $valueSport['id'] ?>"><?php echo $valueSport['name'] ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <div class="mb-3 ">
                                        <label class="form-label" for="time">Khung giờ</label>
                                        <select class="form-control" aria-label="Default select example" name="time">
                                            <option value="">Chọn khung giờ</option>
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
                                        <input type="number" class="form-control" name="deposit">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Ghi chú</label>
                                        <textarea class="form-control" name="description" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <button type="submit" class="btn btn-primary">Đặt sân</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bảng giá sân/loại sân</h3>
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
                                    <th style="width: 10%">Sân/loại sân</th>
                                    <th style="width: 10%">Giá tiền</th>
                                    <th style="width: 10%">Giá cọc</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $list_getSport = $place->getSport();
                                if ($list_getSport) {
                                    while ($list_Sport = $list_getSport->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?php echo $list_Sport['name'] ?></td>
                                            <td><?php echo $list_Sport['price'] ?> VNĐ</td>
                                            <td><?php echo $list_Sport['deposit'] ?> VNĐ</td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
</div>