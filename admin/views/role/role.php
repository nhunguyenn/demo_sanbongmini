<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $role_check = $decentralization->updateRole($username, $role);
}
if (isset($role_check)) echo $role_check;
?>

<div class="content-wrapper" style="min-height: 1604.8px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Phân quyền</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Phân quyền</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content-header">
        <div class="container-fluid">
            <div class="card mx-auto" style="width: 400px;">
                <div class="card-header">
                    <h3 class="card-title">PHÂN QUYỀN NHÂN VIÊN</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="?q=role" method="post">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="username">Tên người dùng</label>
                                    <input type="text" class="form-control" name="username" placeholder="nguyenvana">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-12 p-0">
                            <div class="mb-3 ">
                                <label class="form-label" for="role">Chức vụ</label>
                                <select class="form-control" aria-label="Default select example" name="role">
                                    <option value="">Chức vụ</option>
                                    <option value="1">1. Lễ Tân</option>
                                    <option value="2">2. Thu Ngân</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Phân quyền</button>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>