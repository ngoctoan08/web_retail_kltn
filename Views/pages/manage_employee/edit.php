<?php ob_start(); ?>
Cập nhật thông tin nhân viên
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="index.php?page=employee"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="fa fa-list-ul"></i>Danh sách nhân viên</button></a>
            <div class="card m-t-30">
                <div class="card-body card-block">
                    <form id="frm_create" action="index.php?page=employee&method=update&id=<?=$employee['id']?>"
                        method="POST" enctype="multipart/form-data" class="form-horizontal" name="frm_create">
                        <input type="hidden" value="index.php?page=employee&method=store" name="url">
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label"> Họ tên</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input required type="text" id="name" name="name" placeholder="Nhập họ tên"
                                            class="form-control" value="<?=$employee['name']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="birth_date" class=" form-control-label"> Ngày sinh</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" name="birth_date" id="birth_date"
                                            value="<?=$employee['birth_date']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label"> Giới tính</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select required name="gender" id="gender" class="form-control">
                                            <option <?= $employee['gender'] == "Nam" ? "selected" : '' ?> value="Nam">
                                                Nam</option>
                                            <option <?= $employee['gender'] == "Nữ" ? "selected" : '' ?> value="Nữ">Nữ
                                            </option>
                                            <option <?= $employee['gender'] == "Khác" ? "selected" : '' ?> value="Khác">
                                                Khác</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="address" class=" form-control-label"> Địa chỉ</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input required type="text" id="address" name="address"
                                            placeholder="Nhập địa chỉ" class="form-control"
                                            value="<?=$employee['address']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="tel" class=" form-control-label"> Tel</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input required type="text" id="tel" name="tel" placeholder="Nhập số điện thoại"
                                            class="form-control" value="<?=$employee['tel']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="email" class=" form-control-label"> Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input required type="text" id="email" name="email" placeholder="Nhập Email"
                                            class="form-control" value="<?=$employee['email']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="department" class=" form-control-label">Phòng ban</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select required name="department" id="department"
                                            class="form-control change_department">
                                            <?php
                                        foreach($departments as $department) {
                                        ?>
                                            <option
                                                <?=$employee['department_name'] == $department['name'] ? "selected" : ''?>
                                                departmentId="<?=$department['id']?>" value="<?=$department['name']?>">
                                                <?=$department['name']?>
                                            </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="position" class=" form-control-label">Vị trí</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="position" id="position" class="form-control">
                                            <option value="<?=$employee['position_name']?>">
                                                <?=$employee['position_name']?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="contract" class=" form-control-label">Hợp đồng</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select required name="contract" id="contract" class="form-control">
                                            <?php
                                        foreach($contracts as $contract) {
                                        ?>
                                            <option
                                                <?= $employee['contract_name'] == $contract['name'] ? "selected" : '' ?>
                                                t value="<?=$contract['name']?>"><?=$contract['name']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="salary" class=" form-control-label">Lương</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" required min='0' step="0.5" id="salary" name="salary"
                                            placeholder="Nhập lương" class="form-control"
                                            value="<?= $employee['salary']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="start_date" class=" form-control-label"> Ngày BD</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" name="start_date" id="start_date"
                                            value="<?= $employee['start_date']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="end_date" class=" form-control-label"> Ngày KT</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" name="end_date" id="end_date"
                                            value="<?= $employee['end_date']?>">
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
                                <div id=" uploadedImages">

                                </div>
                                <img class="m-t-10 up_ava__success" style="width: 100px;"
                                    src="./public/storage/employee_images/<?=$employee['avatar']?>" alt="">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" name="add_employee">
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