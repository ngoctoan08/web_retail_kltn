<?php ob_start(); ?>
Cập nhật chính sách bán lẻ
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <a href="index.php?page=policy">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="fa fa-list-ul"></i>Chính sách khuyến mãi
                </button>
            </a>
            <div class="col-lg-12">
                <form id="frm_create" action="index.php?page=policy&method=store" method="POST" enctype="multipart/form-data" class="form-horizontal" name="frm_create">

                    <div class="card m-t-30">
                        <div class="card-body card-block">
                            <!-- <form id="frm_create" action="index.php?page=policy&method=store" method="POST" enctype="multipart/form-data" class="form-horizontal" name="frm_create"> -->
                                <input type="hidden" value="index.php?page=policy&method=store" name="url">
                                
                                <div class="row form-group">
                                    <div class="col-6">
                                        
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <label for="employee" class=" form-control-label">NV lập</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static"><?=$policy['EmployeeName']?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <label for="doc_date" class=" form-control-label"> Ngày lập</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static"><?=$policy['CreatedAt']?></p>

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
                                                <p class="form-control-static"><?=$policy['StartDate']?></p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <label for="end_date" class=" form-control-label"> Ngày kết thúc</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static"><?=$policy['EndDate']?></p>
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
                                                <p class="form-control-static"><?=$policy['Description']?></p>
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

                        </div>

                    </div>
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
                                                <th>Mã hàng mua</th>
                                                <th>Mã hàng tặng</th>
                                                <th>Số lượng tặng</th>
                                                <th>Số lượng tối đa</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data-grid">
                                        <?php
                                            foreach($items as $item) {
                                        ?>
                                        <tr class="m-t-10">

                                            <td>
                                                <p class="form-control-static"><?=$item['ItemCode']." - ".$item['ItemName']?></p>

    
                                            </td>
                                            <td class="mini-input">
                                                <p class="form-control-static"><?=$item['GiftItemCode']." - ".$item['GiftItemName']?></p>
                                            </td>
                                            <td class="desc">
                                                <p class="form-control-static"><?=$item['GiftQuantity']?></p>
                                            </td>
                                            <td class="desc mini-input">
                                                <p class="form-control-static"><?=$item['GiftMaxQuantity']?></p>
        
                                            </td>
                                        </tr>
                                        <?php }?>

                                        </tbody>
                                       
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

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