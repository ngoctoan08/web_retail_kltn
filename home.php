<?php ob_start(); ?>
Home page
<?php $title = ob_get_clean(); ?>

<?php ob_start(); ?>
<h2>Welcome to my website!</h2>
<p>This is the home page.</p>
<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="./public/shared/js/validator.js">
</script>
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

<?php include "layout.php"; ?>