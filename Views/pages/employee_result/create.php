<?php ob_start(); ?>
Thêm mới
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="index.php?page=employee_result"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="fa fa-list-ul"></i>Danh sách kết quả</button></a>
            <div class="card m-t-30">
                <div class="card-body card-block">
                    <form id="frm_create" action="index.php?page=employee_result&method=store" method="POST"
                        enctype="multipart/form-data" class="form-horizontal" name="frm_create">
                        <input type="hidden" name="url" value="index.php?page=employee_result&method=store">
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label"> Phòng</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="department" id="department"
                                            class="form-control change_department_1">
                                            <?php
                                            foreach($departments as $department) {
                                                ?>
                                            <option value="<?=$department['name']?>"><?=$department['name']?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label"> Nhân viên</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="employee" id="employee" class="form-control change_employee">

                                        </select>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label"> Khóa học</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="course" id="course" class="form-control">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="score" class=" form-control-label"> Điểm</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" name="score" id="score">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" name="add_result">
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
Validator({
    form: '#frm_create',
    errorSelector: '.form-error',
    rules: [
        Validator.isRequired('#department'),
        Validator.isRequired('#employee'),
        Validator.isRequired('#course'),
        Validator.isRequired('#score'),
        Validator.checkScore('#score', 0, 10)
    ],
    onSubmit: function(data) {
        // Call API
        console.log(data);
        updateScore(data);
    }
});

function updateScore(data) {
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
                setTimeout(
                    location.href = "index.php?page=employee_result", 2000
                );
            } else {
                alertError(data.message);
            }
        })
}
</script>
<?php $script = ob_get_clean(); ?>

<?php include_once "./Views/layouts/app_web.php"; ?>