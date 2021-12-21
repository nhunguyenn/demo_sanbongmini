<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantily = $_POST['quantily'];
    $price = $_POST['price'];
    $network = $_POST['network'];
    $card_check = $card->setCard($quantily, $price, $network);
}
if (isset($card_check)) echo $card_check;
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý thẻ cào</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý thẻ cào</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách thẻ cào</h3>
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
                                    <th style="width: 10%">Số seri</th>
                                    <th style="width: 10%">Số thẻ cào</th>
                                    <th style="width: 10%">Mệnh giá (VNĐ)</th>
                                    <th style="width: 10%">Nhà mạng</th>
                                    <th style="width: 10%">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = $card->getCard();
                                $i = 1;
                                if ($result) {
                                    while ($value = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td style="font-weight: bold;"><?php echo $i++ ?></td>
                                            <td><?php echo $value['seri'] ?></td>
                                            <td><?php echo $value['number'] ?></td>
                                            <td><?php echo $value['price'] ?></td>
                                            <td><?php echo $value['network'] ?></td>
                                            <td>
                                                <?php if ($value['status'] == 0)
                                                    echo '<span class="right badge badge-danger">Chưa sử dụng</span>';
                                                else
                                                    echo '<span class="badge badge-primary right">Đã sử dụng</span>';
                                                ?>
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
                        <h3 class="card-title">Thêm Thẻ Cào</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="?q=card" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="inputZip">Số Lượng Thẻ:</label>
                                <input type="number" name="quantily" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputZip">Mệnh Giá:</label>
                                <select class="form-control" aria-label="Default select example" name="price">
                                    <option selected="" value="">Chọn mệnh giá</option>
                                    <option value="10000">10.000 VNĐ</option>
                                    <option value="20000">20.000 VNĐ</option>
                                    <option value="50000">50.000 VNĐ</option>
                                    <option value="100000">100.000 VNĐ</option>
                                    <option value="200000">200.000 VNĐ</option>
                                    <option value="500000">500.000 VNĐ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="inputZip">Nhà Mạng:</label>
                                <select class="form-control" aria-label="Default select example" name="network">
                                    <option selected="" value="">Chọn nhà mạng</option>
                                    <option value="Viettel">Viettel</option>
                                    <option value="MobiFone">MobiFone</option>
                                    <option value="Vietnamobile">Vietnamobile</option>
                                    <option value="Vinaphone">Vinaphone</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-plus"></i> Thêm thẻ cào</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>