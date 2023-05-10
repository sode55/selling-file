<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <link rel="stylesheet" href="/sellFile/view/css/style.css">
    <meta charset="UTF-8">
    <title>Title</title>

</head>
<body>
<div class="header">
    <a href="#default" class="logo">sellFile</a>
    <div class="header-right">
        <a href="/sellFile/FileUploadController/getUserFileUploadPage/">آپلود فایل توسط کاربر</a>
        <a href="/sellFile/FileUploadController/getGuestFileUpload/">آپلود فایل توسط مهمان</a>
        <a href="/sellFile/UserPanelController/UserPanel/">ورود به پنل کاربری</a>
        <a href="/sellFile/LoginController/getLoginPage/">ورود</a>
        <a href="/sellFile/RegisterController/getRegisterPage/"> عضویت</a>
        <a class="active" href="/sellFile/">Home</a>
    </div>
</div>
<form action="/sellFile/RegisterController/RegisterRequest/" method="post"  >
    <fieldset>
        <legend> فرم ثبت نام </legend>
        <label for="f_name">نام</label><br>
        <input type="text" name="firstName" id="f_name"  minlength="3"><br><br>
        <label for="l_name">نام خانوادگی</label><br>
        <input type="text" name="lastName" id="l_name"  minlength="3"><br><br>
        <label for="email">ایمیل</label><br>
        <input type="email" name="email" id="email" required><br><br>
        <label for="un">نام کاربری </label><br>
        <input type="text" name="username" id="un" minlength="3" required><br><br>
        <label for="pass"> رمز عبور</label><br>
        <input type="text" name="password" id="pass" minlength="8" required><br><br>
        <label for="confpass"> تایید رمز عبور</label><br>
        <input type="text" name="confirmPassword" id="confpass" minlength="8" required><br><br>
        <input type="submit" name="submit" value="register">
    </fieldset>
</form>
</body>
</html>