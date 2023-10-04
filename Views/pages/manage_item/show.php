<?php ob_start(); ?>
Thông tin vật tư
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div id="noti"></div>
            <div class="col-lg-12">
                <a href="index.php?page=item"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Danh sách vật tư</button></a>
                <div class="card m-t-30">
                    <div class="card-header">
                        <strong>Thông tin vật tư</strong>
                    </div>
                    <div class="card-body card-block text-left">

                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <span class="form-control-static m-r-10">Ảnh đại diện:</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <img src="./public/storage/item_images/<?=$item['Avatar']?>" alt=""
                                        width="100px">
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Mã: <b><?=$item['Code']?></b></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Tên: <?=$item['Name']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <div class="input-group">
                                        <p class="form-control-static">Đơn vị tính: <?=$item['Unit']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Đơn giá: <?=$item['Price']?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static ">Trạng thái: <b
                                            class="<?=classStatusUser($item['IsActive'])?>"><?=statusUser($item['IsActive']);?></b>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Người tạo: <?=$user['Name']?></p>
                                    <!-- <p class="form-control-static">Người tạo: <?=$item['CreatedBy']?></p> -->
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static"> Ngày tạo: <?=$item['CreatedAt']?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Ngày thay đổi: <?=$item['ModifiedAt']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<?php $content = ob_get_clean(); ?>


<!-- script -->
<?php ob_start(); ?>
<script src="./public/shared/js/validator.js"></script>
<script>
    var successMessage = '<?= $_SESSION['success'] ?>';
    if (successMessage) {
        confirmed = alertSuccess(successMessage);
        if (confirmed) {
            <?php unset($_SESSION['success']); ?>
        }
    }
</script>
<?php $script = ob_get_clean(); ?>

<?php include_once "./Views/layouts/app_web.php"; ?>