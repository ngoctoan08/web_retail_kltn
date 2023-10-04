<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="index.php">
            <!-- <img style="border-radius: 50%;" src="./public/shared/images/logo.png" width="100px" alt="Cool Admin" /> -->
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
                        <i class="fas fa-solid fa-book"></i>Quản lý khóa học</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.php?page=course">Danh sách khóa học</a>
                        </li>
                        <li>
                            <a href="index.php?page=course&method=create">Thêm khóa học</a>
                        </li>
                    </ul>
                </li>

                <li class="<?=checkActive('order')?> <?=checkActive('bill')?> has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-solid fa-flag"></i>Quản lý lớp học</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.php?page=classroom">Thông tin phòng</a>
                        </li>
                        <li>
                            <a href="index.php?page=classroom&method=allocate">Danh sách lớp</a>
                        </li>
                        <li>
                            <a href="index.php?page=classroom&method=create_allocate">Phân bổ lớp</a>
                        </li>
                    </ul>
                </li>

                <li class="<?=checkActive('order')?> <?=checkActive('bill')?> has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-solid fa-refresh"></i>Đăng ký khóa học</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.php?page=enroll_course">Danh sách</a>
                        </li>
                        <li>
                            <a href="index.php?page=enroll_course&method=create">Đăng ký</a>
                        </li>
                    </ul>
                </li>

                <li class="<?=checkActive('order')?> <?=checkActive('bill')?> has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-solid fa-question"></i>Kết quản đào tạo</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.php?page=employee_result">Danh sách</a>
                        </li>
                        <li>
                            <a href="index.php?page=employee_result&method=create">Tạo mới</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>