<?php ob_start(); ?>
Register
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<div class="login-wrap">
    <div class="login-content">
        <div class="login-form">
            <form action="" method="POST" name="frm_register" id="frm_register">
                <input type="hidden" name="url" value="index.php?page=register&method=store">
                <div class="form-group">
                    <label>Họ tên</label>
                    <input class="au-input au-input--full" id="name" type="text" name="name"
                        placeholder="Nhập họ tên..." value="Local Admin">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="au-input au-input--full" id="email" type="email" name="email"
                        placeholder="Nhập email..." value="local-admin@gmail.com">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input class="au-input au-input--full" id="password" type="password" name="password"
                        placeholder="Nhập mật khẩu..." value="toandaika">
                </div>
                <div class="form-group">
                    <label>Xác nhận mật khẩu</label>
                    <input class="au-input au-input--full" id="check_pass" type="password" name="check_pass"
                        placeholder="Nhập lại mật khẩu..." value="toandaika">
                </div>
                <div class="login-checkbox">
                    <label>
                        <input type="checkbox" name="aggree">Đồng ý với mọi điều khoản?
                    </label>
                </div>
                <button class="au-btn au-btn--block au-btn--green m-b-20 btn_register" name="submit_register"
                    type="submit">
                    Đăng ký
                </button>
            </form>
            <div class="register-link">
                <p>
                    Bạn đã có tài khoản?
                    <a href="index.php?page=login">Đăng nhập ngay</a>
                </p>
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
    form: '#frm_register',
    errorSelector: '.form-error',
    rules: [
        Validator.isRequired('#name'),
        Validator.minLength('#name'),
        Validator.isRequired('#email'),
        Validator.isEmail('#email'),
        Validator.isRequired('#password'),
    ],
    onSubmit: function(data) {
        // Call API
        console.log(data);
        createAccount(data);
    }
});

function createAccount(data) {
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
                // alert(data.lastId);
                setTimeout(
                    location.href = "http://localhost/quan_ly_nhan_su/index.php?page=login", 3000
                );
            } else {
                alertError(data.message);
            }
        })
}
</script>
<?php $script = ob_get_clean(); ?>

<?php include_once "./Views/layouts/app_auth.php"; ?>