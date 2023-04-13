<?php ob_start(); ?>
List Employee
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<!-- page list employees -->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="index.php?page=employee&method=create"><button
                    class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Thêm thành viên</button></a>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive table-responsive-data2 ">
                        <table class="table table-data2 text-center list_employee">
                            <thead>
                                <tr>
                                    <th>Mã thành viên</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Thành viên</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Vai trò</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="list_employee">
                                <?php 
                                    foreach($users as $user) {
                                ?>
                                <tr class="tr-shadow">
                                    <td>
                                        <a href="index.php?page=employee&method=update&id=<?=$user['id']?>">
                                            <?=$user['id']?>
                                        </a>
                                    </td>
                                    <td><?=$user['avatar']?></td>
                                    <td class="desc"><?=$user['name']?></td>
                                    <td><?=$user['created_at']?></td>
                                    <td>
                                        <span
                                            class="<?=classStatusUser($user['status'])?>"><?=statusUser($user['status'])?></span>
                                    </td>
                                    <td> <span
                                            class="<?=roleUser($user['role_id'])?>"><?=titleUser($user['role_id'])?></span>
                                    </td>

                                    <td>
                                        <div class="table-data-feature">
                                            <button value="<?=$user['id']?>" class="item detail_product"
                                                data-placement="top" title="More">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <a href="index.php?page=employee&method=edit&id=<?=$user['id']?>">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                            </button>
                                            <button value="<?=$user['id']?>" id="del_item" class="item"
                                                data-toggle="tooltip" data-placement="top" title="Delete">
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