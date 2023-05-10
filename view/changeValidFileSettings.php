<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <link rel="stylesheet" href="/sellFile/view/css/style.css">
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .main{
            padding: 50px  50px;
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
<div>
    <b>انواع فایلی که در حال حاضر مجاز هستند:</b><br>
    <?php
    include_once 'model/settings.php';
    $types = new Settings();
    $type = $types->getValidTypes();
    foreach ($type as  $item)
    {
        echo  $item['type'];
        echo "<br>";
    }
    ?>
</div><br>
<div>
<form action="/sellFile/UserController/addValidTypes/" method="post">
    <label>نوع فایلی که میخواهید اضافه  شود را وارد کنید:</label>
    <input type="text" name="validTypes" >
    <input type="submit" name="submit" value="تایید">
</form>
</div><br><br>
<div>
<form action="/sellFile/UserController/deleteValidTypes/" method="post">
    <label>نوع فایلی که میخواهید حدف شود را وارد کنید:</label>
    <input type="text" name="validTypes" >
    <input type="submit" name="submit" value="تایید">
</form>
</div>
</div>

</body>
</html>