<?php ob_start(); ?>
Thêm mới nhân viên
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="index.php?page=item"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="fa fa-list-ul"></i>Danh sách vật tư hàng hoá</button></a>
            <div class="card m-t-30">
                <div class="card-body card-block">
                    <form id="frm_create" action="index.php?page=item&method=store" method="POST"
                        enctype="multipart/form-data" class="form-horizontal" name="frm_create">
                        <input type="hidden" value="index.php?page=item&method=store" name="url">
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="code" class=" form-control-label"> Nhập mã</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input required type="text" id="code" name="code" placeholder="Nhập mã"
                                            class="form-control" value="ItemCode">
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label"> Nhập tên</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input required type="text" id="name" name="name" placeholder="Nhập họ tên"
                                            class="form-control" value="ItemName">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="unit" class=" form-control-label">Đơn vị tính</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select required name="unit" id="unit"
                                            class="form-control">
                                            <?php
                                        foreach($units as $unit) {
                                        ?>
                                            <option unitId="<?=$unit['Id']?>"
                                                value="<?=$unit['Description']?>">
                                                <?=$unit['Description']?>
                                            </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="price" class=" form-control-label">Đơn giá</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" required min='0' step="0.5" id="price" name="price"
                                            placeholder="Nhập đơn giá" class="form-control" value="10000000">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="avatar" class=" form-control-label">Ảnh đại diện</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="avatar" name="avatar" multiple=""
                                    accept="image/png, image/jpeg, image/jpg">
                                <div id="uploadedImages">

                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" name="add_item">
                                <i class="fa fa-dot-circle-o"></i> Lưu
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Hoàn tác
                            </button>
                        </div>
                    </form>
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