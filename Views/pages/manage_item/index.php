<?php ob_start(); ?>
Danh sách vật tư
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<!-- page list items -->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="index.php?page=item&method=create"><button
                    class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Thêm nhân viên</button></a>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive table-responsive-data2 ">
                        <table class="table table-data2 text-center list_item">
                            <thead>
                                <tr>
                                    <th>Mã</th>
                                    <!-- <th>Ảnh</th> -->
                                    <th>Tên</th>
                                    <!-- <th>Ảnh đại diện</th> -->
                                    <th>Đơn vị tính</th>
                                    <th>Đơn giá</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="list_item">
                                <?php 
                                    foreach($items as $item) {
                                ?>
                                <tr class="tr-shadow" id="item_<?=$item['Id']?>">
                                    <td>
                                        <a href="index.php?page=item&method=update&id=<?=$item['Id']?>">
                                            <?=$item['Code']?>
                                        </a>
                                    </td>
                                    <td><?=$item['Name']?></td>
                                    <!-- <td><?=$item['Avatar']?></td> -->

                                    <td><?=$item['Unit']?></td>
                                    <td><?=$item['Price']?></td>
                                    <td>
                                        <span
                                            class="<?=classStatusUser($item['IsActive'])?>"><?=statusUser($item['IsActive'])?></span>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button value="<?=$item['id']?>" class="item detail_product"
                                                data-placement="top" title="More">
                                                <a href="index.php?page=item&method=show&id=<?=$item['Id']?>">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <a href="index.php?page=item&method=edit&id=<?=$item['Id']?>">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                            </button>
                                            <button data-id="<?=$item['Id']?>"
                                                url="index.php?page=item&method=delete&id=<?=$item['Id']?>"
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