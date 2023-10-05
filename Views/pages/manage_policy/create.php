<?php ob_start(); ?>
Cập nhật chính sách bán lẻ
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="index.php?page=policy"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="fa fa-list-ul"></i>Chính sách khuyến mãi</button></a>
            <div class="col-lg-12">
                <div class="card m-t-30">
                    <div class="card-body card-block">
                        <form id="frm_create" action="index.php?page=policy&method=store" method="POST"
                            enctype="multipart/form-data" class="form-horizontal" name="frm_create">
                            <input type="hidden" value="index.php?page=policy&method=store" name="url">
                            
                            <div class="row form-group">
                                <div class="col-6">
                                    <!-- <div class="row">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label">Người lập</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input required type="text" id="name" name="name"
                                                placeholder="Người lập" class="form-control" value="">
                                        </div>
                                    </div> -->
                                    <div class="row">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label">Người lập</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select required name="name" id="name"
                                                class="form-control">
                                                <?php
                                            foreach($customers as $customer) {
                                            ?>
                                                <option customerId="<?=$customer['Id']?>"
                                                    value="<?=$customer['Id']?>">
                                                    <?=$customer['Code']?> - <?=$customer['Name']?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col col-md-3">
                                            <label for="doc_date" class=" form-control-label"> Ngày lập</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" name="doc_date" id="doc_date">
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
                                            <input type="date" name="start_date" id="start_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col col-md-3">
                                            <label for="end_date" class=" form-control-label"> Ngày kết thúc</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" name="end_date" id="end_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col col-md-3">
                                            <label for="description" class=" form-control-label"> Mô tả</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input required type="text" id="description" name="description"
                                                placeholder="Nhập mô tả chính sách" class="form-control"
                                                value="Chính sách khuyến mãi">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col col-md-3">
                                            <label for="isclosed" class=" form-control-label">IsClose</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="checkbox" id="isclosed" name="isclosed"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" name="add_policy">
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
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Chi tiết chính sách</strong>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive table-responsive-data2 ">
                                <table class="table table-data2 text-center list_order_detail">
                                    <thead>
                                        <tr>
                                            <th>Mã</th>
                                            <th>Đơn vị tính</th>
                                            <th>Mã hàng tặng</th>
                                            <th>Số lượng tặng</th>
                                            <th>Tối đa</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list_order_detail">
                                        <tr class="tr-shadow">
                                            <td>1509</td>
                                            <td>Cái</td>
                                            <td class="desc">1508</td>
                                            <td>10</td>
                                            <td>100</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item del_order_detail" value="83" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="tr-shadow">
                                            <td>1509</td>
                                            <td>Cái</td>
                                            <td class="desc">1508</td>
                                            <td>10</td>
                                            <td>100</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item del_order_detail" value="83" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="tr-shadow">
                                            <td colspan="5">
                                            </td>
                                            <td colspan="3">
                                                <button type="submit" name="update_status" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Lưu
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Hoàn tác
                                                </button>
                                                

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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

<?php $script = ob_get_clean(); ?>

<?php include_once "./Views/layouts/app_web.php"; ?>