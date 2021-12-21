<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $customer_check = $customer->setCustomer($username, $fullname, $phone);
}
if (isset($customer_check)) echo $customer_check;
?>

<div class="content-wrapper" style="min-height: 1604.8px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm khách hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm khách hàng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content-header">
        <div class="container-fluid">
            <form action="?q=addCustomer" method="post">
                <div class="card mx-auto" style="width: 400px;">
                    <div class="card-header">
                        <h3 class="card-title">THÊM KHÁCH HÀNG</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="username">Tên người dùng</label>
                                    <input type="text" class="form-control" name="username" placeholder="nguyenvana">
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="fullname">Họ và tên</label>
                                    <input type="text" class="form-control" name="fullname" placeholder="Nguyễn Văn A">
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" placeholder="0190023183">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm khách hàng</button>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
</div>