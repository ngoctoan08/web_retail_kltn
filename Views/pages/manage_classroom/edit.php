<?php ob_start(); ?>
Cập nhật thông tin khóa học
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="index.php?page=course"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="fa fa-list-ul"></i>Danh sách khóa học</button></a>
            <div class="card m-t-30">
                <div class="card-body card-block">
                    <form id="frm_edit" action="index.php?page=course&method=update&id=<?=$course['id']?>" method="POST"
                        enctype="multipart/form-data" class="form-horizontal" name="frm_edit">
                        <input type="hidden" value="index.php?page=course&method=update" name="url">
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label"> Tên</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input required type="text" id="name" name="name"
                                            placeholder="Nhập tên khóa học" class="form-control"
                                            value="<?=$course['name']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="course_duration" class=" form-control-label"> Thời lượng</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" name="course_duration" id="course_duration"
                                            value="<?=$course['course_duration']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="start_date" class=" form-control-label"> Ngày bắt đầu</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" name="start_date" id="start_date"
                                            value="<?=$course['start_date']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="end_date" class=" form-control-label"> Ngày kết thúc</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" name="end_date" id="end_date"
                                            value="<?=$course['end_date']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="description" class=" form-control-label"> Mô tả</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input required type="text" id="description" name="description"
                                            placeholder="Nhập mô tả khóa học" class="form-control"
                                            value="<?=$course['description']?>">
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
                                <img class="m-t-10 up_ava__success" style="width: 100px;"
                                    src="./public/storage/courses_images/<?=$course['avatar']?>" alt="">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" name="add_course">
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