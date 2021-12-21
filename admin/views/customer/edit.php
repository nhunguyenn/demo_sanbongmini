<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location='./?q=customer';</script>";
} else {
    $id = $_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $Customer_check = $customer->updateCustomer($id, $fullname, $phone);
}
if (isset($Customer_check)) echo $Customer_check;
?>

<div class="content-wrapper" style="min-height: 1604.8px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa khách hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa khách hàng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content-header">
        <div class="container-fluid">
            <form action="" method="post">
                <?php
                $getCustomerId = $customer->getCustomerId($id);
                if ($getCustomerId) {
                    $value = $getCustomerId->fetch_assoc();
                }
                ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">CHỈNH SỬA KHÁCH HÀNG</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id ?>">
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Tên người dùng</label>
                                            <input type="text" class="form-control" name="username" id="" value="<?php echo $value['username'] ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">CHỈNH SỬA NHÂN VIÊN</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3 ">
                                                <label class="form-label" for="fullname">Họ và tên</label>
                                                <input type="text" class="form-control" name="fullname" value="<?php echo $value['fullname'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="phone">Số điện thoại</label>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $value['phone'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
</div>