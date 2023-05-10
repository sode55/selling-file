
<!doctype html>
<html lang="en" dir="rtl">
<head>
    <link rel="stylesheet" href="/sellFile/view/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
<div class="wrapper">
<form action="/sellFile/LoginController/doLogin/" method="post">

        <h1>فرم ورود اعضا </h1>
        <label>نام کاربری: </label><input type="text" name="username"><br><br>
        <label>رمز عبور: </label><input type="password" name="password"><br><br>
         <p> <?php if (isset($_GET['message'])) echo ($_GET['message']); ?></p><br><br>
        <input type="submit" name="submit" value="login">

</form>
</div>


</body>
</html>