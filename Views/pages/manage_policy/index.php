<?php ob_start(); ?>
Chính sách khuyến mãi
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<!-- page list policy -->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="index.php?page=policy&method=create"><button
                    class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Thêm mới chính sách</button></a>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive table-responsive-data2 ">
                        <table class="table table-data2 text-center list_course">
                            <thead>
                                <tr>
                                    <th>Ngày</th>
                                    <!-- <th>Ảnh</th> -->
                                    <th>Diễn giải</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Người lập</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="list_course">
                                <?php 
                                    foreach($courses as $course) {
                                ?>
                                <tr class="tr-shadow" id="item_<?=$course['id']?>">
                                    <td>
                                        <a href="index.php?page=course&method=update&id=<?=$course['id']?>">
                                            <?=$course['id']?>
                                        </a>
                                    </td>
                                    <td class="desc"><?=$course['name']?></td>
                                    <td><?=$course['start_date']?></td>
                                    <td><?=$course['end_date']?></td>
                                    <td><?=$course['course_duration']?></td>
                                    <td><?=$course['status']?></td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button value="<?=$course['id']?>" class="item detail_product"
                                                data-placement="top" title="More">
                                                <a href="index.php?page=course&method=show&id=<?=$course['id']?>">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <a href="index.php?page=course&method=edit&id=<?=$course['id']?>">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                            </button>
                                            <button data-id="<?=$course['id']?>"
                                                url="index.php?page=course&method=delete&id=<?=$course['id']?>"
                                                class="item del_item" data-toggle="tooltip" data-placement="top"
                                                title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>


<!-- script -->
<?php ob_start(); ?>
<script src="./public/shared/js/validator.js"></script>
<?php $script = ob_get_clean(); ?>

<?php include_once "./Views/layouts/app_web.php"; ?>