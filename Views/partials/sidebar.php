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
                        <i class="fas fa-solid fa-cube"></i>Quản lý vật tư</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li <?= checkActive('product') ?>>
                            <a href="index.php?page=item">Danh mục vật tư</a>
                        </li>
                        <li <?= checkActive('category') ?>>
                            <a href="index.php?page=item&method=create">Thêm mới vật tư</a>
                        </li>
                    </ul>
                </li>

                <li class="<?=checkActive('order')?> <?=checkActive('bill')?> has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-solid fa-book"></i>Chính sách khuyến mãi</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.php?page=policy">Danh sách</a>
                        </li>
                        <li>
                            <a href="index.php?page=policy&method=create">Thêm mới chính sách</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>