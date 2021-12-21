<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location='./?q=staff';</script>";
} else {
    $id = $_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $staff_check = $staff->updateStaff($id, $fullname, $email, $phone, $address);
}
if (isset($staff_check)) echo $staff_check;
?>

<div class="content-wrapper" style="min-height: 1604.8px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa nhân viên</li>
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
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $value['email'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="phone">Điện thoại</label>
                                                <input type="text" class="form-control" name="phone" value="0<?php echo $value['phone'] ?>">
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
                                                <input type="text" class="form-control" name="address" value="<?php echo $value['address'] ?>">
                                            </div>
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