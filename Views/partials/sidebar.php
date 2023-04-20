<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="index.php">
            <img src=".public/admin_template/images/icon/logo1.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="<?=checkActive('dashboard')?> has-sub">
                    <a class="js-arrow" href="index.php?page=dashboard">
                        <i class="fas fa-tachometer-alt"></i>Tổng quan</a>
                </li>

                <li class="<?=checkActive('product')?> <?=checkActive('category')?> has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-solid fa-cube"></i>Quản lý nhân viên</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li <?= checkActive('product') ?>>
                            <a href="index.php?page=employee">Danh sách</a>
                        </li>
                        <li <?= checkActive('category') ?>>
                            <a href="index.php?page=employee&method=create">Thêm nhân viên</a>
                        </li>
                    </ul>
                </li>

                <li class="<?=checkActive('order')?> <?=checkActive('bill')?> has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-solid fa-exchange"></i>Quản lý khóa học</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.php?page=course">Danh sách khóa học</a>
                        </li>
                        <li>
                            <a href="index.php?page=course&method=create">Thêm khóa học</a>
                        </li>
                    </ul>
                </li>

                <li class="<?=checkActive('member')?> <?=$_SESSION['role_account'] != 10 ? 'd-none' : ''?> has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-solid fa-users"></i>Quản lý Nhân viên</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.php?page=employee">Danh sách thành viên</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>