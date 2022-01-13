<a href="?q=home" class="brand-link text-center">
    <span class="brand-text font-weight-light">QUẢN LÝ HỆ THỐNG</span>
</a>

<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel p-1 text-center">
        <a class="d-block"><?php echo Session::get('name'); ?></a>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="?q=home" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Trang Chủ</p>
                </a>
            </li>
            <li class="nav-header">QUẢN LÝ TRANG</li>

            <li class="nav-item">
                <?php
                if (Session::get('role') == 0 || Session::get('role') == 1) {
                ?>
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Quản lý người dùng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                <?php } ?>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <?php
                        if (Session::get('role') == 0) {
                        ?>
                            <a href="?q=staff" class="nav-link">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                                <p>&nbsp; Quản lý nhân viên</p>
                            </a>
                            <a href="?q=role" class="nav-link">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                                <p>&nbsp; Phân quyền</p>
                            </a>
                        <?php } ?>
                        <?php
                        if (Session::get('role') == 0 || Session::get('role') == 1) {
                        ?>
                            <a href="?q=customer" class="nav-link">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                                <p>&nbsp; Quản lý khách hàng</p>
                            </a>
                        <?php } ?>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <?php
                if (Session::get('role') == 0 || Session::get('role') == 2) {
                ?>
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>
                            Quản lý danh thu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?q=card" class="nav-link">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                                <p>&nbsp; Quản lý thẻ cào</p>
                            </a>
                            <a href="?q=bill" class="nav-link">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                                <p>&nbsp; Quản lý hóa đơn</p>
                            </a>
                            <a href="?q=statistical" class="nav-link">
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                                <p>&nbsp; Thống kê doanh thu</p>
                            </a>
                        </li>
                    </ul>
            </li>
        <?php } ?>
        <li class="nav-item">
            <?php
            if (Session::get('role') == 0 || Session::get('role') == 1) {
            ?>
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-fire"></i>
                    <p>
                        Quản lý sân bóng
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
            <?php } ?>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <?php
                    if (Session::get('role') == 0) {
                    ?>
                        <a href="?q=sport" class="nav-link">
                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                            <p>&nbsp; Quản lý sân/loại sân</p>
                        </a>
                    <?php } ?>
                    <?php
                    if (Session::get('role') == 0 || Session::get('role') == 1) {
                    ?>
                        <a href="?q=order" class="nav-link">
                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                            <p>&nbsp; Quản lý đặt sân</p>
                        </a>
                    <?php } ?>
                    <?php
                    if (Session::get('role') == 0) {
                    ?>
                        <a href="?q=time" class="nav-link">
                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                            <p>&nbsp; Quản lý khung giờ</p>
                        </a>
                    <?php } ?>
                </li>
            </ul>
        </li>
        <li class="nav-header">THAO TÁC KHÁC</li>
        <li class="nav-item">
            <?php
            if (isset($_GET['q']) && $_GET['q'] == 'logout') {
                Session::destroy();
            }
            ?>
            <a href="?q=logout" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Đăng Xuất
                </p>
            </a>
        </li>
        </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>