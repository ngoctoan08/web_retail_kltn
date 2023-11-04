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
                        <table class="table table-data2 text-center list_policy">
                            <thead>
                                <tr>
                                    <th>Ngày</th>
                                    <th>Số</th>
                                    <th>Diễn giải</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Người lập</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="list_policy">
                                <?php 
                                    foreach($policies as $policy) {
                                ?>
                                <tr class="tr-shadow" id="item_<?=$policy['id']?>">
                                    <td><?=$policy['DocDate']?></td>
                                    <td><?=$policy['DocNo']?></td>
                                    <td><?=$policy['Description']?></td>                       
                                    <td><?=$policy['StartDate']?></td>
                                    <td><?=$policy['EndDate']?></td>
                                    <td><?=$policy['EmployeeName']?></td>
                                    <td><?=$policy['IsClosed']?></td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button value="<?=$policy['Id']?>" class="item"
                                                data-placement="top" title="More">
                                                <a href="index.php?page=policy&method=show&id=<?=$policy['Id']?>">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <a href="index.php?page=policy&method=edit&id=<?=$policy['Id']?>">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                            </button>
                                            <button data-id="<?=$policy['Id']?>"
                                                url="index.php?page=policy&method=delete&id=<?=$policy['Id']?>"
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