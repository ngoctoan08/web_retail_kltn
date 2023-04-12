<?php ob_start(); ?>
Register
<?php $title = ob_get_clean(); ?>

<!-- Content -->
<?php ob_start(); ?>
<div class="login-form">
    <form action="index.php?page=register&method=check" method="POST" name="frm_register" id="frm_register">
        <div class="form-group">
            <label>Họ tên <span style="color: red;"><?= isset($error['name']) ? $error['name'] : '' ?></span></label>
            <input class="au-input au-input--full" id="name" type="text" name="name" placeholder="Nhập họ tên...">
        </div>
        <div class="form-group">
            <label>Email <span style="color: red;"><?= isset($error['email']) ? $error['email'] : '' ?></span></label>
            <input class="au-input au-input--full" id="email" type="email" name="email" placeholder="Nhập email...">
        </div>
        <div class="form-group">
            <label>Mật khẩu <span style="color: red;"><?= isset($error['password']) ? $error['password'] : '' ?></label>
            <input class="au-input au-input--full" id="password" type="password" name="password"
                placeholder="Nhập mật khẩu...">
        </div>
        <div class="form-group">
            <label>Xác nhận mật khẩu <span
                    style="color: red;"><?= isset($error['check_pass']) ? $error['check_pass'] : '' ?></label>
            <input class="au-input au-input--full" id="check_pass" type="password" name="check_pass"
                placeholder="Nhập lại mật khẩu...">
        </div>
        <div class="login-checkbox">
            <label>
                <input type="checkbox" name="aggree">Đồng ý với mọi điều khoản?
            </label>
        </div>
        <button class="au-btn au-btn--block au-btn--green m-b-20 btn_register" name="submit_register" type="submit">
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
<?php $content = ob_get_clean(); ?>


<!-- script -->
<?php ob_start(); ?>
<script src="./public/shared/js/validator.js"></script>
<script>
alert(123);
Validator({
    form: '#frm_register',
    errorSelector: '.form-error',
    rules: [
        Validator.isRequired('#name'),
        Validator.minLength('#name'),
        Validator.isRequired('#email'),
        Validator.isEmail('#email'),
        Validator.isEmail('#password'),
        Validator.passwordConfirmation('#check_pass'),
    ],
    onSubmit: function(data) {
        // Call API
        console.log(data);
    }
});
</script>
<?php $script = ob_get_clean(); ?>

<?php include_once "index.php"; ?>