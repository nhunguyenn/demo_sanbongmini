<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location='./?q=customer';</script>";
} else {
    $id = $_GET['id'];
}
?>

<div class="content-wrapper" style="min-height: 1604.8px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thông tin khách hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thông tin khách hàng</li>
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3 ">
                                                <label class="form-label" for="fullname">Họ và tên</label>
                                                <input type="text" class="form-control" name="fullname" disabled value="<?php echo $value['fullname'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="phone">Số điện thoại</label>
                                            <input type="text" class="form-control" name="phone" disabled value="<?php echo $value['phone'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
</div>