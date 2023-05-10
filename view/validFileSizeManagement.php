<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <link rel="stylesheet" href="/sellFile/view/css/style.css">
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .main {
            padding: 50px 50px;
        }

    </style>
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
<div class="main">
    <form action="/sellFile/UserController/editValidFilesizeUpload/" method="post">
        <label><b>حجم مجاز برای آپلود فایل توسط مهمان:</b></label>
        <input type="number" name="validSize">
        <input type="submit" name="submit" value="تایید">
    </form>
</div>

</body>
</html>