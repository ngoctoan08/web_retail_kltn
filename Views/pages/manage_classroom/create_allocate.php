<?php ob_start(); ?>
Phân bổ lớp học
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="index.php?page=classroom"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="fa fa-list-ul"></i>Danh sách lớp học</button></a>
            <div class="card m-t-30">
                <div class="card-body card-block">
                    <form id="frm_create" action="index.php?page=classroom&method=store_allocate" method="POST"
                        enctype="multipart/form-data" class="form-horizontal" name="frm_create">
                        <input type="hidden" value="index.php?page=classroom&method=store_allocate" name="url">
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label"> Khóa học</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select required name="course" id="course" class="form-control">
                                            <?php
                                            foreach($courses as $course) {
                                                ?>
                                            <option value="<?=$course['id']?>"><?=$course['name']?></option>
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
                                        <label for="name" class=" form-control-label"> Phòng</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select required name="room" id="room" class="form-control">
                                            <?php
                                            foreach($rooms as $room) {
                                                ?>
                                            <option value="<?=$room['id']?>"><?=$room['place']?>
                                                (<?=$room['name']?>)
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label"> Ngày học</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select required name="day" id="day" class="form-control">
                                            <option value="Thứ hai">Thứ hai</option>
                                            <option value="Thứ ba">Thứ ba</option>
                                            <option value="Thứ tư">Thứ tư</option>
                                            <option value="Thứ năm">Thứ năm</option>
                                            <option value="Thứ sáu">Thứ sáu</option>
                                            <option value="Thứ bảy">Thứ bảy</option>
                                            <option value="Chủ nhật">Chủ nhật</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <label for="start_time" class=" form-control-label"> Bắt
                                                    đầu</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="time" name="start_time" id="start_time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <label for="end_time" class=" form-control-label"> Kết thúc</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="time" name="end_time" id="end_time">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" name="add_classroom">
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