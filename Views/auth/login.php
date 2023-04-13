<?php
$check = false;
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $check = true;
}
?>
<?php ob_start(); ?>
Login
<?php $title = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="login-wrap">
    <div class="login-content">
        <div class="login-form">
            <form action="" method="POST" name="frm_register" id="frm_register">
                <input type="hidden" name="url" value="index.php?page=login&method=auth">
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
                <div class="login-checkbox">
                    <label>
                        <input type="checkbox" name="remember" value="1">Nhớ mật khẩu
                    </label>
                </div>
                <button class="au-btn au-btn--block au-btn--green m-b-20" name="submit_login" type="submit">
                    Đăng nhập
                </button>
            </form>
            <div class="register-link">
                <p>
                    Bạn đã có tài khoản?
                    <a href="index.php?page=register">Đăng ký ngay</a>
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
        Validator.isRequired('#email'),
        Validator.isEmail('#email'),
        Validator.isRequired('#password'),
    ],
    onSubmit: function(data) {
        // Call API
        console.log(data);
        handleLogin(data);
    }
});

function handleLogin(data) {
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
            } else {
                alertError(data.message);
            }
        })
}
</script>
<?php $script = ob_get_clean(); ?>

<!-- Kế thừa view -->
<?php include_once "./Views/layouts/app_auth.php"; ?>