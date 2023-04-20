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
                    <i class="zmdi zmdi-plus"></i>Thêm nhân viên</button></a>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive table-responsive-data2 ">
                        <table class="table table-data2 text-center list_employee">
                            <thead>
                                <tr>
                                    <th>Mã NV</th>
                                    <!-- <th>Ảnh</th> -->
                                    <th>Tên NV</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Tình trạng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="list_employee">
                                <?php 
                                    foreach($employees as $employee) {
                                ?>
                                <tr class="tr-shadow">
                                    <td>
                                        <a href="index.php?page=employee&method=update&id=<?=$employee['id']?>">
                                            <?=$employee['id']?>
                                        </a>
                                    </td>
                                    <!-- <td><?=$employee['avatar']?></td> -->
                                    <td class="desc"><?=$employee['name']?></td>
                                    <td><?=$employee['gender']?></td>
                                    <td><?=$employee['birth_date']?></td>
                                    <td><?=$employee['email']?></td>
                                    <td><?=$employee['tel']?></td>
                                    <td>
                                        <span
                                            class="<?=classStatusUser($employee['status'])?>"><?=statusUser($employee['status'])?></span>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button value="<?=$employee['id']?>" class="item detail_product"
                                                data-placement="top" title="More">
                                                <a href="index.php?page=employee&method=show&id=<?=$employee['id']?>">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <a href="index.php?page=employee&method=edit&id=<?=$employee['id']?>">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                            </button>
                                            <button data-id="<?=$employee['id']?>" id="del_item"
                                                url="index.php?page=employee&method=delete&id=<?=$employee['id']?>"
                                                class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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