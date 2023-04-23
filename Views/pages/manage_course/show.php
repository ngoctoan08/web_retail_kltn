<?php ob_start(); ?>
Thông tin khóa học
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div id="noti"></div>
            <div class="col-lg-12">
                <a href="index.php?page=course"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Danh sách khóa học</button></a>
                <div class="card m-t-30">
                    <div class="card-header">
                        <strong>Thông tin khóa học</strong>
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
                                    <img src="./public/storage/courses_images/<?=$course['avatar']?>" alt=""
                                        width="100px">
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Mã khóa học: <b><?=$course['id']?></b></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Tên khóa học: <?=$course['name']?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static"> Ngày bắt đầu: <?=$course['start_date']?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Ngày kết thúc: <?=$course['end_date']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static"> Thời lượng: <?=$course['course_duration']?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Trạng thái: <?=$course['status']?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <label for="">Mô tả</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static"><?=$course['description']?></p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>



        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                            href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="more_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-description">
                ...
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>


<!-- script -->
<?php ob_start(); ?>
<script src="./public/shared/js/validator.js"></script>
<script>
Validator({
    form: '#frm_create',
    errorSelector: '.form-error',
    rules: [
        Validator.isRequired('#name'),
        Validator.isRequired('#email'),
        Validator.isEmail('#email'),
        Validator.isRequired('#address'),
        Validator.isRequired('#gender'),
        Validator.isRequired('#tel'),
        Validator.isRequired('#contract'),
        Validator.isRequired('#department'),
        Validator.isRequired('#position'),
        Validator.isRequired('#salary'),

    ],
    onSubmit: function(data) {
        // Call API
        console.log(data);
        createcourse(data)
    }
});

function createcourse(data) {
    var options = {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify(data) // body data type must match "Content-Type" header
    }
    // Fetch API 
    fetch(data.url, options)
        .then((response) => response.json())
        .then((data) => {
            if (data.status == 200) {
                alertSuccess(data.message);
                location.reload();
            } else {
                alertError(data.message);
            }
        })
}
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