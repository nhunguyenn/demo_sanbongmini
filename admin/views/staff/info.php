<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location='./?q=staff';</script>";
} else {
    $id = $_GET['id'];
}
?>

<div class="content-wrapper" style="min-height: 1604.8px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thông tin nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thông tin nhân viên</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content-header">
        <div class="container-fluid">
            <form action="" method="post">
                <?php
                $getStaffId = $staff->getStaffId($id);
                if ($getStaffId) {
                    $value = $getStaffId->fetch_assoc();
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
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" class="form-control" name="email" disabled value="<?php echo $value['email'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="phone">Điện thoại</label>
                                                <input type="text" class="form-control" name="phone" disabled value="0<?php echo $value['phone'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <div class="mb-3 ">
                                            <label class="form-label" for="role">Chức vụ</label>
                                            <input type="text" class="form-control" name="role" disabled value="<?php if ($value['role'] == 1) echo 'Lễ Tân';
                                                                                                                else echo 'Thu Ngân'; ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="salary">Lương</label>
                                                <input type="text" class="form-control" name="salary" value="<?php echo $value['salary'] ?> VND" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="inputAddress">Địa chỉ</label>
                                                <input type="text" class="form-control" disabled name="address" value="<?php echo $value['address'] ?>">
                                            </div>
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