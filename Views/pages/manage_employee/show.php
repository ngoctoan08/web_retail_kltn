<?php ob_start(); ?>
Thông tin nhân viên
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div id="noti"></div>
            <div class="col-lg-12">
                <a href="index.php?page=employee"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Danh sách nhân viên</button></a>
                <div class="card m-t-30">
                    <div class="card-header">
                        <strong>Thông tin nhân viên</strong>
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
                                    <img src="./public/storage/employee_images/<?=$employee['avatar']?>" alt=""
                                        width="100px">
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Mã nhân viên: <b><?=$employee['id']?></b></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Họ tên: <?=$employee['name']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <div class="input-group">
                                        <p class="form-control-static">Ngày sinh: <?=$employee['birth_date']?></p>
                                        <!-- <div class="input-group-addon">
                                                <i class="far fa-calculator"></i>
                                                <i class="far fa-envelope"></i>
                                            </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Số điện thoại: <?=$employee['tel']?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static ">Trạng thái: <b
                                            class="<?=addColorStatus($employee['status'])?>"><?=checkStatus($employee['status']);?></b>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Email: <?=$employee['email']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static"> Giới tính: <?=$employee['gender']?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Địa chỉ: <?=$employee['address']?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static"> Phòng ban: <?=$employee['department_name']?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Chức vụ: <?=$employee['position_name']?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static"> Hợp đồng: <?=$employee['contract_name']?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Lương: <?=$employee['salary']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static"> Ngày bắt đầu: <?=$employee['start_date']?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 col-md-12">
                                    <p class="form-control-static">Ngày kết thúc: <?=$employee['end_date']?></p>
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
        createEmployee(data)
    }
});

function createEmployee(data) {
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