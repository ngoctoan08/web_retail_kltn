<?php ob_start(); ?>
Danh sách lớp học
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<!-- page list rooms -->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="index.php?page=classroom&method=create_allocate"><button
                    class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Phân bổ lớp</button></a>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive table-responsive-data2 ">
                        <table class="table table-data2 text-center list_classroom">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ngày</th>
                                    <th>TT Phòng</th>
                                    <th>Thời gian</th>
                                    <th>Khóa</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="list_classroom">
                                <?php 
                                    $i=0;
                                    foreach($classrooms as $classroom) {
                                        $i++;
                                ?>
                                <tr class="tr-shadow" id="item_<?=$classroom['id']?>">
                                    <td class=""><?=$i?></td>

                                    <td><?=$classroom['day']?></td>
                                    <td class="desc">
                                        <?=$classroom['room_name']?>
                                        <br>
                                        <?=$classroom['place_name']?>

                                    </td>
                                    <td>
                                        <?=$classroom['start_time']?>
                                        <br>
                                        <?=$classroom['end_time']?>

                                    </td>
                                    <td><?=$classroom['course_name']?></td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button value="<?=$classroom['id']?>" class="item " data-placement="top"
                                                title="More">
                                                <a href="index.php?page=classroom&method=show&id=<?=$classroom['id']?>">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <a href="index.php?page=classroom&method=edit&id=<?=$classroom['id']?>">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                            </button>
                                            <button data-id="<?=$classroom['id']?>"
                                                url="index.php?page=classroom&method=delete&id=<?=$classroom['id']?>"
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