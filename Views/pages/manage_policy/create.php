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
                                                <select required name="employee" id="employee"
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
                                                <input type="date" name="doc_date" id="doc_date" value="<?php echo date('Y-m-d'); ?>">
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

                                <!-- <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm" name="add_policy">
                                        <i class="fa fa-dot-circle-o"></i> Lưu
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Hoàn tác
                                    </button>
                                </div> -->
                            <!-- </form> -->
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
                                                <th>Mã hàng</th>
                                                <th>Mã hàng tặng</th>
                                                <th>Số lượng tặng</th>
                                                <th>Tối đa</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data-grid">
                                            
                                            <tr id="add-row">
                                                <td>
                                                    <button type="button" onclick="addRow()">Ấn để thêm mới</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                       
                                        
                                    </table>
                                </div>
                                <button type="submit" name="add_policy" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Lưu
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Hoàn tác
                                </button>
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
    function addRow() {
        var randomNumber = getRand()
        const dataGrid = document.getElementById("data-grid");
        const buttonRow = dataGrid.querySelector('#add-row');
        const newRow = document.createElement("tr");
        newRow.className = "grid";
        newRow.innerHTML = `
        <tr class="m-t-10">
            <td>
                <select required name="ItemId[]" class="form-control change_item">
                    <option value=""></option>
                    <?php
                        foreach($items as $item) {
                    ?>
                    <option ItemCode="<?=$item['Code']?>"
                        value="<?=$item['Id']?>">
                        <?=$item['Code']?> - <?=$item['Name']?>
                    </option>
                    <?php }?>
                </select>
            </td>
            <td class="mini-input">
               
                <select required id="${randomNumber}" name="GiftItemId[]" class="form-control">

            </td>
            <td class="desc">
                <input type="number" required min='0' step="1" name="GiftQuantity[]" class="form-control" value="2">         
            </td>
            <td class="desc mini-input">
                <input type="number" required min='0' step="1" name="GiftMaxQuantity[]" class="form-control" value="10">         
            </td>
            <td class="mini-input" onclick="deleteRow(this)">
                <div class="table-data-feature">
                    <button class="item" type="button" title="" data-original-title="Delete">
                        <i class="zmdi zmdi-delete"></i>
                    </button>
                </div>
            </td>
        </tr>
        `;
        dataGrid.insertBefore(newRow, buttonRow);

        $('.change_item').on('change', function() {
        var selectedOption = $(this).find("option:selected");
        var itemCode = selectedOption.attr('ItemCode');
        var minSup = 0.02
        var minConf = 0.6
        var url = "http://localhost:5500/http://localhost:8000/association_rules"
        data = {url, itemCode, minSup, minConf};
        sendRequest(data, '#'+randomNumber);
    });
    }

    function deleteRow(button) {
        const row = button.parentNode;
        row.remove();
    }


</script>
<?php $script = ob_get_clean(); ?>

<?php include_once "./Views/layouts/app_web.php"; ?>